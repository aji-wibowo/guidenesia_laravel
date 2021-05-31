@extends('user/app')



@section('mode', $mode)



@section('title', $title)



@section('addon', $map['js'])



@section('konten')

<style>
    
    .paddingForAds{
        margin:10px;
    }
    
</style>



<div class="home keatas">

	<!-- Image by https://unsplash.com/@peecho -->

	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{url('images/konten/spot/header')}}/{{$detail->foto_spot}}" data-speed="0.8"></div>

	<div class="container">

		<div class="row">

			<div class="col">

				<div class="home_content">

					<div class="home_content_inner">

						<div><h1 class="home_title">{{$detail->judul_spot}}</h1></div>

						<div class="home_breadcrumbs">

							<ul class="home_breadcrumbs_list">

								<li class="home_breadcrumb"><a href="{{url('/')}}">Home</a></li>

								<li class="home_breadcrumb">Spot</li>

							</ul>

						</div>

						<div class="datetime">

							<p>Ditulis Pada : 

								<time itemprop="datePublished" datetime="{{date('Y-m-d', strtotime($detail->publish_at))}}">{{date('d-M-Y', strtotime($detail->publish_at))}}</time> | Oleh : {{$detail->user->username}}

							</p>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>		

</div>



<!-- Tabs -->

<div class="tabs_container konten">

	<div class="tabs d-flex flex-row align-items-center justify-content-around">

		<div class="tab active" data="satu">Deskripsi</div>

		<div class="tab" data="dua">Informasi Kontak</div>

		<div class="tab" data="tiga">Galeri</div>

		<div class="tab" data="empat">Kotak Saran</div>

	</div>

	<div class="tab_panels">

		<div class="tab_panel satu active">

			<div class="tab_panel_content">
	            <ins class="adsbygoogle"
                 style="display:block; text-align:center;"
                 data-ad-layout="in-article"
                 data-ad-format="fluid"
                 data-ad-client="ca-pub-4864853651971804"
                 data-ad-slot="4783478035"></ins>

				<?=$detail->content_spot?>

			</div>

		</div>

		<div class="tab_panel dua">

			<div class="tab_panel_content">

				<p>Jam Buka:</p>

				<p>{{$detail->jamkerja_spot}}</p>

				<p>Email:</p>

				<p><?= $detail->email_spot?></p>

					<p>Telepon:</p>

					<p>{{$detail->telepon_spot}}</p>

					<p>Alamat:</p>

					<p>{{$detail->alamat_spot}}</p>

				</div>

				<div class="col">

					<div id="google_map">

						<div class="map_container">

							<div id="map"><?= $map['html'] ?></div>

						</div>

					</div>

				</div>

			</div>

			<div class="tab_panel tiga">

				<div class="tab_panel_content">

					<div class="gallery text-center">

						<div class="row">

							@foreach($galeri as $g)

							<div class="col-md-3">

								<div class="card">

									<a href="{{url('images/konten/spot/galeri')}}/{{$g->foto_galeri}}" data-fancybox="gallery">



										<div class="top_item_image"><img class="img-responsive"  width="100%" src="{{url('images/konten/spot/galeri')}}/{{$g->foto_galeri}}" alt="{{$g->foto_galeri}}"></div>



									</a>

									<div class="card-body">

										<p class="card-text">{{$g->deskripsi}}</p>

									</div>

								</div>	

							</div>					

							@endforeach

						</div>

						<div style="clear: both;"></div>

					</div>

				</div>

			</div>

			<div class="tab_panel empat">

				<div class="tab_panel_content">

					<p>Untuk sementara, Anda dapat memberikan saran kepada kami melalui halaman <a href="{{url('contact')}}">Hubungi Kami</a>.</p>

				</div>

			</div>

		</div>

	</div>



	@endsection