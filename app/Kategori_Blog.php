<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_Blog extends Model
{
	protected $table = 'kategori_blog';
	protected $primaryKey = 'id_kategori_blog';

	protected $fillable = ['nama_kategori_blog', 'deskripsi_kategori_blog', 'status_kategori_blog'];

	public function blog(){
         return $this->hasMany('App\Blog');
    }
}
