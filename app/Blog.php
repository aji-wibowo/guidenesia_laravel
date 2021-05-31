<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = 'blog';
	protected $primaryKey = 'id_blog';

	protected $fillable = ['id_user', 'id_kategori_blog', 'judul_blog', 'slug_blog', 'konten_blog', 'foto_blog', 'meta_deskripsi', 'meta_keyword', 'status_blog', 'views_blog', 'publish_at'];

	public function kategori_blog(){
		return $this->belongsTo('App\Kategori_Blog', 'id_kategori_blog');
	}

	public function user(){
		return $this->belongsTo('App\User', 'id_user');
	}
}
