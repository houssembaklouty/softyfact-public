<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use Illuminate\Console\Command;

class GenerateOgImages extends Command
{
    protected $signature = 'blog:generate-og-images {--force : Overwrite existing OG images}';
    protected $description = 'Generate 1200x630 Open Graph images for blog posts';

    private const OG_WIDTH = 1200;
    private const OG_HEIGHT = 630;

    public function handle(): int
    {
        $outputDir = public_path('images/blog/og');

        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $posts = BlogPost::all();
        $generated = 0;

        foreach ($posts as $post) {
            $filename = $post->slug . '.jpg';
            $filepath = $outputDir . '/' . $filename;

            if (file_exists($filepath) && !$this->option('force')) {
                $this->line("⏭  Skipping {$post->slug} (OG image exists)");
                continue;
            }

            $coverPath = $post->cover_image ? public_path($post->cover_image) : null;

            if ($coverPath && file_exists($coverPath)) {
                $this->generateFromCover($coverPath, $filepath, $post);
            } else {
                $this->generateBranded($filepath, $post);
            }

            $generated++;
            $this->info("✅ {$post->slug}");
        }

        $this->newLine();
        $this->info("Done! {$generated} OG images generated in public/images/blog/og/");

        return Command::SUCCESS;
    }

    private function generateFromCover(string $sourcePath, string $destPath, BlogPost $post): void
    {
        $source = $this->loadImage($sourcePath);
        if (!$source) {
            $this->generateBranded($destPath, $post);
            return;
        }

        $srcW = imagesx($source);
        $srcH = imagesy($source);

        $canvas = imagecreatetruecolor(self::OG_WIDTH, self::OG_HEIGHT);

        // Crop-fill to 1200x630
        $srcRatio = $srcW / $srcH;
        $dstRatio = self::OG_WIDTH / self::OG_HEIGHT;

        if ($srcRatio > $dstRatio) {
            $cropH = $srcH;
            $cropW = (int) ($srcH * $dstRatio);
            $cropX = (int) (($srcW - $cropW) / 2);
            $cropY = 0;
        } else {
            $cropW = $srcW;
            $cropH = (int) ($srcW / $dstRatio);
            $cropX = 0;
            $cropY = (int) (($srcH - $cropH) / 2);
        }

        imagecopyresampled($canvas, $source, 0, 0, $cropX, $cropY, self::OG_WIDTH, self::OG_HEIGHT, $cropW, $cropH);

        // Semi-transparent dark overlay for text readability
        $overlay = imagecreatetruecolor(self::OG_WIDTH, self::OG_HEIGHT);
        $black = imagecolorallocatealpha($overlay, 0, 0, 0, 60);
        imagefill($overlay, 0, 0, $black);
        imagealphablending($canvas, true);
        imagecopy($canvas, $overlay, 0, 0, 0, 0, self::OG_WIDTH, self::OG_HEIGHT);
        imagedestroy($overlay);

        // Add title text
        $white = imagecolorallocate($canvas, 255, 255, 255);
        $title = $post->title_fr;
        $fontSize = 5; // GD built-in font (largest)
        $charWidth = imagefontwidth($fontSize);
        $maxChars = (int) ((self::OG_WIDTH - 120) / $charWidth);
        $lines = wordwrap($title, $maxChars, "\n", true);

        $y = (int) (self::OG_HEIGHT / 2) - 30;
        foreach (explode("\n", $lines) as $line) {
            $lineWidth = strlen($line) * $charWidth;
            $x = (int) ((self::OG_WIDTH - $lineWidth) / 2);
            imagestring($canvas, $fontSize, $x, $y, $line, $white);
            $y += 24;
        }

        // Brand name at bottom
        $brand = 'SoftyFact';
        $brandWidth = strlen($brand) * imagefontwidth(4);
        $brandColor = imagecolorallocate($canvas, 0, 193, 163);
        imagestring($canvas, 4, (int) ((self::OG_WIDTH - $brandWidth) / 2), self::OG_HEIGHT - 60, $brand, $brandColor);

        imagejpeg($canvas, $destPath, 90);
        imagedestroy($canvas);
        imagedestroy($source);
    }

    private function generateBranded(string $destPath, BlogPost $post): void
    {
        $meta = $post->getCoverMeta();

        $canvas = imagecreatetruecolor(self::OG_WIDTH, self::OG_HEIGHT);

        // Gradient background
        $from = $this->hexToRgb($meta['from']);
        $to = $this->hexToRgb($meta['to']);

        for ($x = 0; $x < self::OG_WIDTH; $x++) {
            $ratio = $x / self::OG_WIDTH;
            $r = (int) ($from[0] + ($to[0] - $from[0]) * $ratio);
            $g = (int) ($from[1] + ($to[1] - $from[1]) * $ratio);
            $b = (int) ($from[2] + ($to[2] - $from[2]) * $ratio);
            $color = imagecolorallocate($canvas, $r, $g, $b);
            imageline($canvas, $x, 0, $x, self::OG_HEIGHT, $color);
        }

        // Add title text
        $white = imagecolorallocate($canvas, 255, 255, 255);
        $title = $post->title_fr;
        $fontSize = 5;
        $charWidth = imagefontwidth($fontSize);
        $maxChars = (int) ((self::OG_WIDTH - 120) / $charWidth);
        $lines = wordwrap($title, $maxChars, "\n", true);

        $y = (int) (self::OG_HEIGHT / 2) - 30;
        foreach (explode("\n", $lines) as $line) {
            $lineWidth = strlen($line) * $charWidth;
            $x = (int) ((self::OG_WIDTH - $lineWidth) / 2);
            imagestring($canvas, $fontSize, $x, $y, $line, $white);
            $y += 24;
        }

        // Brand name
        $brand = 'SoftyFact';
        $brandWidth = strlen($brand) * imagefontwidth(4);
        imagestring($canvas, 4, (int) ((self::OG_WIDTH - $brandWidth) / 2), self::OG_HEIGHT - 60, $brand, $white);

        imagejpeg($canvas, $destPath, 90);
        imagedestroy($canvas);
    }

    private function loadImage(string $path): ?\GdImage
    {
        $info = @getimagesize($path);
        if (!$info) {
            return null;
        }

        return match ($info[2]) {
            IMAGETYPE_JPEG => @imagecreatefromjpeg($path),
            IMAGETYPE_PNG => @imagecreatefrompng($path),
            IMAGETYPE_WEBP => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : null,
            default => null,
        };
    }

    private function hexToRgb(string $hex): array
    {
        $hex = ltrim($hex, '#');

        return [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)),
        ];
    }
}
