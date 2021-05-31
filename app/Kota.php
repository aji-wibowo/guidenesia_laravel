<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kota extends Model
{
	protected $table = 'kota';

	protected $primaryKey = 'id_kota';

	protected $fillable = ['id_provinsi', 'nama_kota', 'foto_kota', 'status_kota'];

	public static function getByCond($where){
		$result = DB::table('kota')->where($where)->get();
		return $result;
	}
}
