<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Auth;
use View;
use Mail;

use App\User;
use App\Kategori;
use App\Kategori_Blog;
use App\Provinsi;
use App\Kota;
use App\Spot;
use App\Blog;
use App\Galeri;
use App\PageKontak;
use App\SubscribeNewsletter;

class adminController extends Controller
{

	/*
		Important
	*/

		public function __construct()
		{
			$this->middleware('auth');
			$spot = spot::all();
			$user = user::all();
			$blog = blog::all();

			$visitor = 0;
			foreach($spot as $s){
				$visitor += $s->views_spot;
			}

			$countGlobal = Storage::get('count.txt');

			$visitor = $countGlobal + $visitor;

			$arrCounted = ['spot'=>$spot, 'user'=>$user, 'blog'=>$blog, 'views'=>$visitor];

			View::share($arrCounted);
		}

		public function index(){
			$data = [
				'title' => 'Dashboard | Guidenesia Admin Panel',
				'judul1' => 'Dashboard',
				'judul2' => 'Control Panel'
			];
			return view('admin/content/dashboard', $data);
		}

	/*
		end important
	*/

    /*
		Page Users
    */

		public function list_user(){
			$users = user::paginate(10);
			$data = [
				'title' => 'Users Data | Guidenesia Admin Panel',
				'judul1' => 'Users Data',
				'judul2' => 'List Users',
				'users'=>$users
			];
			return view('admin/content/users/list', $data);
		}

		public function tambah_user(){
			$data = [
				'title' => 'Tambah User | Guidenesia Admin Panel',
				'judul1' => 'Tambah User',
				'judul2' => 'Form Input'
			];
			return view('admin/content/users/tambah', $data);
		}

		public function tambah_user_proses(Request $request){
			$this->validate($request, [
				'username'=>'required|min:4',
				'password'=>'required|min:4',
				'name'=>'required|string',
				'email'=>'required|email'
			]);

			$data = user::where('email', '=', $request->email)->get();
			$errors = '';
			if ($data->count() > 0) {
				return redirect()->back()->withInput($request->input())->withErrors(['errors'=>'email sudah ada!']);
			}else{
				$tambah = user::create([
					'name' => $request->name,
					'username' => $request->username,
					'email' => $request->email,
					'password' => hash::make($request->password)
				]);

				if ($tambah) {
					return redirect('admin/users/list')->with(['message' => 'Data berhasil tersimpan']);
				}
			}


		}

		public function edit_user($id_user){
			$user = user::find($id_user);
			$data = [
				'title' => 'Edit User | Guidenesia Admin Panel',
				'judul1' => 'Tambah User',
				'judul2' => 'Form Input',
				'user' => $user
			];
			return view('admin/content/users/edit', $data);
		}

		public function edit_user_proses($id_user, Request $request){
			$this->validate($request,[
				'username'=>'required|min:4',
				'name'=>'required|string',
				'email'=>'required|email'
			]);

			$user = user::find($id_user);
			$user->username = $request->username;
			$user->name = $request->name;
			$user->email = $request->email;
			if (!empty($request->password)) {
				$user->password = hash::make($request->password);
			}
			$user->save();
			return redirect('admin/users/list')->with(['message' => 'Data berhasil terupdate']);
		}

		public function hapus_user($id_user){
			$user = user::find($id_user);
			$user->delete();
			return redirect('admin/users/list')->with(['message' => 'hapus berhasil']);
		}

    /*
		End Page Users
    */

	/*
		Page Kategori
	*/

		public function list_kategori_spot(){
			$kategori = Kategori::paginate(10);
			$data = [
				'judul1'=>'Kategori',
				'judul2'=>'List Data',
				'title'=>'List Data Kategori | Guidenesia Admin Panel',
				'kategori'=>$kategori
			];
			return view('admin/content/kategori/spot/list', $data);
		}

		public function tambah_kategori_spot(){
			$data = [
				'judul1'=>'Form Kategori',
				'judul2'=>'Tambah Data',
				'title'=>'Tambah Data Kategori | Guidenesia Admin Panel'
			];
			return view('admin/content/kategori/spot/tambah', $data);
		}

