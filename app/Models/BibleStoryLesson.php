<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibleStoryLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'bible_story_id',
        'title',
        'content'
    ];

    public function story()
    {
        return $this->belongsTo(BibleStory::class, 'bible_story_id');
    }
}
