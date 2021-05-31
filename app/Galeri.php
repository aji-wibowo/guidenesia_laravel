<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
	protected $table = 'galeri';
	protected $primaryKey = 'id_galeri';

	protected $fillable = ['id_spot', 'deskripsi', 'foto_galeri'];
}
