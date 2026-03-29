<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GenerateBlogCovers extends Command
{
    protected $signature = 'blog:generate-covers {--force : Overwrite existing covers}';
    protected $description = 'Download real stock photos from Pexels for each blog post';

    /**
     * Map each post slug to a Pexels search query.
     */
    private function searchTerms(): array
    {
        return [
            'comment-choisir-logiciel-facturation-tunisie' => 'business software accounting',
            'guide-tva-tunisie'                            => 'tax documents calculator',
            'fodec-tunisie-guide'                          => 'industrial manufacturing factory',
            'declaration-tej-guide-pratique'                => 'digital stamp certificate',
            'facturation-electronique-tunisie-elfatoora'   => 'electronic invoice digital',
            'retenue-source-tunisie-guide'                 => 'finance money bank',
            'gestion-stock-pme-tunisie'                    => 'warehouse inventory stock',
            'creer-facture-conforme-tunisie'                => 'invoice paper office desk',
            'timbre-fiscal-tunisie'                         => 'government stamp legal document',
            'comparatif-logiciel-facturation-gratuit-vs-payant' => 'comparison choice decision',
            'top-5-logiciels-facturation-tunisie-2026'     => 'laptop business ranking',
            'migration-excel-vers-logiciel-facturation-tunisie' => 'spreadsheet migration data',
            'softyfact-bureau-vs-cloud-comparatif'         => 'cloud computing desktop laptop',
            'suivi-paiements-tresorerie-tunisie'            => 'payment tracking cash register',
            'gestion-clients-fournisseurs-logiciel-tunisie' => 'business customer relationship',
            'tableau-de-bord-gestion-commerciale-tunisie'   => 'business dashboard analytics',
            'devis-bon-livraison-facture-workflow-tunisie'   => 'business document paperwork',
            'facturation-freelance-auto-entrepreneur-tunisie' => 'freelancer working laptop',
            'logiciel-facturation-expert-comptable-tunisie'  => 'accountant office professional',
            'gestion-multi-entrepots-stock-tunisie'         => 'warehouse logistics storage',
            'transformation-digitale-commerce-tunisie-2026'  => 'digital transformation technology',
            'facturation-electronique-pme-tunisie-preparation'    => 'small business preparation planning',
            'cout-roi-facturation-electronique-tunisie'           => 'money investment return savings',
            'cadre-juridique-facturation-electronique-tunisie'    => 'legal law books gavel justice',
            'erreurs-courantes-declaration-tej-tunisie'           => 'mistake error warning alert',
            'automatiser-declaration-tej-softyfact'               => 'automation software workflow',
            'tej-debutants-faq-tunisie'                           => 'questions answers FAQ help',
            'calendrier-echeances-tej-2026'                       => 'calendar deadline schedule planner',
        ];
    }

    public function handle(): int
    {
        $apiKey = env('PEXELS_API_KEY');

        if (!$apiKey) {
            $this->error('PEXELS_API_KEY is required. Get a free key at https://www.pexels.com/api/');
            $this->line('Add it to your .env: PEXELS_API_KEY=your_key_here');
            return Command::FAILURE;
        }

        $posts = BlogPost::all();
        $outputDir = public_path('images/blog');

        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $searchTerms = $this->searchTerms();

        foreach ($posts as $post) {
            $filename = $post->slug . '.jpg';
            $filepath = $outputDir . '/' . $filename;

            if (file_exists($filepath) && !$this->option('force')) {
                $this->line("⏭  Skipping {$post->slug} (already exists)");
                continue;
            }

            $query = $searchTerms[$post->slug] ?? 'business accounting';

            $this->line("🔍 Searching Pexels for: \"{$query}\" ...");

            $response = Http::withHeaders([
                'Authorization' => $apiKey,
            ])->get('https://api.pexels.com/v1/search', [
                'query'    => $query,
                'per_page' => 5,
                'orientation' => 'landscape',
                'size'     => 'large',
            ]);

            if ($response->failed()) {
                $this->error("❌ Pexels API error for {$post->slug}: " . $response->status());
                continue;
            }

            $photos = $response->json('photos', []);

            if (empty($photos)) {
                $this->warn("⚠️  No photos found for: {$query}");
                continue;
            }

            // Pick a different photo per post (use post ID to vary selection)
            $photo = $photos[$post->id % count($photos)];
            $imageUrl = $photo['src']['landscape'] ?? $photo['src']['large'];
            $photographer = $photo['photographer'] ?? 'Unknown';

            $this->line("📷 Downloading from {$photographer}...");

            $imageData = Http::timeout(30)->get($imageUrl);

            if ($imageData->failed()) {
                $this->error("❌ Failed to download image for {$post->slug}");
                continue;
            }

            file_put_contents($filepath, $imageData->body());

            // Update database
            $post->update(['cover_image' => '/images/blog/' . $filename]);

            $this->info("✅ {$post->slug} — Photo by {$photographer} (Pexels)");

            // Small delay to respect API rate limits
            usleep(200000);
        }

        $this->newLine();
        $this->info('Done! Real photos saved in public/images/blog/');
        $this->line('Photos provided by Pexels (https://www.pexels.com)');

        return Command::SUCCESS;
    }
}
