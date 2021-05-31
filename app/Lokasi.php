<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
	protected $table = 'temporary_lokasi';
	protected $primaryKey = 'id_temporary_lokasi';
	protected $fillable = ['ip_address', 'latitude', 'longitude'];
}
