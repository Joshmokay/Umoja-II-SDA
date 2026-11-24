<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Support\Str;

class SevenSealsSeeder extends Seeder
{
    public function run()
    {
        $category = ArticleCategory::firstOrCreate(
            ['slug' => 'end-time-messages'],
            [
                'name' => 'End-Time Messages',
                'description' => 'Prophetic messages and Biblical studies on the end of time.'
            ]
        );

        $htmlPath = 'C:\\xampp\\htdocs\\advent\\assets\\seven_seals_content.html';
        
        $content = '';
        if (file_exists($htmlPath)) {
            $content = file_get_contents($htmlPath);
        } else {
            $this->command->error("Could not find the HTML content file at: $htmlPath");
            return;
        }

        // Adjust image paths from 'assets/images/seals/...' to 'storage/articles/seals/...'
        $content = str_replace('assets/images/seals/', 'storage/articles/seals/', $content);

        Article::updateOrCreate(
            ['slug' => 'the-seven-seals'],
            [
                'category_id' => $category->id,
                'title' => 'The Seven Seals',
                'excerpt' => 'The seven seals represent events to take place on this earth during seven time periods, beginning with the first coming of Christ to this earth as a baby and continuing until Christ’s second coming.',
                'content' => $content,
                'featured_image' => 'storage/articles/seals/hero_bg.png',
                'author' => 'KARUSDA Advent Focus',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now(),
            ]
        );
        
        $this->command->info("The Seven Seals article successfully seeded!");
    }
}
