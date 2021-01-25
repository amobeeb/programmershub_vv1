<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function questions(){
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function members(){
        return $this->belongsTo(Member::class, 'member_id');
    }
}