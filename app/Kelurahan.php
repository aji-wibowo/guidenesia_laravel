<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
	protected $table = 'ytk_kecamatan_desa';
	protected $primaryKey = 'kelurahan_desa_id';
	protected $fillable = [
		'kelurahan_desa_id', 'kecamatan_id', 'kelurahan_desa_name', 'kode_pos', 'active', 'created_by', 'updated_by'
	];
}
