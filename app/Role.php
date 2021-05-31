<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\User_role;

class Role extends Model
{
	protected $table = 'ytk_seker_role';
	protected $primaryKey = 'seker_role_id';
	protected $fillable = [
		'seker_rolename', 'active', 'created_by', 'updated_by'
	];

	public function user_role(){
		return $this->belongsTo('App\User_role', 'seker_role_id');
	}
}
