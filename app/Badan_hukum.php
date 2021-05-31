<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badan_hukum extends Model
{
	protected $table = 'ytk_seker_hukum';
	protected $primaryKey = 'seker_hukum_id';
	protected $fillable = [
		'seker_no_hukum', 'seker_jumlah', 'active', 'created_by', 'updated_by'
	];
}