		public function tambah_kategori_spot_proses(Request $request){
			$this->validate($request, [
				'nama_kategori'=>'required',
				'status_kategori'=>'required'
			]);

			$tambah = kategori::create([
				'nama_kategori'=>$request->nama_kategori,
				'deskripsi_kategori'=>$request->deskripsi_kategori,
				'status_kategori'=>$request->status_kategori
			]);

			if ($tambah) {
				return redirect('admin/spot/kategori/list')->with(['message'=>'data berhasil disimpan.']);
			}
		}

		public function edit_kategori_spot($id_kategori){
			$kategori = kategori::find($id_kategori);
			$data = [
				'judul1'=>'Form Kategori',
				'judul2'=>'Edit Data',
				'title'=>'Edit Data Kategori | Guidenesia Admin Panel',
				'kategori'=>$kategori
			];
			return view('admin/content/kategori/spot/edit', $data);
		}

		public function edit_kategori_spot_proses($id_kategori, Request $request){
			$this->validate($request, [
				'nama_kategori'=>'required',
				'status_kategori'=>'required'
			]);

			$kategori = kategori::find($id_kategori);
			$kategori->nama_kategori = $request->nama_kategori;
			$kategori->status_kategori = $request->status_kategori;
			$kategori->deskripsi_kategori = $request->deskripsi_kategori;
			$kategori->save();

			return redirect('admin/spot/kategori/list')->with(['message'=>'data berhasil diubah']);
		}

		public function hapus_kategori_spot($id_kategori){
			$kategori = kategori::find($id_kategori);

			$kategori->delete();
			$message = ['message'=>'data berhasil dihapus.'];

			return redirect()->back()->with($message);
		}

		public function list_kategori_blog(){
			$kategori = kategori_blog::paginate();
			$data = [
				'judul1'=>'Kategori',
				'judul2'=>'List Data',
				'title'=>'List Data Kategori | Guidenesia Admin Panel',
				'kategori'=>$kategori
			];
			return view('admin/content/kategori/blog/list', $data);
		}

		public function tambah_kategori_blog(){
			$data = [
				'judul1'=>'Form Kategori',
				'judul2'=>'Tambah Data',
				'title'=>'Form Tambah Data | Guidenesia Admin Panel'
			];
			return view('admin/content/kategori/blog/tambah', $data);
		}

		public function tambah_kategori_blog_proses(Request $request){
			$this->validate($request, [
				'nama_kategori'=>'required',
				'status_kategori'=>'required'
			]);

			$tambah = kategori_blog::create([
				'nama_kategori_blog'=>$request->nama_kategori,
				'deskripsi_kategori_blog'=>$request->deskripsi_kategori,
				'status_kategori_blog'=>$request->status_kategori
			]);

			if ($tambah) {
				return redirect('admin/blog/kategori/list')->with(['message'=>'data berhasil disimpan.']);
			}
		}

		public function edit_kategori_blog($id_kategori_blog){
			$kategori = kategori_blog::find($id_kategori_blog);
			$data = [
				'judul1'=>'Form Kategori',
				'judul2'=>'Edit Data',
				'title'=>'Edit Data Kategori | Guidenesia Admin Panel',
				'kategori'=>$kategori
			];
			return view('admin/content/kategori/blog/edit', $data);
		}

		public function edit_kategori_blog_proses($id_kategori_blog, Request $request){
			$this->validate($request, [
				'nama_kategori'=>'required',
				'status_kategori'=>'required'
			]);

			$kategori = kategori_blog::find($id_kategori_blog);
			$kategori->nama_kategori_blog = $request->nama_kategori;
			$kategori->deskripsi_kategori_blog = $request->deskripsi_kategori;
			$kategori->status_kategori_blog = $request->status_kategori;

			return redirect('admin/blog/kategori/list')->with(['message'=>'data berhasil diubah.']);
		}

		public function hapus_kategori_blog($id_kategori_blog){
			$kategori = kategori_blog::find($id_kategori_blog);

			$kategori->delete();
			$message = ['message'=>'data berhasil dihapus.'];

			return redirect('admin/blog/kategori/list')->with($message);
		}

	/*
		End Kategori
	*/	

	/*
		Page Provinsi
	*/

