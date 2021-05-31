@extends('user/app')



@section('mode', $mode)



@section('title', $title)



@section('konten')



<!-- Home -->



<div class="home">

	<div class="home_background" style="background-image:url(images/home.jpg)"></div>

	<div class="home_content">

		<div class="home_content_inner">

			<h1 class="home_text_large">JELAJAHI</h1>

			<h2 class="home_text_small">Kota kamu</h2>

			<span class="home_text_small kebawah btn-head"><a href="{{url('all/spot')}}" title="berwisata bersama guidenesia.id">SEKARANG</a></span>

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



<!-- Top Destinations -->

<div class="top">
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">

				<!-- above section 2 home -->
                <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4864853651971804"
                data-ad-slot="5369160762"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>

				</div>
            </div>
        </div>
    </div>

	<div class="container">

		<div class="row">

			<div class="col">

				<div class="section_title text-center">

					<h2>Tempat tujuan paling top di Jawa Tengah</h2>

					<div>kunjungi bersama seseorang terdekat</div>

				</div>

			</div>

		</div>

		<div class="row top_content">

			@foreach($spot as $s)

			<div class="col-md-3 col-sm-6 top_col">



				<!-- Top Destination Item -->



				<div class="top_item">

					<a href="{{url('spot')}}/{{$s->slug_spot}}">

						<div class="top_item_image text-center"><img class="lazyload" src="{{url('images/konten/spot/header')}}/{{$s->foto_spot}}" alt="{{$s->foto_spot}}"></div>

						<div class="top_item_content">

							<div class="top_item_price">{{$s->kota->nama_kota}}, {{$s->provinsi->nama_provinsi}}</div>

							<div class="top_item_text">{{$s->judul_spot}}</div>

						</div>

					</a>

				</div>



			</div>



			@endforeach

		</div>



	</div>

</div>



<!-- Popular -->



<div class="popular">

	<div class="container">

		<div class="row">

			<div class="col">

				<div class="section_title text-center">

					<h2>Galeri</h2>

					<div>Dari mata turun ke hati</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col">

				<div class="popular_content d-flex flex-md-row flex-column flex-wrap align-items-md-center align-items-start justify-content-md-between justify-content-start ">

					<div class="gallery">

						<div class="row">

							<!-- Popular Item -->

							@foreach($galeri as $g)

							<div class="col-sm-3">

								<div class="popular_item img_home">

									<a href="{{url('images/konten/spot/galeri')}}/{{$g->foto_galeri}}" title="#" data-fancybox="gallery">

										<div class="top_item_image m-10 text-center"><img class="lazyload" src="{{url('images/konten/spot/galeri')}}/{{$g->foto_galeri}}" alt="{{$g->foto_galeri}}"></div>

									</a>	

								</div>

							</div>

							@endforeach

						</div>

						<div style="clear: both;"></div>

					</div>

				</div>

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





<!-- Newsletter -->



<div class="newsletter">

	<!-- Image by https://unsplash.com/@garciasaldana_ -->

	<div class="newsletter_background" style="background-image:url(images/newsletter.jpg)"></div>

	<div class="container">

		<div class="row">

			<div class="col-lg-10 offset-lg-1">

				<div class="newsletter_content">

					<div class="newsletter_title text-center">Subscribe to our Newsletter</div>

					<div class="newsletter_form_container">

						<form action="{{url('subscribe/us')}}" id="newsletter_form" class="newsletter_form" method="post">

							{{ csrf_field() }}

							<div class="d-flex flex-md-row flex-column align-content-center justify-content-between">

								<input type="email" name="email" id="newsletter_input" class="newsletter_input" placeholder="Your E-mail Address">

								<button type="submit" id="newsletter_button" class="newsletter_button">Subscribe</button>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>













@endsection



