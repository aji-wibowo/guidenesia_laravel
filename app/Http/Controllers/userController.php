<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use FarhanWazir\GoogleMaps\GMaps;
use MadWeb\Robots\Robots;
// use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Storage;
use Session;
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
use App\Lokasi;
use App\SubscribeNewsletter;

class userController extends baseController
{

	protected $gmap;

	public function __construct(GMaps $gmap, Robots $robots){
		$this->gmap = $gmap;
		$this->robots = $robots;

		$latest = spot::all()->where('status_spot', 1)->random(3);

		foreach ($latest as $last) {
			$keyword = explode(',',$last->meta_keyword);
			foreach ($keyword as $key) {
				$keywordku[] = $key;
			}
		}

		$this->countVisitor();

		View::share('latest', $latest);
		View::share('tags', $keywordku);
		View::share('robots', $this->robots);
	}

    /*
		Index
    */
		public function index(){
			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();
			$spot = spot::with('kategori', 'kota', 'provinsi', 'user')->where('status_spot', 1)->limit(4)->inRandomOrder()->get();
			$galeri = galeri::limit(4)->get();

			$data = [
				'title' => 'Guidenesia | Your Traveller Assistance',
				'mode' => 'home',
				'kategori' => $kategori,
				'kota' => $kota,
				'spot' => $spot,
				'galeri' => $galeri
			];

			return view('user/content/home', $data);
		}
	/*
		end Index
	*/

	/*
		pencarian / tags / kota / provinsi / catalog
	*/
		public function pencarian(){
			$getTempat = Input::get('tempat');
			$getKota = Input::get('kota');
			$getKategori = Input::get('kategori');

			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();

			$result = spot::with('kategori', 'kota', 'provinsi', 'user')->Where('judul_spot', 'like', '%' . $getTempat. '%')->Where('id_kota', $getKota)->Where('id_kategori', $getKategori)->where('status_spot', 1)->paginate(10);
			$result->withPath('cari?tempat='.$getTempat.'&kota='.$getKota.'&kategori='.$getKategori.'');

			$data = [
				'title' => 'Pencarian '.$getTempat.' | Guidenesia.id',
				'mode' => 'cari',
				'kategori' => $kategori,
				'kota' => $kota,
				'tempat' => $getTempat,
				'result' => $result
			];

			return view('user/content/cari/cari', $data);
		}

		public function search(){
			$getTempat = Input::get('tempat');
			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();

			$result = spot::with('kategori', 'kota', 'provinsi', 'user')->Where('status_spot', 1)->Where('judul_spot', 'like', '%' . $getTempat. '%')->OrWhereHas('kota', function ($query) use ($getTempat) {
				$query->where('nama_kota', 'like', '%'.$getTempat.'%');
			})->paginate(10);

			$result->withPath('search?tempat='.$getTempat.'');

			$data = [
				'title' => 'Pencarian '.$getTempat.' | Guidenesia.id',
				'mode' => 'cari',
				'kategori' => $kategori,
				'kota' => $kota,
				'tempat' => $getTempat,
				'result' => $result
			];

			return view('user/content/cari/cari', $data);
		}

		public function tag($tag){
			$getTag = $tag;
			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();

			$result = spot::with('kategori', 'kota', 'provinsi', 'user')->Where('meta_keyword', 'like', '%' . $getTag. '%')->where('status_spot', 1)->paginate(10);

			$data = [
				'title' => 'Tag '.$getTag.' | Guidenesia.id',
				'mode' => 'cari',
				'kategori' => $kategori,
				'kota' => $kota,
				'tag' => $getTag,
				'result' => $result
			];

			return view('user/content/cari/tag', $data);
		}

		public function kota($kotas){
			$getKota = $kotas;
			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();

			$id_kota = kota::where('nama_kota', '=', $kotas)->where('status_kota', 1)->firstOrFail('id_kota');

			$result = spot::with('kategori', 'kota', 'provinsi', 'user')->Where('id_kota', $id_kota->id_kota)->Where('status_spot', 1)->paginate(10);

			$data = [
				'title' => 'Kota '.$getKota.' | Guidenesia.id',
				'mode' => 'cari',
				'kategori' => $kategori,
				'kota' => $kota,
				'kotas' => $getKota,
				'result' => $result
			];

			return view('user/content/cari/kota', $data);
		}

		public function catalog(){
			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();
			$spot = spot::with('kategori', 'kota', 'provinsi', 'user')->where('status_spot', 1)->get();

			$data = [
				'title' => 'Guidenesia | Your Traveller Assistance',
				'mode' => 'home',
				'kategori' => $kategori,
				'kota' => $kota,
				'spot' => $spot,
			];

			return view('user/content/cari/catalog', $data);
		}
	/*
		end pencarian / tags / kota / provinsi / catalog
	*/

