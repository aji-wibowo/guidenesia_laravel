<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Session;
use Mail;
use Swift_SmtpTransport;
use Swift_Mailer;

use App\User;
use App\Kategori;
use App\Kategori_Blog;
use App\Provinsi;
use App\Kota;
use App\Spot;
use App\Lokasi;

class apiController extends Controller
{
	protected $url;

	public function __construct(UrlGenerator $url)
	{
		$this->url = $url;
	}

	public function ApiGetKota(){
		$kota = kota::all();
		return json_encode($kota);
	}

	public function ApiGetKotaById(Request $request){
		$id = $request->input('id');
		$where = [
			'id_provinsi'=>$id
		];
		$kota = kota::getByCond($where);
		return json_encode($kota);
	}

	public function uploadImgHeader(Request $request){
		$namaFile = $request->nama;
		if ($namaFile == '') {
			$imageName = 'Kesalahan';
		}else{
			if (!empty($namaFile)) {
				$nama = str_replace(' ','-', $namaFile);
				$data = $request->image;
				$image_array_1 = explode(";", $data);
				$image_array_2 = explode(",", $image_array_1[1]);

				$data = base64_decode($image_array_2[1]);

				$dir = 'public/images/konten/spot/header/';
				$imageName = $nama . '.png';
				$imageNameWithDir = $dir . $imageName;
				file_put_contents($imageNameWithDir, $data);
			}else{
				$data = $request->image;
				$image_array_1 = explode(";", $data);
				$image_array_2 = explode(",", $image_array_1[1]);

				$data = base64_decode($image_array_2[1]);

				$dir = 'public/images/konten/spot/header/';
				$imageName = time() . '.png';
				$imageNameWithDir = $dir . $imageName;
				file_put_contents($imageNameWithDir, $data);
			}
		}
		
		echo json_encode($imageName);
	}

	public function uploadImgBlog(Request $request){
		$this->validate($request, [
			'file'=>'required'
		]);

		$fileFoto = $request->file;

		$name = $fileFoto->getClientOriginalName();

		$name = explode('.',$name);

		$name = $name[0].'-'.date('dmY');

		$ext = $fileFoto->getClientOriginalExtension();

		$namaFile = $name.'.'.$ext;

		$dir = 'public/images/konten/blog/';

		$fileFoto->move($dir, $namaFile);

		echo url('images/konten/blog/').'/'.$namaFile;
	}

	public function getLogation(Request $request){
		$latitude = $request->latitude;
		$longitude = $request->longitude;
		$ip_address = $request->ip();

		session('ip_address', $ip_address);
		
		$temp_lokasi = lokasi::where('ip_address', $ip_address)->orderBy('created_at', 'desc');

		if ($temp_lokasi->count() > 0) {
			$row = $temp_lokasi->firstOrFail();
			$lokasi = Lokasi::find($row->id_temporary_lokasi);
			$lokasi->latitude = $latitude;
			$lokasi->longitude = $longitude;
		}else{
			$create = lokasi::create([
				'ip_address'=>$ip_address,
				'longitude'=>$longitude,
				'latitude'=>$latitude
			]);
		}
	}

	public function sendWhatsapp(Request $request){

		$this->validate($request, [
			'pesan'=>'required',
			'noTujuan'=>'required',
			'username'=>'required',
			'key'=>'required'
		]);

		$pesan = $request->pesan;
		$noTujuan = $request->noTujuan;
		$username = $request->username;
		$key = $request->key;

		$pesan = base64_encode($pesan);
		$nope = $noTujuan;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://in.wapi.xyz/sendTextMessage');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"username\": \"6285216285309\",
			\"jid\": \"$nope@s.whatsapp.net\", 
			\"message\": \"$pesan\"}");
		curl_setopt($ch, CURLOPT_POST, 1);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: '.$key;
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);

		$decod = json_decode($result,true);
		
		$errornya = $decod['error'];
		return $decod;
		// switch ($errornya) {
		// 	case '0':
		// 	$status = "sukses";
		// 	break;

		// 	case '1':
		// 	$status = "pending";
		// 	break;
		// }
	}

	public function sendEmailKirapac(Request $request){
		$this->validate($request, [
			'to'=>'required',
			// 'attach'=>'required'
		]);

		$to = $request->to;
		$fileAttach = $request->attach;

		if ($fileAttach) {
			$url = $fileAttach;  
			$file = 'storage/email_attach/order_confirmation.pdf';
			// Function to write image into file 
			file_put_contents($file, file_get_contents($url)); 
		}else{
			$file = 'kosong';
		}

		// Backup your default mailer
		$backup = Mail::getSwiftMailer();

		// Setup your gmail mailer
		$transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
		$transport->setUsername('officialguidenesia@gmail.com');
		$transport->setPassword('xhxdzdqqazhmrwxp');
		// Any other mailer configuration stuff needed...

		$gmail = new Swift_Mailer($transport);

		// Set the mailer as gmail
		Mail::setSwiftMailer($gmail);

		$nama = $to;
		$email = $to;

		$data = [
			'nama' => $to,
			'email' => $to,
			'file' => $file
		];

		if ($fileAttach) {
			// Send your message
			Mail::send('user.content.pages.contactProses.templateKirapac', $data, function($message) use ($nama, $email, $file) {
				$message->to($email, $nama)
				->subject('Konfirmasi Order KPL Online!')->attach($file);
				$message->from('claris.home@gmail.com',' Claris Order Confirmation');
			});
		}else{
			Mail::send('user.content.pages.contactProses.templateKirapac', $data, function($message) use ($nama, $email) {
				$message->to($email, $nama)
				->subject('Konfirmasi Order KPL Online!');
				$message->from('claris.home@gmail.com',' Claris Order Confirmation');
			});
		}

		// Restore your original mailer
		Mail::setSwiftMailer($backup);

		// Mail::send('user.content.pages.contactProses.templateEmail', $data, function($message) use ($nama, $email) {
		// 	$message->to($email, $nama)
		// 	->subject('Pesan Kamu Kami Terima!');
		// 	$message->from('officialguidenesia@gmail.com',' officialguidenesia@gmail.com');
		// });

		if (Mail::failures()) {
			return 'gagal';
		}else{
			return 'ok';
		}

	}

}
