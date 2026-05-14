<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizSession extends Model
{
    protected $fillable = ['user_name', 'lecture_id', 'state', 'completed'];
    
    protected $casts = [
        'state' => 'array',
        'completed' => 'boolean',
    ];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
