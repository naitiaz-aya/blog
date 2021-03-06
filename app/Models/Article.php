<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	use HasFactory;
	protected $fillable = [
		'title',
		'body',
		'image',
		'user_id',
		'category_id',
		'id_sub',
	];
	public function user(){
		return $this->belongsTo('App\Models\User');
	}
	public function category(){
		return $this->belongsTo('App\Models\Category');
	}
	public function usersubscription(){
		return $this->belongsTo('App\Models\Usersubscription');
	}
	public function subscription(){
		return $this->belongsTo('App\Models\Subscription');
	}
}