		public function list_provinsi(){
			$provinsi = provinsi::paginate(10);
			$data = [
				'judul1'=>'Provinsi',
				'judul2'=>'List Data',
				'title'=>'List Data Provinsi | Guidenesia Admin Panel',
				'provinsi'=>$provinsi
			];
			return view('admin/content/provinsi/list',$data);
		}

		public function tambah_provinsi(){
			$data = [
				'judul1'=>'Provinsi',
				'judul2'=>'Tambah Data',
				'title'=>'Tambah data provinsi | Guidenesia Admin Panel'
			];
			return view('admin/content/provinsi/tambah', $data);
		}

		public function tambah_provinsi_proses(Request $request){
			$this->validate($request, [
				'provinsi'=>'required',
				'status_provinsi'=>'required'
			]);

			$tambah = provinsi::create([
				'nama_provinsi'=>$request->provinsi,
				'status_provinsi'=>$request->status_provinsi
			]);

			return redirect('admin/provinsi/list')->with(['message'=>'data berhasil ditambahkan']);
		}

		public function edit_provinsi($id_provinsi){
			$provinsi = provinsi::find($id_provinsi);
			$data = [
				'judul1'=>'Provinsi',
				'judul2'=>'Edit Data',
				'title'=>'Edit data provinsi | Guidenesia Admin Panel',
				'provinsi'=>$provinsi
			];
			return view('admin/content/provinsi/edit', $data);
		}

		public function edit_provinsi_proses($id_provinsi, Request $request){
			$this->validate($request, [
				'nama_provinsi'=>'required',
				'status_provinsi'=>'required'
			]);

			$provinsi = provinsi::find($id_provinsi);
			$provinsi->nama_provinsi = $request->nama_provinsi;
			$provinsi->status_provinsi = $request->status_provinsi;
			$provinsi->save();

			return redirect('admin/provinsi/list')->with(['message'=>'data berhasil diupdate']);
		}

		public function hapus_provinsi($id_provinsi){
			$provinsi = provinsi::find($id_provinsi);
			$provinsi->delete();

			return redirect('admin/provinsi/list')->with(['message'=>'data berhasil dihapus']);
		}

	/*
		End Provinsi
	*/

	/*
		Kota
	*/
		public function list_kota(){
			$kota = kota::paginate(10);

			$data = [
				'judul1'=>'Kota',
				'judul2'=>'List Data',
				'title'=>'List Data Kota | Guidenesia Admin Panel',
				'kota'=>$kota
			];

			return view('admin/content/kota/list', $data);
		}

		public function tambah_kota(){
			$provinsi = provinsi::all();

			$data = [
				'judul1'=>'Kota',
				'judul2'=>'Tambah Data',
				'title'=>'Tambah Data Kota | Guidenesia Admin Panel',
				'provinsi'=>$provinsi
			];

			return view('admin/content/kota/tambah', $data);
		}

		public function tambah_kota_proses(Request $request){
			$this->validate($request, [
				'nama_kota'=>'required',
				'provinsi'=>'required',
				'foto_kota'=>'required',
				'status_kota'=>'required'
			]);

			$fileFoto = $request->foto_kota;

			$ext = $fileFoto->getClientOriginalExtension();

			$namaFile = $request->nama_kota.'.'.$ext;

			$dir = './images/kota';

			$fileFoto->move($dir, $namaFile);

			$tambah = kota::create([
				'id_provinsi'=>$request->provinsi,
				'nama_kota'=>$request->nama_kota,
				'foto_kota'=>$namaFile,
				'status_kota'=>$request->status_kota
			]);

			return redirect('admin/kota/list')->with(['message'=>'data berhasil ditambah']);
		}

		public function edit_kota($id_kota){
			$kota = kota::find($id_kota);
			$provinsi = provinsi::all();

			$data = [
				'judul1'=>'Kota',
				'judul2'=>'Edit Data',
				'title'=>'Edit Data Kota | Guidenesia Admin Panel',
				'kota'=>$kota,
				'provinsi'=>$provinsi
			];

			return view('admin/content/kota/edit', $data);
		}