	/*
		Spot
	*/
		// display spot
		public function detail_spot($slug){
			$detail = spot::with('user', 'kota', 'provinsi')->where('slug_spot', $slug)->where('status_spot', 1)->firstOrFail();
			$this->addVisitor($slug);
			$galeri = galeri::where('id_spot', $detail->id_spot)->get();
			// $ip = !empty(session('ip_address')) ? session('ip_address') : 0;

			// echo $ip;
			$ip = \Request::ip();
			$temp_lokasi = lokasi::where('ip_address', $ip)->orderBy('created_at', 'desc')->first();

			if(!empty($temp_lokasi)){
				$config['center']= "".$detail->lat_spot.", ".$detail->long_spot."";
				$config['zoom']=17;
				$config['map_height']="400px";
				$config['directions'] = TRUE;
				$config['directionsStart'] = "".$temp_lokasi->latitude.", ".$temp_lokasi->longitude."";
				$config['directionsEnd'] = "".$detail->lat_spot.", ".$detail->long_spot."";
				$this->gmap->initialize($config);
				$marker['position']= "".$temp_lokasi->latitude.", ".$temp_lokasi->longitude."";
				$this->gmap->add_marker($marker);
			}else{
				$config['center']= "".$detail->lat_spot.", ".$detail->long_spot."";
				$config['zoom']=17;
				$config['map_height']="600px";
				$this->gmap->initialize($config);
				$marker=array();
				$marker['position']= "".$detail->lat_spot.", ".$detail->long_spot."";
				$this->gmap->add_marker($marker);
			}

			$map = $this->gmap->create_map();

			$data = [
				'title' => $detail->judul_spot,
				'mode' => 'detail',
				'detail' => $detail,
				'galeri' => $galeri,
				'map' => $map
			];

			return view('user/content/spot/detail', $data);
		}
	/*
		end Spot
	*/

	/*
		kontak
	*/
		public function page_kontak(){
			$kontak = pagekontak::firstOrFail();
			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();

			$config['center']="".$kontak->lat_kontak.", ".$kontak->long_kontak."";
			$config['zoom']=17;
			$config['map_height']="600px";
			$this->gmap->initialize($config);
			$marker=array();
			$marker['position']="".$kontak->lat_kontak.", ".$kontak->long_kontak."";
			$this->gmap->add_marker($marker);

			$map = $this->gmap->create_map();

			$data = [
				'title' => 'Halaman Kontak | Guidenesia.id',
				'mode' => 'contact',
				'kontak' => $kontak,
				'kategori' => $kategori,
				'kota' => $kota,
				'map' => $map
			];

			return view('user/content/pages/contact', $data);
		}

		public function send_email_contact(Request $request){

// 			$this->validate($request, [
// 				'nama'=>'required|min:4',
// 				'email'=>'required|min:4',
// 				'nope'=>'required|min:10',
// 				'namsubjeke'=>'required|string',
// 				'pesan'=>'required|email'
// 			]);
			
			$nama = $request->nama;
			$email = $request->email;
			$subject = $request->subjek;
			$pesan = $request->pesan;
			$nope = $request->nope;
			
			$nope1 = substr($nope, 0, 1);
			
			if($nope1 == 0){
			    return redirect('contact')->with(array('message'=>'Nomor Whatsapp harus diawali kode negara! ex: 6285216285309'));
			}
			
			$pesan_2 = "Hai $nama, Pesan kamu sudah kami terima dan akan kami respon segera! Salam Guiders! by guidenesia.id";

			$response = $this->send_whatsapp($nope, $pesan_2);
			

			$data = [
				'nama' => $nama,
				'email' => $email,
				'pesan' => $pesan
			];

			Mail::send('user.content.pages.contactProses.templateEmail', $data, function($message) use ($nama, $email) {
				$message->to($email, $nama)
				->subject('Pesan Kamu Kami Terima!');
				$message->from('officialguidenesia@gmail.com',' officialguidenesia@gmail.com');
			});

			if (Mail::failures()) {
				return redirect('contact')->with(array('message'=>'Error, Silahkan coba beberapa saat lagi.'));
			}else{

				Mail::send('user.content.pages.contactProses.templateEmailForAdmin', $data, function($message) use ($nama, $email, $subject) {
					$message->to('officialguidenesia@gmail.com', 'Official Guidenesia')
					->subject($subject);
					$message->from($email, $nama);
				});

				return redirect('contact')->with(array('message'=>'Terimakasih telah menghubungi kami. Kami akan merespon segera pesan Anda!'));
			}

		}

	/*
		end kontak
	*/

	/*
		page about
	*/

		public function page_about(){
			$kota = kota::where('status_kota', 1)->get();
			$kategori = kategori::where('status_kategori', 1)->get();
			
			$jumlahWisata = spot::all()->count();
			$jumlahGaleri = galeri::all()->count();
			$jumlahKota = $kota->count();

			$data = [
				'title' => 'Halaman Tentang | Guidenesia.id',
				'mode' => 'about',
				'kategori' => $kategori,
				'kota' => $kota,
				'jumlahWisata' => $jumlahWisata,
				'jumlahGaleri' => $jumlahGaleri,
				'jumlahKota' => $jumlahKota
			];

			return view('user/content/pages/about', $data);
		}

	/*
		end about
	*/

		public function trySend(){
			$result = $this->send_whatsappVsendiri('085216285309','6283156991848','Ini pesan','eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6IjYyODUyMTYyODUzMDkifQ.pbA6sLliblLNoI6ZaM3PwTon5-ZS3iG9XtiYFoDKygI');
			dd($result);
		}

	/*
		fitur newsletter
	*/
		public function addNewsLetter(Request $request){
			$email = $request->email;

			if ($email) {

				$isEmailExist = SubscribeNewsletter::Where('email', 'like', '%' . $email. '%');

				if ($isEmailExist->count() > 0)	{
					return redirect('/')->with(array('message'=>'email sudah ada!'));
				} else {
					$tambah = SubscribeNewsletter::create([
						'email' => $request->email
					]);

					if ($tambah) {
						return redirect('/')->with(array('message'=>'berhasil subscribe!'));
					} else {
						return redirect('/')->with(array('message'=>'gagal subscribe, mohon coba lagi!'));
					}
				}

			} else {
				return redirect('/')->with(array('message'=>'masukan email dengan benar!'));
			}
		}
	/*
		end newsletter
	*/

	}
