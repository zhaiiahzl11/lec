<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['title', 'description', 'is_previous', 'category'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