		public function edit_kota_proses($id_kota, Request $request){
			$this->validate($request, [
				'nama_kota'=>'required',
				'provinsi'=>'required',
				'foto_kota'=>'required',
				'status_kota'=>'required'
			]);

			$fileFoto = $request->foto_kota;

			$ext = $fileFoto->getClientOriginalExtension();

			$namaFile = $request->nama_kota.'.'.$ext;

			$dir = './images/kota';

			$fileFoto->move($dir, $namaFile);
			
			$kota = kota::find($id_kota);
			$kota->nama_kota = $request->nama_kota;
			$kota->id_provinsi = $request->provinsi;
			if (!empty($fileFoto)) {
				$kota->foto_kota = $namaFile;
			}
			$kota->status_kota = $request->status_kota;
			$kota->save();

			return redirect('admin/kota/list')->with(['message'=>'data berhasil ditambah']);
		}

		public function hapus_kota($id_kota){
			$kota = kota::find($id_kota);
			$kota->delete();

			return redirect('admin/kota/list')->with(['message'=>'data berhasil dihapus']);
		}
	/*
		end kota
	*/

	/*
		Konten input
	*/

		/*
			spot
		*/
			public function list_spot(){

				$page = Input::get('page');

				$spot = spot::orderBy('publish_at', 'desc')->paginate(10);
				
				$data = [
					'judul1'=>'Spot',
					'judul2'=>'List Data',
					'title'=>'List Data Spot | Guidenesia Admin Panel',
					'page'=>$page,
					'spot'=>$spot
				];

				return view('admin/content/spot/list', $data);
			}

			public function list_cari_spot(){
				$page = Input::get('page');
				$cari = input::get('key');
				$spot = spot::where('judul_spot', 'LIKE', '%'.$cari.'%')->paginate(10);
				
				$data = [
					'judul1'=>'Spot',
					'judul2'=>'List Data',
					'title'=>'List Data Spot | Guidenesia Admin Panel',
					'page'=>$page,
					'spot'=>$spot
				];

				return view('admin/content/spot/list_cari', $data);
			}

			public function tambah_spot(){
				
				$kategori = kategori::all();
				$kota = kota::all();
				$provinsi = provinsi::all();

				$data = [
					'judul1'=>'Spot',
					'judul2'=>'Tambah Spot',
					'title'=>'Form Tambah Spot | Guidenesia Admin Panel',
					'kategori'=>$kategori,
					'kota'=>$kota,
					'provinsi'=>$provinsi
				];

				return view('admin/content/spot/tambah', $data);

			}

			public function uploadFoto(Request $request){

				$this->validate($request, [
					'file'=>'required'
				]);

				$fileFoto = $request->file;

				$name = $fileFoto->getClientOriginalName();

				$name = explode('.',$name);

				$name = $name[0].'-'.date('dmY');

				$ext = $fileFoto->getClientOriginalExtension();

				$namaFile = $name.'.'.$ext;

				$dir = './images/konten/spot/';

				$fileFoto->move($dir, $namaFile);

				echo url('images/konten/spot/').'/'.$namaFile;

			}

