<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_fr');
            $table->string('title_ar');
            $table->text('excerpt_fr');
            $table->text('excerpt_ar');
            $table->longText('body_fr');
            $table->longText('body_ar');
            $table->string('meta_description_fr');
            $table->string('meta_description_ar');
            $table->string('meta_keywords')->nullable();
            $table->string('cover_image')->nullable();
            $table->unsignedSmallInteger('reading_time')->default(5);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->index('published_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
