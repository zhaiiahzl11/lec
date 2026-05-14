<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['user_name', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
