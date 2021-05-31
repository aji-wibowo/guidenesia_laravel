<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Kebun extends Model
{
	protected $table = 'ytk_kebun';
	protected $primaryKey = 'kebun_id';
	protected $fillable = [
		'kebun_name', 'alamat', 'kelurahan_desa_id', 'titik_koordinat', 'active', 'created_by', 'updated_by'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}
}
