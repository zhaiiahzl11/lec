<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['lecture_id', 'question', 'difficulty'];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
