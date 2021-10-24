<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersubscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type_sub',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function subscribption(){
		return $this->belongsTo('App\Models\Subscription');
	}
}
