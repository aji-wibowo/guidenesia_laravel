<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageKontak extends Model
{
	protected $table = 'page_kontak';

	protected $primaryKey = 'id_page_kontak';

	protected $fillable = ['deskripsi_kontak', 'alamat_kontak', 'telepon_kontak', 'email_kontak', 'fb_kontak', 'tw_kontak', 'long_kontak', 'lat_kontak'];
}
