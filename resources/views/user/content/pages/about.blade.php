@extends('user/app')

@section('mode', $mode)

@section('title', $title)

@section('konten')

<div class="home">

	<!-- Image by https://unsplash.com/@peecho -->

	<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url({{url('images/news.jpg')}})" data-speed="0.8"></div>

	<div class="container">

		<div class="row">

			<div class="col">

				<div class="home_content">

					<div class="home_content_inner">

						<div class="home_title"><h1 class="home_title">About us</h1></div>

						<div class="home_breadcrumbs">

							<ul class="home_breadcrumbs_list">

								<li class="home_breadcrumb"><a href="index.html">Home</a></li>

								<li class="home_breadcrumb">About us</li>

							</ul>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>		

</div>

<!-- Find Form -->



<div class="find">

	<!-- Image by https://unsplash.com/@garciasaldana_ -->

	<div class="find_background_container prlx_parent">

		<div class="find_background prlx" style="background-image:url({{url('images/find.jpg')}}"></div>

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





<div class="about">

	<div class="container">

		<div class="row">

			<div class="col">

				<div class="section_title text-center">

					<h2>Kami ada untuk Anda</h2>

					<div>Lihat alasan kami membangun Guidenesia</div>

				</div>

			</div>

		</div>

		<div class="row about_row">

			<div class="col-lg-6 about_col order-lg-1 order-2">

				<div class="about_content">

					<p align="justify">Guidenesia sudah dimulai dari tahun lalu, sayangnya projek ini telah terhenti dan harus membuat traveller seperti Anda harus menunggu lama untuk menikmati ide terhebat ini. Sekarang saatnya Guidenesia membantu anda dalam mencari tempat wisata, tempat nongkrong, dan tempat-tempat lainnya dengan informasi yang detail.</p>

					<p>Kami ada untuk anda.</p>

					<p>Hormat Kami, </p>

					<p>Tim Guidenesia.</p>

				</div>

			</div>

			<div class="col-lg-6 about_col order-lg-2 order-1">

				<div class="about_image">

					<img src="images/about.jpg" alt="https://unsplash.com/@sanfrancisco">

				</div>

			</div>

		</div>

	</div>

</div>



<!-- Milestones -->



<div class="milestones">

	<div class="milestones_background parallax-window" data-parallax="scroll" data-image-src="images/fact_background.jpg" data-speed="0.8"></div>

	<div class="container">

		<div class="row">

			<div class="col">

				<div class="section_title text-center">

					<h2>Fakta menyenangkan seputar Guidenesia</h2>

					<div>Silahkan Tersenyum</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-lg-8 offset-lg-2">

				<div class="milestones_text">

					<p>Kami memberikan informasi seputar tempat melalui informan yang terpercaya, melalui pengalaman yang sudah terbukti ke akuratannya.</p>

				</div>

			</div>



		</div>

		<div class="row milestones_container">



			<!-- Milestone -->

			<div class="col-lg-4 milestone_col">

				<div class="milestone text-center">

					<div class="milestone_icon"><img src="images/milestone_2.svg" alt=""></div>

					<div class="milestone_counter" data-end-value="{{$jumlahWisata}}">0</div>

					<div class="milestone_text">Wisata Pada Website</div>

				</div>

			</div>



			<!-- Milestone -->

			<div class="col-lg-4 milestone_col">

				<div class="milestone text-center">

					<div class="milestone_icon"><img src="images/milestone_3.svg" alt=""></div>

					<div class="milestone_counter" data-end-value="{{$jumlahGaleri}}">0</div>

					<div class="milestone_text">Foto Yang Diambil</div>

				</div>

			</div>



			<!-- Milestone -->

			<div class="col-lg-4 milestone_col">

				<div class="milestone text-center">

					<div class="milestone_icon"><img src="images/service_1.svg" alt=""></div>

					<div class="milestone_counter" data-end-value="{{$jumlahKota}}">0</div>

					<div class="milestone_text">Kota Pada Website</div>

				</div>

			</div>



		</div>

	</div>

</div>

@endsection