			public function tambah_spot_proses(Request $request){

				$this->validate($request, [
					'kategori'=>'required',
					'provinsi'=>'required',
					'kota'=>'required',
					'judul'=>'required',
					'slug'=>'required',
					'konten'=>'required',
					'alamat'=>'required',
					'telepon'=>'required',
					'email'=>'required',
					'jamkerja'=>'required',
					'longitude'=>'required',
					'latitude'=>'required',
					'meta_deskripsi'=>'required',
					'meta_keyword'=>'required',
					'status'=>'required'
				]);

				$id_kategori = $request->kategori;
				$id_provinsi = $request->provinsi;
				$id_kota = $request->kota;
				$id_user = Auth::user()->id_user;
				$judul = $request->judul;
				$slug = strtolower($request->slug);
				$foto = $request->headerName;
				$konten = $request->konten;
				$alamat = $request->alamat;
				$telepon = $request->telepon;
				$email = $request->email;
				$jamkerja = $request->jamkerja;
				$longitude = $request->longitude;
				$latitude = $request->latitude;
				$meta_deskripsi = $request->meta_deskripsi;
				$meta_keyword = $request->meta_keyword;
				$status = $request->status;

				$tambah = spot::create([
					'slug_spot'=>$slug,
					'id_kategori'=>$id_kategori,
					'id_kota'=>$id_kota,
					'id_provinsi'=>$id_provinsi,
					'id_user'=>$id_user,
					'judul_spot'=>$judul,
					'foto_spot'=>$foto,
					'content_spot'=>$konten,
					'telepon_spot'=>$telepon,
					'email_spot'=>$email,
					'alamat_spot'=>$alamat,
					'jamkerja_spot'=>$jamkerja,
					'long_spot'=>$longitude,
					'lat_spot'=>$latitude,
					'meta_deskripsi'=>$meta_deskripsi,
					'meta_keyword'=>$meta_keyword,
					'status_spot'=>$status,
					'publish_at'=>date('Y-m-d H:i:s'),
					'views_spot'=>0
				]);

				$newsLetterEmail = SubscribeNewsletter::all();

				if ($tambah) {

					foreach ($newsLetterEmail as $email) {
						$data = [
							'email'=>$email->email,
							'judul'=>$judul,
							'konten'=>$konten,
							'slug'=>$slug
						];

						$email1 = $email->email;
						$judul = $judul;
						$konten = $konten;
						$slug = $slug;

						Mail::send('user.content.pages.contactProses.templateEmailForNewsLetter', $data, function($message) use ($email1, $judul, $konten, $slug) {
							$message->to($email1)
							->subject('Ada wisata baru di guidenesia.id!');
							$message->from('officialguidenesia@gmail.com',' officialguidenesia@gmail.com');
						});

					}

					return redirect('admin/spot/list')->with(['message'=>'data berhasil disimpan.']);
				}

			}

			public function edit_spot($id_spot){
				$spot = spot::find($id_spot);
				$kategori = kategori::all();
				$kota = kota::all();
				$provinsi = provinsi::all();
				$page = Input::get('page');

				$data = [
					'judul1'=>'Spot',
					'judul2'=>'Edit Spot',
					'title'=>'Form Edit Spot | Guidenesia Admin Panel',
					'kategori'=>$kategori,
					'kota'=>$kota,
					'provinsi'=>$provinsi,
					'spot'=>$spot,
					'page'=>$page
				];

				return view('admin/content/spot/edit', $data);
			}

			public function edit_spot_proses($id_spot, Request $request){
				$this->validate($request, [
					'kategori'=>'required',
					'provinsi'=>'required',
					'kota'=>'required',
					'judul'=>'required',
					'slug'=>'required',
					'konten'=>'required',
					'alamat'=>'required',
					'jamkerja'=>'required',
					'longitude'=>'required',
					'latitude'=>'required',
					'meta_deskripsi'=>'required',
					'meta_keyword'=>'required',
					'status'=>'required'
				]);

				$page = Input::get('page');

				$spot = spot::find($id_spot);
				$spot->slug_spot = strtolower($request->slug);
				$spot->id_kategori = $request->kategori;
				$spot->id_kota = $request->kota;
				$spot->id_provinsi = $request->provinsi;
				$spot->id_user = Auth::user()->id_user;
				$spot->judul_spot = $request->judul;
				if ($request->headerName) {
					$spot->foto_spot = $request->headerName;
				}
				$spot->content_spot = $request->konten;
				$spot->alamat_spot = $request->alamat;
				$spot->telepon_spot = $request->telepon;
				$spot->email_spot = $request->email;
				$spot->jamkerja_spot = $request->jamkerja;
				$spot->long_spot = $request->longitude;
				$spot->lat_spot = $request->latitude;
				$spot->meta_deskripsi = $request->meta_deskripsi;
				$spot->meta_keyword = $request->meta_keyword;
				$spot->status_spot = $request->status;
				$spot->updated_at = date('Y-m-d H:i:s');
				$spot->save();

				return redirect('admin/spot/list?page='.$page.'')->with(['message'=>'data berhasil diupdate.']);

			}

			public function hapus_spot($id_spot){
				$spot = spot::find($id_spot);
				$spot->delete();

				return redirect('admin/spot/list')->with(['message'=>'data berhasil dihapus.']);
			}

