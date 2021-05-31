 @extends('admin/app')



 @section('title', $title)

 @section('judul1', $judul1)

 @section('judul2', $judul2)



 @section('konten')



 <section class="content">

 	<div class="row">

 		<div class="col-md-12">



 			<div class="box">

 				<div class="box-header with-border">

 					<h3 class="box-title">Form Input Spot</h3>

 					<a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/spot/list')}}">List Spot</a>

 				</div>

 				<!-- /.box-header -->

 				<div class="box-body">

 					<div class="row">

 						<div class="col-md-6">

 							<div class="box">

 								@if ($errors->any())

 								<div class="alert alert-danger">

 									<ul>

 										@foreach ($errors->all() as $error)

 										<li>{{ $error }}</li>

 										@endforeach

 									</ul>

 								</div>

 								@endif

 								<div class="box-body">

 									<form action="{{url('admin/spot/edit/proses')}}/{{$spot->id_spot}}?page={{$page}}" method="post">

 										{{ csrf_field() }}

 										{{ method_field('PUT') }}

 										<div class="form-group">

 											<label for="judul">Judul *</label>

 											<input type="text" name="judul" class="form-control" id="judul" value="{{$spot->judul_spot}}">

 										</div>

 										<div class="form-group">

 											<label for="slug">Slug / Alamat Web*</label>

 											<input type="text" name="slug" class="form-control" id="slug" value="{{$spot->slug_spot}}">

 										</div>

 										<div class="form-group">

 											<label for="konten">Isi Konten</label>

 											<textarea class="form-control" name="konten" id="editorKonten">{{$spot->content_spot}}</textarea>

 										</div>

 										<div class="row">

 											<div class="col-md-4">

 												<div class="form-group">

 													<select class="form-control" name="kategori" id="kategori">

 														<option>-Pilih Kategori-</option>

 														@foreach  ($kategori as $kat)

 														<option value="{{$kat->id_kategori}}" {{($spot->id_kategori == $kat->id_kategori) ? 'selected':''}}>{{$kat->nama_kategori}}</option>

 														@endforeach

 													</select>

 												</div>

 											</div>

 											<div class="col-md-4">

 												<div class="form-group">

 													<select class="form-control" name="provinsi" id="provinsi">

 														<option>-Pilih Provinsi-</option>

 														@foreach  ($provinsi as $provinsi)

 														<option value="{{$provinsi->id_provinsi}}" {{($spot->id_provinsi == $provinsi->id_provinsi) ? 'selected':''}}>{{$provinsi->nama_provinsi}}</option>

 														@endforeach

 													</select>

 												</div>

 											</div>

 											<div class="col-md-4">

 												<div class="form-group">

 													<select class="form-control" name="kota" id="kota">

 														@foreach  ($kota as $kota)

 														<option value="{{$kota->id_kota}}" {{($spot->id_kota == $kota->id_kota) ? 'selected':''}}>{{$kota->nama_kota}}</option>

 														@endforeach

 													</select>

 												</div>

 											</div>

 										</div>

 										<div class="nav-tabs-custom">

 											<ul class="nav nav-tabs pull-right">

 												<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Profile Spot</a></li>

 												<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">SEO</a></li>

 												<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Image</a></li>

 											</ul>

 											<div class="tab-content">

 												<div class="tab-pane active" id="tab_1">

 													<div class="form-group">

 														<textarea class="form-control" name="alamat" placeholder="Alamat Spot">{{$spot->alamat_spot}}</textarea>

 													</div>

 													<div class="form-group">

 														<input type="number" name="telepon" class="form-control" placeholder="No. Telp Spot" value="{{$spot->telepon_spot}}">

 													</div>

 													<div class="form-group">

 														<input type="text" name="email" class="form-control" placeholder="Email Spot" value="{{$spot->email_spot}}">

 													</div>

 													<div class="form-group">

 														<input type="text" name="jamkerja" class="form-control" placeholder="Jam Kerja Spot" value="{{$spot->jamkerja_spot}}">

 													</div>

 													<div class="row">

 														<div class="col-md-12">

 															<div class="row">

 																<div class="col-md-6">

 																	<div class="form-group">

 																		<input type="text" name="latitude" class="form-control" placeholder="Latitude spot" value="{{$spot->lat_spot}}">

 																	</div>

 																</div>

 																<div class="col-md-6">

 																	<div class="form-group">

 																		<input type="text" name="longitude" class="form-control" placeholder="Longitude spot" value="{{$spot->long_spot}}">

 																	</div>

 																</div>

 															</div>

 														</div>

 													</div>

 												</div>

 												<div class="tab-pane" id="tab_2">

 													<div class="form-group">

 														<textarea class="form-control" name="meta_deskripsi" placeholder="Meta Deskripsi">{{$spot->meta_deskripsi}}</textarea>

 													</div>

 													<div class="form-group">

 														<input type="text" name="meta_keyword" class="form-control" data-role="tagsinput" value="{{$spot->meta_keyword}}" width="100%">

 													</div>

 												</div>

 												<div class="tab-pane" id="tab_3">

 													<div class="form-group">

 														<label for="foto_header">File input</label>

 														<input type="file" id="upload_image" name="foto_header">

 														<div id="uploadedimage">



 														</div>

 													</div>

 													<div id="formHidden">

 														@if($spot->foto_spot != '')

 														<img src="{{url("images/konten/spot/header")}}/{{$spot->foto_spot}}" width="100%">

 														@endif

 													</div>

 												</div> 

 											</div>

 										</div>

 										<div class="col-md-12">

 											<div class="form-group">

 												<select class="form-control" name="status" id="status">

 													<option>Pilih Status</option>

 													<option value="1" {{($spot->status_spot == '1') ? 'selected':''}}>Aktif</option>

 													<option value="0" {{($spot->status_spot == '0') ? 'selected':''}}>Nonaktif</option>

 												</select>

 											</div>

 										</div>

 										<div class="text-right">

 											<button class="btn btn-sm btn-success" id="submitForm">Submit</button>

 										</div>

 									</form>

 								</div>

 							</div>

 						</div>

 						<div class="col-md-6">

 							<div class="box">

 								<div class="box-body">

 									<p><b>Tips</b></p>

 									<div>

 										<ul>
											<li>Semua form yang ada di input form halaman ini wajib diisi</li>

 										</ul>

 									</div>

 								</div>

 							</div>

 						</div>

 					</div>

 				</div>

 			</div>



 		</div>

 		<div class="col-md-12">



 			<div id="uploadimageModal" class="modal" role="dialog">

 				<div class="modal-dialog">

 					<div class="modal-content">

 						<div class="modal-header">

 							<button type="button" class="close" data-dismiss="modal">&times;</button>

 							<h4 class="modal-title">Upload & Crop Image</h4>

 						</div>

 						<div class="modal-body">

 							<div class="row">

 								<div class="col-md-12 text-center">

 									<div class="width50" style="width: 100%; overflow-y: auto;">

 										<div id="image_demo" style="width:50%; margin-top:30px"></div>

 									</div>

 								</div>

 								<div class="col-md-12" style="padding-top:30px;">

 									<button class="btn btn-success crop_image">Crop & Upload Image</button>

 								</div>

 							</div>

 						</div>

 						<div class="modal-footer">

 							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

 						</div>

 					</div>

 				</div>

 			</div>



 		</div>

 	</div>

 </section>



 <script type="text/javascript">

 	$(document).ready(function(){



 		// $('#kota').html('<option>-Pilih Provinsi Dulu-</option>');

 		// $('#kota').attr('disabled', '');



 		$('#provinsi').change(function(){

 			var id = $(this).val();

 			if (id != '-Pilih Provinsi-') {

 				$.ajax({

 					url : '{{url('api/kota')}}'+'/'+id,

 					type : 'POST',

 					data : {id : id},

 					success : function(response){

 						obj = $.parseJSON(response);

 						var html = '<option>-Pilih Kota-</option>';

 						if (obj.length > 0) {

 							$.each(obj, function(i, item){

 								html += '<option value="'+item.id_kota+'">'+item.nama_kota+'</option>';

 							})

 						}else{

 							html += '<option>Data tidak ada</option>';

 						}

 						$('#kota').removeAttr('disabled');

 						$('#kota').html(html);

 					}

 				});

 			}else{

 				$('#kota').attr('disabled', '');

 				$('#kota').html('<option>-Pilih Provinsi Dulu-</option>');

 			}

 		})



 		var w = $(window).width(),

 		h = $(window).height();



 		$image_crop = $('#image_demo').croppie({

 			enableExif: true,

 			viewport: {

 				width:300,

 				height:400,

 				type:'square'

 			},

 			boundary:{

 				width:w,

 				height:h

 			},

 			enableResize: true,

 			enableOrientation: true,

 			mouseWheelZoom: 'ctrl'

 		});



 		var checkChange = 0;

 		$('#upload_image').on('change', function(){

 			checkChange = 1;

 			var reader = new FileReader();

 			reader.onload = function (event) {

 				$image_crop.croppie('bind', {

 					url: event.target.result

 				}).then(function(){

 					console.log('jQuery bind complete');

 				});

 			}

 			reader.readAsDataURL(this.files[0]);

 			$('#uploadimageModal').modal('show');

 		});



 		$('.crop_image').click(function(event){

 			$image_crop.croppie('result', {

 				type: 'canvas',

 				size: 'viewport'

 			}).then(function(response){

 				if (checkChange == 1) {

 					var judul = $('input[name="judul"]').val();

 				}else{

 					var judul = '';

 				}

 				$.ajax({

 					url:"{{url('api/image/cropped')}}",

 					type: "POST",

 					data:{"image": response, "nama" : judul},

 					success:function(data)

 					{

 						var obj = $.parseJSON(data);

 						$('#uploadimageModal').modal('hide');

 						$('#uploadedimage').html('<img src="{{url("images/konten/spot/header")}}/'+obj+'">');

 						var input = '<input type="hidden" name="headerName">';

 						$('#formHidden').append(input);

 						$('input[name="headerName"]').val(obj);

 					}

 				});

 			})

 		});





 	});

 </script>



 @endsection