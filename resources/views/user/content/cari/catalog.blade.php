@extends('user/app')

@section('mode', $mode)

@section('title', $title)

@section('konten')

<!-- Home -->

<div class="home">
	<div class="home_background" style="background-image:url({{url('images/home.jpg')}})"></div>
	<div class="home_content">
		<div class="home_content_inner">
			<h1 class="home_text_large"><h1 class="home_text_large">JELAJAHI</h1></h1>
			<h2 class="home_text_small m-top-10"><h2 class="home_text_small m-top-10">Semua Tempat Dengan Kami</h2></h2>
			{{-- <span class="home_text_small kebawah btn-head"><a href="{{url('spot/all')}}" title="berwisata bersama guidenesia.id">SEKARANG</a></span> --}}
		</div>
	</div>
</div>

<!-- Find Form -->

<div class="find">
	<div class="find_background parallax-window" data-parallax="scroll" data-image-src="{{url('images/find.jpg')}}" data-speed="0.5"></div>
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

<div class="top">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title text-center">
					<h2>Wisata yang ada di guidenesia</h2>
					<div>kunjungi bersama seseorang terdekat</div>
				</div>
			</div>
		</div>
		
		<select class="button-group filter-button-group kebawah borderCatalog" style="border: solid 1px rgba(254, 60, 82, 0.8);">
			<option value="*" selected="true">Semua</option>
			@foreach ($kota as $rowKota)
			<option value="{{$rowKota->nama_kota}}">{{$rowKota->nama_kota}}</option>
			@endforeach
		</select>

		<div class="row top_content grid">
			@foreach ($spot as $row)
			<div class="col-md-3 col-sm-6 top_col elemen-item {{$row->kota->nama_kota}}">
				<!-- Top Destination Item -->
				<div class="top_item kebawah">
					<a href="{{url('spot')}}/{{$row->slug_spot}}">
						<div class="top_item_image text-center"><img  class="lazyload" src="{{url('images/konten/spot/header')}}/{{$row->foto_spot}}" alt="{{$row->foto_spot}}"></div>
						<div class="top_item_content">
							<div class="top_item_price">{{$row->kota->nama_kota}}, {{$row->provinsi->nama_provinsi}}</div>
							<div class="top_item_text name">{{$row->judul_spot}}</div>
						</div>
					</a>
				</div>
			</div>
			@endforeach
		</div>

	</div>
</div>
</div>

<!-- Special -->

<div class="special">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title text-center">
					<h2>Kota</h2>
					<div>apa yang keren di kotamu?</div>
				</div>
			</div>
		</div>
	</div>
	<div class="special_content">
		<div class="special_slider_container">
			<div class="owl-carousel owl-theme special_slider">

				@foreach($kota as $k)
				<!-- Special Offers Item -->
				<div class="owl-item">
					<div class="special_item">
						<div class="special_item_background"><img class="lazyload" src="{{url('images/kota')}}/{{$k->foto_kota}}" alt="{{$k->foto_kota}}"></div>
						<div class="special_item_content text-center">
							<div class="special_category">Visiting</div>
							<div class="special_title"><a href="{{url('kota')}}/{{$k->nama_kota}}" title="{{$k->nama_kota}}">{{$k->nama_kota}}</a></div>
						</div>
					</div>
				</div>
				@endforeach

			</div>

			<div class="special_slider_nav d-flex flex-column align-items-center justify-content-center">
				<img class="lazyload" src="images/special_slider.png" alt="slider icon">
			</div>
		</div>
	</div>
</div>


@endsection