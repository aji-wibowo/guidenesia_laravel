<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'ytk_kecamatan';
	protected $primaryKey = 'kecamatan_id';
	protected $fillable = [
		'kecamatan_id', 'kabupaten_kota_id', 'kecamatan_name', 'active', 'created_by', 'updated_by'
	];
}
