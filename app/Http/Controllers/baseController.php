<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Auth;
use View;

use App\Spot;

class baseController extends Controller
{
	protected $gmap;

	public function __construct(GMaps $gmap){
		$this->gmap = $gmap;

		$latest = spot::limit(3)->where('status_spot', 1)->get();

		foreach ($latest as $last) {
			$keyword = explode(',',$last->meta_keyword);
			foreach ($keyword as $key) {
				$keywordku[] = $key;
			}
		}

		View::share('latest', $latest);
		View::share('tags', $keywordku);
	}

	public function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	public function addVisitor($slug){
		$spot = spot::where('slug_spot', $slug)->first();
		$increment = $spot->views_spot + 1;
		$spot->views_spot = $increment;
		$spot->save();
	}

	public function countVisitor(){
		$contents = Storage::get('count.txt');
		$contents = (int)$contents + 1;
		Storage::put('count.txt', $contents);
		Storage::disk('local')->put('count.txt', $contents);
	}

	public function getFileCount(){
		$contents = Storage::get('count.txt');
		return $contents;
	}

	public function send_whatsapp($nope, $message){
		$pesan = base64_encode($message);
		$nope = $nope;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://in.wapi.xyz/sendTextMessage');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"username\": \"6285216285309\",
			\"jid\": \"$nope@s.whatsapp.net\", 
			\"message\": \"$pesan\"}");
		curl_setopt($ch, CURLOPT_POST, 1);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6IjYyODUyMTYyODUzMDkifQ.pbA6sLliblLNoI6ZaM3PwTon5-ZS3iG9XtiYFoDKygI';
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
	
	
	public function send_whatsappVsendiri($username, $noTujuan, $pesan, $key){

		$arraySubmit = [
			'username'=>$username,
			'noTujuan'=>$noTujuan,
			'pesan'=>$pesan,
			'key'=>$key
		];
		
		$payload = json_encode($arraySubmit);

		// dd($payload);
		
		// Prepare new cURL resource
		$ch = curl_init('https://guidenesia.id/api/send_whatsapp');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		
		// Set HTTP Header for POST request 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($payload))
		);
		
		// Submit the POST request
		$result = curl_exec($ch);

		echo json_encode($result);
		
		// Close cURL session handle
		curl_close($ch);
	
		// $ch = curl_init();

		// curl_setopt($ch, CURLOPT_URL, 'https://guidenesia.id/laravel/public/api/send_whatsapp');
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $arraySubmit);
		// curl_setopt($ch, CURLOPT_POST, 1);

		// $headers = array();
		// $headers[] = 'Accept: application/json';
		// // $headers[] = 'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6IjYyODUyMTYyODUzMDkifQ.pbA6sLliblLNoI6ZaM3PwTon5-ZS3iG9XtiYFoDKygI';
		// $headers[] = 'Content-Type: application/json';
		// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// $result = curl_exec($ch);
		// if (curl_errno($ch)) {
		// 	echo 'Error:' . curl_error($ch);
		// }
		// curl_close($ch);

		// $decod = json_decode($result,true);
		
		// // $errornya = $decod['error'];
		// dd($decod);
		// switch ($errornya) {
		// 	case '0':
		// 	$status = "sukses";
		// 	break;

		// 	case '1':
		// 	$status = "pending";
		// 	break;
		// }
	}

}
