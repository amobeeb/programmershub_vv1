<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Member extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasFactory;

    public function member_specialty(){
        return $this->hasMany(member_specialty::class);
    }
    // SELECT `id`, `surname`, `othername`, `gender`, `chapter_id`, `role`, `email`, `username`, `password`, `created_at`, `updated_at`, `deleted_at` FROM `members` WHERE 1
    protected $fillable=[
        'surname', 'othername','gender','chapter_id','role','email','username','password' 
    ];

    public function chapter(){
       return $this->belongsTo(Chapter::class);
    }
    public function articles(){
        return $this->hasMany(Article::class);
     }

     public function questions(){
        return $this->hasMany(Question::class);
     }
     public function answers(){
        return $this->hasMany(Answer::class);
     }
    //  public function anwers(){
    //      returh $this->hasMany
    //  }
}
