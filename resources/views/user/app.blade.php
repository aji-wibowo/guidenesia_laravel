<!DOCTYPE html>

<html lang="en">

<head>

	<title>@yield('title')</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" href="{{url('images/logov2.png')}}" alt="logo icon">

	<link rel="shortcut icon" type="image/png" href="{{url('images/logov2.png')}}" alt="logo icon"/>
	<link rel="apple-touch-icon" href="{{url('images/logov2.png')}}" alt="logo icon">
	{!! $robots->metaTag() !!}
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-99574906-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-99574906-1', { 'optimize_id': 'GTM-TXTKNGX'});
	</script>
	<script data-ad-client="ca-pub-4864853651971804" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<meta name="google-site-verification" content="NKowGMZh9juC2EBPlQSTe5OOGn-9o0AsdwG9JmYzlp8" />
	
	
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- <meta name="robots" content="index,nofollow"> -->

	@if($mode == 'home')

	<link rel="canonical" type="text/css" href="{{url('/')}}">

	<meta name="description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="keyword" content="Wisata, Pemalang, Guidenesia, tips dan trik wisata, pemalang, jawa tengah, indonesia, guide wisata">

	<meta property="og:title" content="Guidenesia | Your Travel Assistance">

	<meta property="og:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta property="og:image" content="{{url('images')}}/logov2.png" alt="logo icon">

	<meta property="og:url" content="{{url('/')}}">

	<meta name="twitter:card" content="summary_large_image">

	<meta name="twitter:title" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="twitter:site" content="guidenesia">



	<!--  Non-Essential, But Recommended -->



	<meta property="og:site_name" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:image:alt" content="{{url('images')}}/logov2.png" alt="logo icon">



	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/bootstrap4/bootstrap.min.css')}}">

	<link href="{{url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

	<link href="{{url('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/OwlCarousel2-2.2.1/animate.css')}}">

	<link href="{{url('assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/main_styles.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/responsive.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/style.css')}}">



	@elseif($mode == 'detail')



	<meta name="description" content="{{$detail->meta_deskripsi}}">

	<meta name="keyword" content="{{$detail->meta_keyword}}">

	<link rel="canonical" type="text/css" href="{{url('spot')}}/{{$detail->slug_spot}}">

	<meta property="og:title" content="{{$detail->judul_spot}} - Guidenesia.id">

	<meta property="og:description" content="{{$detail->meta_deskripsi}}">

	<meta property="og:image" content="{{url('images/konten/spot/header')}}/{{$detail->foto_spot}}">

	<meta property="og:url" content="{{url('spot')}}/{{$detail->slug_spot}}">

	<meta property="article:publisher" content="https://web.facebook.com/guidenesia.id/" />

	<?php $standardtime = new DateTime($detail->publish_at) ?>

	<meta property="article:published_time" content="{{ $standardtime->format(DateTime::ATOM) }}" />

	<meta name="twitter:card" content="summary_large_image">

	<meta name="twitter:title" content="{{$detail->judul_spot}} - Guidenesia.id">

	<meta name="twitter:description" content="{{$detail->meta_deskripsi}}">

	<meta name="twitter:image" content="{{url('images/konten/spot/header')}}/{{$detail->foto_spot}}">

	<meta name="twitter:site" content="@guidenesia">



	<!--  Non-Essential, But Recommended -->



	<meta property="og:site_name" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:image:alt" content="{{url('images/konten/spot/header')}}/{{$detail->foto_spot}}">



	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/bootstrap4/bootstrap.min.css')}}">

	<link href="{{url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

	<link href="{{url('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/elements_styles.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/elements_responsive.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/style.css')}}">

	

	@elseif($mode == 'contact')

	<link rel="canonical" type="text/css" href="{{url('/contact')}}">

	<meta name="description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="keyword" content="Wisata, Pemalang, Guidenesia, tips dan trik wisata, pemalang, jawa tengah, indonesia, guide wisata, Hubungi Kami, Hubungi Guidenesia.id, Contanct Guidenesia.id">

	<meta property="og:title" content="Guidenesia | Your Travel Assistance">

	<meta property="og:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta property="og:image" content="{{url('images')}}/logov2.png" alt="logo icon">

	<meta property="og:url" content="{{url('/contact')}}">

	<meta name="twitter:card" content="summary_large_image">

	<meta name="twitter:title" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="twitter:site" content="guidenesia">



	<!--  Non-Essential, But Recommended -->



	<meta property="og:site_name" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:image:alt" content="{{url('images')}}/logov2.png" alt="logo icon">


	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/bootstrap4/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/contact_styles.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/contact_responsive.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/style.css')}}">



	@elseif($mode == 'about')

	<link rel="canonical" type="text/css" href="{{url('/about')}}">

	<meta name="description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="keyword" content="Wisata, Pemalang, Guidenesia, tips dan trik wisata, pemalang, jawa tengah, indonesia, guide wisata, Hubungi Kami, Hubungi Guidenesia.id, Contanct Guidenesia.id">

	<meta property="og:title" content="Guidenesia | Your Travel Assistance">

	<meta property="og:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta property="og:image" content="{{url('images')}}/logov2.png" alt="logo icon">

	<meta property="og:url" content="{{url('/about')}}">

	<meta name="twitter:card" content="summary_large_image">

	<meta name="twitter:title" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="twitter:site" content="guidenesia">



	<!--  Non-Essential, But Recommended -->



	<meta property="og:site_name" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:image:alt" content="{{url('images')}}/logov2.png" alt="logo icon">



	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/bootstrap4/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/about_styles.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/about_responsive.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/style.css')}}">



	@elseif($mode == 'cari')

	<link rel="canonical" type="text/css" href="{{url('/search?tempat=wisata')}}">

	<meta name="description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="keyword" content="Wisata, Pemalang, Guidenesia, tips dan trik wisata, pemalang, jawa tengah, indonesia, guide wisata, Hubungi Kami, Hubungi Guidenesia.id, Contanct Guidenesia.id">

	<meta property="og:title" content="Guidenesia | Your Travel Assistance">

	<meta property="og:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta property="og:image" content="{{url('images')}}/logov2.png" alt="logo icon">

	<meta property="og:url" content="{{url('/search?tempat=wisata')}}">

	<meta name="twitter:card" content="summary_large_image">

	<meta name="twitter:title" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:description" content="Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Temukan sesuatu sekarang!">

	<meta name="twitter:site" content="guidenesia">



	<!--  Non-Essential, But Recommended -->



	<meta property="og:site_name" content="Guidenesia | Your Travel Assistance">

	<meta name="twitter:image:alt" content="{{url('images')}}/logov2.png" alt="logo icon">



	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/bootstrap4/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/OwlCarousel2-2.2.1/animate.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/magnific-popup/magnific-popup.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/about_styles.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/main_styles.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/responsive.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('assets/styles/style.css')}}">



	@endif



	<link rel="stylesheet" type="text/css" href="{{url('css/swal.css')}}">



