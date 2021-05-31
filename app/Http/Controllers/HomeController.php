<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Hash;

use App\User;
use App\User_role;
use App\Role;
use App\Kecamatan;
use App\Kabupaten;
use App\Provinsi;
use App\Kebun;

class HomeController extends Controller
{
/**
* Show the application dashboard / profile.
*
* @return \Illuminate\Contracts\Support\Renderable
*/

public function index()
{
    $dataUser = User_role::with('user', 'role')->join('ytk_seker_user', 'ytk_seker_user.seker_user_id', '=', 'ytk_seker_user_role.seker_user_id')->join('ytk_kebun', 'ytk_kebun.kebun_id', '=', 'ytk_seker_user.kebun_id')->join('ytk_kelurahan_desa', 'ytk_kelurahan_desa.kelurahan_desa_id', '=', 'ytk_kebun.kelurahan_desa_id')->join('ytk_kecamatan', 'ytk_kecamatan.kecamatan_id', '=', 'ytk_kelurahan_desa.kecamatan_id')->join('ytk_kabupaten_kota', 'ytk_kabupaten_kota.kabupaten_kota_id', '=', 'ytk_kecamatan.kabupaten_kota_id')->join('ytk_provinsi', 'ytk_provinsi.provinsi_id', '=', 'ytk_kabupaten_kota.provinsi_id')->join('ytk_seker_grade', 'ytk_seker_grade.seker_grade_id', '=', 'ytk_seker_user.seker_grade_id')->join('ytk_seker_hukum', 'ytk_seker_hukum.seker_hukum_id', '=', 'ytk_seker_user.seker_hukum_id')->where('ytk_seker_user.seker_user_id', Auth::user()->seker_user_id)->get();

    $dataKecamatan = Kecamatan::all();
    $dataKabupaten = Kabupaten::all();
    $dataProvinsi = Provinsi::all();
    $dataKebun = Kebun::all();

    $data = [
        'title' => 'Detail',
        'judul1' => 'Detail',
        'judul2' => 'Control Panel',
        'dataUser' => $dataUser,
        'dataKecamatan' => $dataKecamatan,
        'dataKabupaten' => $dataKabupaten,
        'dataProvinsi' => $dataProvinsi,
        'dataKebun' => $dataKebun,
    ];
    return view('content.profil.detail', $data);
}

/*
    end dashboard / profile
*/

/*
    Method change password
*/
    public function change_password(){
        $data = [
            'title' => 'Ubah Password Akun',
            'judul1' => 'Ubah Password Akun',
            'judul2' => 'Kelola Akun',
        ];

        return view('content.profil.change_password', $data);
    }

    public function change_password_proses(Request $r){
        $r->validate([
            'password_lama' => 'required|min:6',
            'password_baru' => 'required|min:6'
        ]);

        $user = User::find(Auth::user()->seker_user_id);

        if (Hash::check($r->password_lama, $user->password)) {
            $user->password = Hash::make($r->password_baru);
            $user->save();
            return redirect('change/password')->with($this->message('Berhasil Ubah', 'Data telah berhasil diubah', 'success'));
        }else{
            return redirect('change/password')->with($this->message('Gagal Ubah', 'Data telah gagal diubah', 'error'));
        }
    }
/*
    end change password
*/

/*
    Method Anggota
*/
    public function anggota_list(){
        $data = [
            'title' => 'Daftar Anggota',
            'judul1' => 'Daftar Anggota',
            'judul2' => 'Manajemen Anggota',
        ];

        return view('content.anggota.list', $data);
    }
/*
    end method anggota
*/

}
