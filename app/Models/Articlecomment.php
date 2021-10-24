<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articlecomment extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'user_id',
        'article_id',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
