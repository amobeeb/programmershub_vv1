<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_specialty extends Model
{
    use HasFactory;
    public function members(){
        return $this->belongsTo(Member::class);
    }
    protected $fillable=[
        'member_id', 'specialty_id' 
    ];
}
