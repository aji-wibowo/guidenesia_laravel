@extends('user/app') 
@section('mode', $mode) 
@section('title', $title) 
@section('addon', $map['js']) 
@section('konten')
<div class="home">
	<!-- Image by https://unsplash.com/@peecho -->
	<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url({{url('images/news.jpg')}})" data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="home_content">
					<div class="home_content_inner">
						<div class="home_title"><h1 class="home_title">Contact</h1></div>
						<div class="home_breadcrumbs">
							<ul class="home_breadcrumbs_list">
								<li class="home_breadcrumb"><a href="{{url('home')}}">Home</a></li>
								<li class="home_breadcrumb">Contact</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="find">
	<!-- Image by https://unsplash.com/@garciasaldana_ -->
	<div class="find_background_container prlx_parent">
		<div class="find_background prlx" style="background-image:url({{url('images/find.jpg')}})"></div>
	</div>
	<!-- <div class="find_background parallax-window" data-parallax="scroll" data-image-src="images/find.jpg" data-speed="0.8"></div> -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="find_title text-center">Temukan lokasi yang kamu cari disini!</div>
			</div>
			<div class="col-12">
				<div class="find_form_container">
					<form action="{{url('cari')}}" method="get" id="find_form" class="find_form d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-between justify-content-start flex-wrap">
						<div class="find_item">
							<div>Tempat:</div>
							<input name="tempat" type="text" class="destination find_input" required="required" placeholder="Keyword here">
						</div>
						<div class="find_item">
							<div>Kota:</div>
							<select name="kota" id="kota" class="dropdown_item_select find_input" required>
								<option value="">--Pilih Kota--</option>
								@foreach($kota as $rowK)
								<option value="{{$rowK->id_kota}}">{{$rowK->nama_kota}}</option>
								@endforeach
							</select>
						</div>
						<div class="find_item">
							<div>Kategori:</div>
							<select name="kategori" id="kota" class="dropdown_item_select find_input" required>
								<option value="">--Pilih Kategori--</option>
								@foreach($kategori as $rowKat)
								<option value="{{$rowKat->id_kategori}}">{{$rowKat->nama_kategori}}</option>
								@endforeach
							</select>
						</div>
						<button class="button find_button">Find</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Contact -->
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="contact_title">Hubungi Kami</div>
				<div class="contact_subtitle">Katakan hallo!</div>
			</div>
		</div>
		<div class="row contact_content">
			<div class="col-lg-5">
				<div class="contact_text">
					<p align="justify">{{$kontak->deskripsi_kontak}}</p>
				</div>
				<div class="contact_info">
					<div class="contact_info_box">i</div>
					<div class="contact_info_container">
						<div class="contact_info_content">
							<ul>
								<li>Address: {{$kontak->alamat_kontak}}</li>
								<li>Phone / Whatsapp: {{$kontak->telepon_kontak}}</li>
								<li>Email: {{$kontak->email_kontak}}</li>
							</ul>
						</div>
						<div class="contact_info_social">
							<ul>
								<!-- <li><a href="www.facebook.com/"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> -->
								<!-- <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li> -->
								<li><a href="https://web.facebook.com/{{$kontak->fb_kontak}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="https://www.twitter.com/{{$kontak->tw_kontak}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="contact_form_container">
					@if ($message = Session::get('message'))
					<div class="alert alert-info alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{ $message }}</strong>
					</div>
					@endif
					<form action="{{url('contact/send')}}" method="POST" id="contact_form" class="clearfix">
						{{ csrf_field() }}
						<input id="contact_input_name" value="{{old('nama')}}" name="nama" class="contact_input contact_input_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
						<input id="contact_input_email" value="{{old('email')}}" name="email" class="contact_input contact_input_email" type="text" placeholder="E-mail" required="required" data-error="E-mail is required.">
						<input id="contact_input_name" value="{{old('nope')}}" name="nope" class="contact_input contact_input_name" type="number" placeholder="Whatsapp / Nomor HP. contoh : 6285216285309" required="required" data-error="No. Whatsapp is required.">
						<input id="contact_input_subject" value="{{old('subjek')}}" name="subjek" class="contact_input contact_input_subject" type="text" placeholder="Subject">
						<textarea id="contact_input_message" value="{{old('pesan')}}" name="pesan" class="contact_message_input contact_input_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
						<button id="contact_send_btn" type="submit" name="submit" class="contact_send_btn trans_200" value="Submit">Send</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row contact_map">
			<!-- Google Map -->
			<div class="col-md-12">
				<div id="google_map">
					<div class="map_container">
						<?= $map['html'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $map['js'] ?>
@endsection