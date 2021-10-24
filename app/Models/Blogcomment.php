<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description',
        'user_id',
        'blog_id',
        
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
