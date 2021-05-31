@extends('user/app')

@section('mode', $mode)

@section('title', $title)

@section('konten')
<div class="home">
	<!-- Image by https://unsplash.com/@peecho -->
	<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url({{url('images/about_background.jpg')}})" data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="home_content">
					<div class="home_content_inner">
						<div class="home_title"><h1>Pencarian</h1></div>
						<div class="home_breadcrumbs">
							<ul class="home_breadcrumbs_list">
								<li class="home_breadcrumb"><a href="{{url('home')}}">Home</a></li>
								<li class="home_breadcrumb">Cari</li>
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

<!-- About -->


<div class="top">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title text-center">
					<h2>Hasil Pencarian Dari {{$tag}}</h2>
					<div>Ayo kunjungi sekarang juga</div>
				</div>
			</div>
		</div>
		<div class="row top_content">
			@if($result->count() > 0)
			@foreach($result as $row)
			<div class="col-lg-3 col-md-6 top_col m-5">
				<div class="top_item">
					<a href="{{url('spot')}}/{{$row->slug_spot}}">
						<div class="top_item_image  text-center"><img class="lazyload" src="{{url('images/konten/spot/header')}}/{{$row->foto_spot}}" alt="{{$row->foto_spot}}"></div>
						<div class="top_item_content">
							<div class="top_item_price">{{$row->kota->nama_kota}}, {{$row->provinsi->nama_provinsi}}</div>
							<div class="top_item_text">{{$row->judul_spot}}</div>
						</div>
					</a>
				</div>
			</div>
			@endforeach
			@else
			<div>
				<p class="alert alert-warning nothing">Maaf data yang anda cari tidak ada.</p>
			</div>
			@endif
		</div>
		<div class="pagination m-5">
			{{ $result->links() }}
		</div>
	</div>
</div>
</div>

@endsection

	<!-- Milestones -->