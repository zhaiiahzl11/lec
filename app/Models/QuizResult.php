<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = ['user_name', 'lecture_id', 'score', 'total_questions', 'percentage'];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
