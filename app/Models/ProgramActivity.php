<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'church_program_id',
        'name',
        'start_time',
        'end_time',
        'description',
        'icon',
        'order',
    ];

    public function churchProgram()
    {
        return $this->belongsTo(ChurchProgram::class);
    }
}
