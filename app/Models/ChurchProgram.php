<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'day',
        'start_time',
        'end_time',
        'category',
        'is_recurring',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_recurring' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function activities()
    {
        return $this->hasMany(ProgramActivity::class)->orderBy('order');
    }
}