			public function olah_galeri($id_spot){
				$galeri = galeri::where('id_spot', $id_spot)->get();

				$data = [
					'judul1'=>'Spot Galeri',
					'judul2'=>'Galeri',
					'title'=>'Galeri Spot | Guidenesia Admin Panel',
					'galeri'=>$galeri,
					'id_spot'=>$id_spot
				];

				return view('admin/content/spot/galeri', $data);
			}

			public function olah_galeri_proses($id_spot, Request $request){
				$foto = $request->galeri;
				$deskripsi = $request->deskripsi;

				foreach ($foto as $f) {
					$data['foto'][] = $f;
				}

				foreach ($deskripsi as $d) {
					$data['deskripsi'][] = $d;
				}

				$namaFiles = [];
				foreach ($data['foto'] as $row) {
					$name = $row->getClientOriginalName();
					$name = explode('.',$name);
					$name = $name[0].'-'.date('dmY');
					$ext = $row->getClientOriginalExtension();
					$namaFile = $name.'.'.$ext;
					$dir = './images/konten/spot/galeri/';
					$row->move($dir, $namaFile);
					$namaFiles[] = $namaFile;
				}

				print_r($namaFiles);

				$index = 0;
				foreach ($namaFiles as $value) {
					galeri::create([
						'id_spot'=>$id_spot,
						'foto_galeri'=>$value,
						'deskripsi'=>$data['deskripsi'][$index]
					]);

					$index++;
				}

				return redirect('admin/spot/galeri/'.$id_spot.'')->with(['message'=>'galeri berhasil ditambah.']);

			}

			public function olah_galeri_deskripsi_proses($id_galeri, Request $request){
				$galeri = galeri::find($id_galeri);
				$id_spot = $galeri->id_spot;
				$galeri->deskripsi = $request->deskripsii;
				$galeri->save();

				return redirect('admin/spot/galeri/'.$id_spot.'')->with(['message'=>'deskripsi galeri terupdate.']);
			}

			public function hapus_galeri($id_galeri){
				$galeri = galeri::find($id_galeri);
				$id_spot = $galeri->id_spot;
				$galeri->delete();

				return redirect('admin/spot/galeri/'.$id_spot.'')->with(['message'=>'galeri berhasil ditambah.']);
			}

		/*
			end spot
		*/

		/*
			input blog
		*/

			public function list_blog(){
				$page = Input::get('page');
				$blog = blog::with('User', 'kategori_blog')->orderBy('publish_at', 'desc')->paginate(10);

				$data = [
					'judul1'=>'Blog',
					'judul2'=>'List Data',
					'title'=>'List Data Blog | Guidenesia Admin Panel',
					'blog'=>$blog,
					'page'=>$page
				];

				return view('admin/content/blog/list', $data);
			}

			public function tambah_blog(){
				$kategori = kategori_blog::all();

				$data = [
					'judul1'=>'Blog',
					'judul2'=>'Tambah Blog',
					'title'=>'Tambah Blog | Guidenesia Admin Panel',
					'kategori'=>$kategori
				];

				return view('admin/content/blog/tambah', $data);
			}

			public function tambah_blog_proses(Request $request){
				$this->validate($request, [
					'judul'=>'required',
					'konten'=>'required',
					'kategori'=>'required',
					'foto'=>'required',
					'meta_deskripsi'=>'required',
					'meta_keyword'=>'required'
				]);

				$fileFoto = $request->foto;

				$name = $fileFoto->getClientOriginalName();
				$name = explode('.',$name);
				$name = $name[0].'-'.date('dmY');
				$ext = $fileFoto->getClientOriginalExtension();
				$namaFile = $name.'.'.$ext;
				$dir = 'public/images/konten/blog/header/';
				$fileFoto->move($dir, $namaFile);

				$tambah = blog::create([
					'judul_blog'=>$request->judul,
					'konten_blog'=>$request->konten,
					'id_kategori_blog'=>$request->kategori,
					'foto_blog'=>$namaFile,
					'id_user'=>Auth::user()->id_user,
					'slug_blog'=>strtolower(str_replace(' ', '-', $request->judul)),
					'meta_keyword'=>$request->meta_keyword,
					'meta_deskripsi'=>$request->meta_deskripsi,
					'views_blog'=>0,
					'publish_at'=>date('Y-m-d H:i:s'),
					'status_blog'=>$request->status
				]);

				if ($tambah) {
					return redirect('admin/blog/list')->with(['message'=>'data berhasil diupdate.']);
				}
			}

