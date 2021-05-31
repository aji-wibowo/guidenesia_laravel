<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Role;

class User_role extends Model
{
	protected $table = 'ytk_seker_user_role';
	protected $primaryKey = 'seker_ur_id';
	protected $fillable = [
		'seker_user_id', 'seker_user_id', 'seker_role_id', 'active'
	];

	public function user(){
		return $this->hasOne('App\User', 'seker_user_id');
	}

	public function role(){
		return $this->hasMany('App\Role', 'seker_role_id');
	}
}
