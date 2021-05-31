<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;

use App\User;
use App\User_role;
use App\Role;
use App\Kecamatan;
use App\Kabupaten;
use App\Provinsi;
use App\Kebun;
use App\Badan_hukum;

class MainAjax extends Controller
{
	// Page Profile
	public function detail_get_kebun(Request $r){
		$r->validate([
			'id'=>'required'
		]);

		$kebun = Kebun::join('ytk_kelurahan_desa', 'ytk_kelurahan_desa.kelurahan_desa_id', '=', 'ytk_kebun.kelurahan_desa_id')->join('ytk_kecamatan', 'ytk_kecamatan.kecamatan_id', '=', 'ytk_kelurahan_desa.kecamatan_id')->join('ytk_kabupaten_kota', 'ytk_kabupaten_kota.kabupaten_kota_id', '=', 'ytk_kecamatan.kabupaten_kota_id')->join('ytk_provinsi', 'ytk_provinsi.provinsi_id', '=', 'ytk_kabupaten_kota.provinsi_id')->find($r->id);

		$response = [
			'kelurahan_desa_id' => $kebun->kelurahan_desa_id,
			'kecamatan_id' => $kebun->kecamatan_id,
			'kabupaten_kota_id' => $kebun->kabupaten_kota_id,
			'provinsi_id' => $kebun->provinsi_id,
		];

		echo json_encode($response);
	} 

	public function detail_tentang_ubah(Request $r){
		$r->validate([
			'nama_serikat' => 'required',
			'alamat' => 'required',
			'kebun' => 'required',
			'tentang' => 'required',
		]);

		$detail = User::find(Auth::user()->seker_user_id);

		$detail->seker_fullname = $r->nama_serikat;
		$detail->seker_address = $r->alamat;
		$detail->kebun_id = $r->kebun;
		$detail->keterangan = $r->tentang;
		$detail->updated_by = Auth::user()->seker_user_id;

		if($detail->save()){
			$status = $this->message('Berhasil Ubah', 'Data telah berhasil diubah', 'success');
		}else{
			$status = $this->message('Gagal Ubah', 'Data telah gagal diubah', 'error');
		}

		echo json_encode($status);
	}

	public function detail_badanHukum_ubah(Request $r){
		$r->validate([
			'badan_nama_serikat' => 'required',
			'badan_nomor' => 'required',
			'jumlah_pekerja' => 'required'
		]);

		$r->status = $r->status == 'on' ? '1' : '0';

		$detail = Badan_hukum::where('seker_no_hukum', $r->badan_nomor)->first();

		if ($detail->count() > 0) {
			$detail = Badan_hukum::find($detail->seker_hukum_id);
			$detail->seker_no_hukum = $r->badan_nomor;
			$detail->seker_jumlah = $r->jumlah_pekerja;
			$detail->active = $r->status;
			$detail->updated_by = Auth::user()->seker_user_id;
			if($detail->save()){
				$status = $this->message('Berhasil Ubah', 'Data telah berhasil diubah', 'success');
			}else{
				$status = $this->message('Gagal Ubah', 'Data telah gagal diubah', 'error');
			}

		}else{
			Bdan_hukum::create([
				'seker_no_hukum' => $r->badan_nomor,
				'seker_jumlah' => $r->jumlah_pekerja,
				'created_by' => Auth::user()->seker_user_id,
				'updated_by' => Auth::user()->seker_user_id,
				'active' => $r->status,
			]);
		}

		echo json_encode($status);
	}

	public function upload_foto_profil(Request $r){
		$r->validate([
			'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$filename = time().'.'.$r->foto->extension();

		if($r->foto->move(public_path('images'), $filename)){
			$detail = User::find(Auth::user()->seker_user_id);
			$detail->photo_profile = $filename;
			if($detail->save()){
				$status = $this->message('Berhasil Ubah', 'Data telah terupload dan berhasil diubah', 'success');
				$status['photoname'] = $filename;
			}else{
				$status = $this->message('Gagal Ubah', 'Data telah terupload namun gagal diubah', 'error');
			}
		}else{
			$status = $this->message('Gagal Ubah', 'Data telah gagal diubah', 'error');
		}

		echo json_encode($status);
	}

	// end page profile

}