</head>



<body>



	<div class="super_container">



		<!-- Header -->



		<header class="header">

			<div class="container">

				<div class="row">

					<div class="col">

						<div class="header_container d-flex flex-row align-items-center justify-content-start">



							<!-- Logo -->

							<div class="logo_container">

								<div class="logo">

									<a href="{{url('home')}}" title="home">

										<div>Guidenesia</div>

										<div>Your Travel Assistance</div>

										<div class="logo_image"><img src="{{url('images/logov2.png')}}" alt="logo icon"></div>

									</a>

								</div>

							</div>



							<!-- Main Navigation -->

							<nav class="main_nav ml-auto">

								<ul class="main_nav_list">

									<li class="main_nav_item"><a href="{{url('home')}}" title="home">Home</a></li>

									<li class="main_nav_item"><a href="{{url('about')}}" title="tentang kami">Tentang Kami</a></li>\

									<li class="main_nav_item"><a href="http://blog.guidenesia.id" target="_blank" title="blog">Blog</a></li>

									<li class="main_nav_item"><a href="{{url('contact')}}" title="hubungi kami">Hubungi Kami</a></li>

								</ul>

							</nav>



							<!-- Search -->

							<div class="search">

								<form action="{{url('search')}}" method="get" class="search_form">

									<input type="search" name="tempat" class="search_input ctrl_class" required="required" placeholder="Keyword">

									<button type="submit" class="search_button ml-auto ctrl_class"><img src="{{url('images/search.png')}}" alt="Search Icon"></button>

								</form>

							</div>



							<!-- Hamburger -->

							<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>



						</div>

					</div>

				</div>

			</div>

		</header>



		<!-- Menu -->



		<div class="menu_container menu_mm">



			<!-- Menu Close Button -->

			<div class="menu_close_container">

				<div class="menu_close"></div>

			</div>



			<!-- Menu Items -->

			<div class="menu_inner menu_mm">

				<div class="menu menu_mm">

					<div class="menu_search_form_container">

						<form action="{{url('search')}}" id="menu_search_form" method="get">

							<input name="tempat" type="search" class="menu_search_input menu_mm">

							<button id="menu_search_submit" class="menu_search_submit" type="submit"><img src="{{url('images/search_2.png')}}" alt="Search Icon"></button>

						</form>

					</div>

					<ul class="menu_list menu_mm">

						<li class="menu_item menu_mm"><a href="{{url('home')}}" title="home">Home</a></li>

						<li class="menu_item menu_mm"><a href="{{url('about')}}" title="tentang kami">Tentang Kami</a></li>

						<li class="menu_item menu_mm"><a href="http://blog.guidenesia.id" target="_blank" title="blog">Blog</a></li>

						<li class="menu_item menu_mm"><a href="{{url('contact')}}" title="hubungi kami">Hubungi Kami</a></li>

					</ul>



					<!-- Menu Social -->



					<div class="menu_social_container menu_mm">

						<ul class="menu_social menu_mm">

							<li class="menu_social_item menu_mm"><a href="https://instagram.com/jay_jiun" title="our instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

							<li class="menu_social_item menu_mm"><a href="https://web.facebook.com/guidenesia.id/" title="our fa-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

							<li class="menu_social_item menu_mm"><a href="https://twitter.com/guidenesia" title="our twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

						</ul>

					</div>



					<div class="menu_copyright menu_mm"></div>

				</div>



			</div>



		</div>



		<!-- Home -->



		@yield('konten')



		<!-- Footer -->



		<footer class="footer">

			<div class="container">

				<div class="row">



					<!-- Footer Column -->

					<div class="col-lg-4 footer_col">

						<div class="footer_about">

							<!-- Logo -->

							<div class="logo_container">

								<div class="logo">

									<div>Guidenesia</div>

									<div>Your Travel Assistance</div>

									<div class="logoku logo_image"><img src="{{url('images')}}/logov2.png" alt="logo icon"></div>

								</div>

							</div>

							<div class="footer_about_text">Guidenesia adalah sebuah website yang dapat membantu anda menemukan informasi yang mendetail tentang suatu tempat. Dari mulai bagaimana cara menikmati hiburan hingga pembayaran di suatu tempat.</div>

							<div class="copyright"></div>

						</div>

					</div>



					<!-- Footer Column -->

					<div class="col-lg-4 footer_col">

						<div class="footer_latest">

							<div class="footer_title">Tempat Wisata Lain</div>



							@foreach($latest as $last)



							<div class="footer_latest_content">



								<!-- Footer Latest Post -->

								<div class="footer_latest_item">

									<div class="footer_latest_image"><img src="{{url('images/konten/spot/header/')}}/{{$last->foto_spot}}" alt="{{$last->foto_spot}}"></div>

									<div class="footer_latest_item_content">

										<div class="footer_latest_item_title"><a href="{{url('spot')}}/{{$last->slug_spot}}" title="Wisata">{{$last->judul_spot}}</a></div>

										<div class="footer_latest_item_date">{{date('d-M-Y', strtotime($last->publish_at))}}</div>

									</div>

								</div>



							</div>



							@endforeach



						</div>

					</div>



					<!-- Footer Column -->

					<div class="col-lg-4 footer_col">

						<div class="tags footer_tags">

							<div class="footer_title">Tags</div>

							<ul class="tags_content d-flex flex-row flex-wrap align-items-start justify-content-start">

								@foreach($tags as $t)

								<li class="tag"><a href="{{url('tag')}}/{{$t}}" title="">{{$t}}</a></li>

								@endforeach

							</ul>

						</div>

					</div>



				</div>

			</div>

		</footer>

	</div>



	@if($mode == 'home')



	<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

	<script src="{{url('assets/js/jquery.fancybox.min.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/popper.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/bootstrap.min.js')}}"></script>

	<script src="{{url('assets/js/isotop.js')}}"></script>

	<script src="{{url('assets/js/imagesloaded.js')}}"></script>

	<script src="{{url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>

	<script src="{{url('assets/plugins/easing/easing.js')}}"></script>

	<script src="{{url('assets/plugins/parallax-js-master/parallax.min.js')}}"></script>

	<script src="{{url('assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

	<script src="{{url('assets/js/custom.js')}}"></script>



	<script type="text/javascript">



		$(document).ready(function() {



			navigator.geolocation.getCurrentPosition(function (position) {

				tampilLokasi(position);

			}, function (e) {

				console.log('device anda tidak support geolocation');

			}, {

				enableHighAccuracy: true

			});



			function tampilLokasi(posisi) {

				var latitude 	= posisi.coords.latitude;

				var longitude 	= posisi.coords.longitude;

				$.ajax({

					type 	: 'POST',

					url		: '{{url('api/get/location')}}',

					data 	: {latitude: latitude, longitude: longitude},

					success : function(){

						console.log('tracked');

					}

				})

			}



			var $grid = $('.grid').isotope({

				getSortData: {

					name: '.name', 

				},

				sortBy : 'name',

				sortAscending: true



			});



			$grid.imagesLoaded().progress( function() {

				$grid.isotope('layout');

			});



			$('select.filter-button-group').on( 'change', function() {

				var filterValue = $(this).val();



				if (filterValue != '*') {

					filterValue = '.'+filterValue;

				}

				

				$grid.isotope({ filter: filterValue });



				$grid.data('isotope');



				var visibleItemsCount = $grid.data('isotope').filteredItems.length; 



				if (visibleItemsCount == 0) {

					valueFil = filterValue.replace('.', '');

					swal({

						position: 'top-end',

						type: 'error',

						title: 'Maaf wisata di Kota '+valueFil+' belum ada!',

						showConfirmButton: false,

						timer: 2000,

						onClose: () => {

							$('select.filter-button-group').val('*').trigger('change');



							$grid.isotope({ filter: '*' });

						}

					})

				}



			});





		});



	</script>



	@elseif($mode == 'detail')



	<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/popper.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/bootstrap.min.js')}}"></script>

	<script src="{{url('assets/js/jquery.fancybox.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/TweenMax.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/TimelineMax.min.js')}}"></script>

	<script src="{{url('assets/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/animation.gsap.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/ScrollToPlugin.min.js')}}"></script>

	<script src="{{url('assets/plugins/easing/easing.js')}}"></script>

	<script src="{{url('assets/plugins/progressbar/progressbar.min.js')}}"></script>

	<script src="{{url('assets/plugins/parallax-js-master/parallax.min.js')}}"></script>

	<script src="{{url('assets/js/elements_custom.js')}}"></script>

	<?= $map['js'] ?>


	@elseif($mode == 'contact')



	<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/popper.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/bootstrap.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/TweenMax.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/TimelineMax.min.js')}}"></script>

	<script src="{{url('assets/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/animation.gsap.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/ScrollToPlugin.min.js')}}"></script>

	<script src="{{url('assets/plugins/easing/easing.js')}}"></script>

	<script src="{{url('assets/plugins/parallax-js-master/parallax.min.js')}}"></script>

	<script src="{{url('assets/js/contact_custom.js')}}"></script>



	@elseif($mode == 'about')



	<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/popper.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/bootstrap.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/TweenMax.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/TimelineMax.min.js')}}"></script>

	<script src="{{url('assets/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/animation.gsap.min.js')}}"></script>

	<script src="{{url('assets/plugins/greensock/ScrollToPlugin.min.js')}}"></script>

	<script src="{{url('assets/plugins/easing/easing.js')}}"></script>

	<script src="{{url('assets/plugins/parallax-js-master/parallax.min.js')}}"></script>

	<script src="{{url('assets/js/about_custom.js')}}"></script>



	@elseif($mode == 'cari')



	<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/popper.js')}}"></script>

	<script src="{{url('assets/styles/bootstrap4/bootstrap.min.js')}}"></script>

	<script src="{{url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>

	<script src="{{url('assets/plugins/easing/easing.js')}}"></script>

	<script src="{{url('assets/plugins/parallax-js-master/parallax.min.js')}}"></script>

	<script src="{{url('assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

	<script src="{{url('assets/js/custom.js')}}"></script>



	@endif



	<script type="text/javascript" src="{{url('js/swal.min.js')}}"></script>



	<script type="text/javascript">

		$(document).ready(function(){

			$.ajaxSetup({

				headers: {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				}

			});

			var messages = '{{Session::get('message')}}';
			if(messages){
				swal('', messages, 'info');
			}

		})

	</script>
	
		<script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>




</body>



</html>