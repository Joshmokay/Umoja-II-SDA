<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('article_categories')->insertOrIgnore([
            'name' => 'Health & Lifestyle',
            'slug' => 'health-lifestyle',
            'description' => 'Articles and news about health, wellbeing, and lifestyle from an Adventist perspective.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('article_categories')->where('slug', 'health-lifestyle')->delete();
    }
};
