<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
	protected $table = 'ytk_kabupaten_kota';
	protected $primaryKey = 'kabupaten_kota_id';
	protected $fillable = [
		'kabupaten_kota_id', 'provinsi_id', 'kabupaten_kota_name', 'active', 'created_by', 'updated_by'
	];
}