			public function edit_blog($id_blog){
				$blog = blog::find($id_blog);
				$kategori = kategori_blog::all();
				$page = Input::get('page');

				$data = [
					'judul1'=>'Blog',
					'judul2'=>'Edit Blog',
					'title'=>'Edit Blog | Guidenesia Admin Panel',
					'blog'=>$blog,
					'kategori'=>$kategori,
					'page'=>$page
				];

				return view('admin/content/blog/edit', $data);
			}

			public function edit_blog_proses($id_blog, Request $request){
				$this->validate($request, [
					'judul'=>'required',
					'konten'=>'required',
					'kategori'=>'required',
					'meta_deskripsi'=>'required',
					'meta_keyword'=>'required'
				]);

				$page = Input::get('page');

				$fileFoto = $request->foto;

				if (!empty($fileFoto)) {

					$name = $fileFoto->getClientOriginalName();
					$name = explode('.',$name);
					$name = $name[0].'-'.date('dmY');
					$ext = $fileFoto->getClientOriginalExtension();
					$namaFile = $name.'.'.$ext;
					$dir = 'public/images/konten/blog/header/';
					$fileFoto->move($dir, $namaFile);

					$blog = blog::find($id_blog);
					$blog->judul_blog = $request->judul;
					$blog->slug_blog = strtolower(str_replace(' ', '-', $request->judul));
					$blog->konten_blog = $request->konten;
					$blog->id_kategori_blog = $request->kategori;
					$blog->foto_blog = $namaFile;
					$blog->meta_deskripsi = $request->meta_deskripsi;
					$blog->meta_keyword = $request->meta_keyword;
					$blog->status_blog = $request->status;
					$blog->save();

				}else{

					$blog = blog::find($id_blog);
					$blog->judul_blog = $request->judul;
					$blog->slug_blog = strtolower(str_replace(' ', '-', $request->judul));
					$blog->konten_blog = $request->konten;
					$blog->id_kategori_blog = $request->kategori;
					$blog->meta_deskripsi = $request->meta_deskripsi;
					$blog->meta_keyword = $request->meta_keyword;
					$blog->status_blog = $request->status;
					$blog->save();

				}

				return redirect('admin/blog/list?page='.$page.'')->with(['message'=>'data berhasil diupdate.']);
			}

			public function hapus_blog($id_blog){
				$blog = blog::find($id_blog);
				$blog->delete();
				return redirect('admin/blog/list')->with(['message'=>'data berhasil dihapus.']);
			}

		/*
			end blog
		*/

		/*
			page lainnya
		*/

			public function page_kontak(){
				$page = pagekontak::find(1);
				$data = [
					'judul1'=>'Page Kontak',
					'judul2'=>'Setting Panel',
					'title'=>'Page Kontak | Guidenesia Admin Panel',
					'page'=>$page
				];
				return view('admin/content/pageKontak/form', $data);
			}

			public function page_kontak_proses($id_page_kontak, Request $request){
				$this->validate($request, [
					'deskripsi'=>'required',
					'alamat'=>'required',
					'telepon'=>'required',
					'email'=>'required',
					'facebook'=>'required',
					'twitter'=>'required',
					'longitude'=>'required',
					'latitude'=>'required'
				]);

				$kontak = pageKontak::find($id_page_kontak);
				$kontak->deskripsi_kontak = $request->deskripsi;
				$kontak->alamat_kontak = $request->alamat;
				$kontak->telepon_kontak = $request->telepon;
				$kontak->email_kontak = $request->email;
				$kontak->fb_kontak = $request->facebook;
				$kontak->tw_kontak = $request->twitter;
				$kontak->long_kontak = $request->longitude;
				$kontak->lat_kontak = $request->latitude;
				$kontak->save();

				return redirect('admin/page/kontak')->with(['message'=>'update kontak berhasil!']);
			}

		/*
			end page lainnya
		*/

	/*
		end kontent input
	*/

	}
