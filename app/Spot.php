<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $table = 'spot';
    protected $primaryKey = 'id_spot';
    protected $fillable = ['slug_spot', 'id_kategori', 'id_kota', 'id_provinsi', 'id_user', 'judul_spot', 'foto_spot', 'content_spot', 'alamat_spot', 'telepon_spot', 'email_spot', 'jamkerja_spot', 'long_spot', 'lat_spot', 'meta_deskripsi', 'meta_keyword', 'tanggal_spot', 'status_spot', 'views_spot', 'publish_at'];

    public function kategori(){
    	return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    public function kota(){
    	return $this->belongsTo('App\Kota', 'id_kota');
    }

    public function provinsi(){
    	return $this->belongsTo('App\Provinsi', 'id_provinsi');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'id_user');
    }

    public function galeri(){
        return $this->belongsTo('App\Galeri', 'id_spot');
    }
}
