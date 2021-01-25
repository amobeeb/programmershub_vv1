<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function members(){
        return $this->belongsTo(Member::class, 'member_id');
    }

}
