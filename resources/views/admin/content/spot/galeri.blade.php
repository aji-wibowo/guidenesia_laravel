 @extends('admin/app')



 @section('title', $title)

 @section('judul1', $judul1)

 @section('judul2', $judul2)



 @section('konten')



 <section class="content">

 	<div class="row">

 		<div class="col-md-12">



 			<div class="box">

 				<div class="row">

 					<div class="box-header text-right" style="margin: 7px;">

 						<button class="btn btn-success btn-sm add">tambah</button>

 					</div>

 					<div class="box-body" style="margin: 20px;">

 						<div class="formAdd">

 							<div class="row">

 								<form id="hereForm" action="{{url('admin/spot/galeri/proses')}}/{{$id_spot}}" method="post" enctype="multipart/form-data">

 									{{ csrf_field() }}

 									<div id="here">

 										

 									</div>

 									<div class="col-md-12">

 										<div id="btnsimpan" style="margin-top: 20px">



 										</div>

 									</div>

 								</form>

 							</div>

 						</div>

 					</div>
					 
 					@if(count($galeri) > 0)

 					@foreach($galeri as $g)

 					<div class="col-md-3">

 						<div class="box-header">{{$g->foto_galeri}}</div>

 						<div class="box-body">

 							<img src="{{url('images/konten/spot/galeri/')}}/{{$g->foto_galeri}}" class="img img-responsive">

 							<div>

 								<small>{{$g->deskripsi}}</small>
								 <div id="editDeskripsi">
								 	<button class="btn btn-warning btn-sm editDeskripsi" data-id="{{$g->id_galeri}}" data-deskripsi="{{$g->deskripsi}}">edit deskripsi</button>
								 </div>

 							</div>

 							<a href="{{url('admin/spot/galeri/hapus')}}/{{$g->id_galeri}}" class="deletegaleri btn btn-danger btn-sm">delete</a>

 						</div>

 					</div>

 					@endforeach

 					@else

 					<div class="box-body text-center gada">

 						<p>Data galeri belum ada.</p>

 					</div>

 					@endif

 				</div>

 			</div>



 		</div>

 	</div>

 </section>


 <script type="text/javascript">

 	$(document).on('click', '.editDeskripsi', function(){
		var id_galeri = $(this).attr('data-id');
		var deskripsi = $(this).attr('data-deskripsi');
		$(this).parent().html('<form action="{{url('admin/spot/galeri/deskripsi/proses')}}/'+id_galeri+'" method="post">{{ csrf_field() }}<textarea class="form-control" name="deskripsii" cols="15" rows="5">'+deskripsi+'</textarea><button type="submit" class="btn btn-info btn-sm">simpan</button></form>');
	})

 	$('.add').click(function(){

 		$('.gada').html('');

 		var form = '<div class="col-md-3" style="margin-top: 20px"><div class="form-group"><label class="label">Foto</label><input class="form-control" class="track" type="file" name="galeri[]"></div><div class="form-group"><label>Deskripsi</label><textarea class="form-control" name="deskripsi[]"></textarea></div><button class="btn btn-danger btn-sm del">delete</button></div>';

 		$('#hereForm #here').append(form);



 		simpanBtn();

 	})



 	$(document).on('click', '.del', function(e){

 		e.preventDefault();

 		$(this).parent().remove();


 	})



 	$(document).on('click', '.deletegaleri', function(e){

 		e.preventDefault();

 		url = $(this).attr('href');

 		if (confirm('yakin ingin menghapus?')) {

 			window.location.href = url;

 		}else{

 			e.preventDefault();

 		}

 	})

	
	$(document).on('click', '#theButton', function(e){
		var input = $('input[name="galeri[]"]').val();
		if(!input){
			$(this).remove();
		}
	})



 	function simpanBtn(){

 		$('#btnsimpan').html('<button id="theButton" class="btn btn-success btn-sm">Simpan</button>')

 	}

 </script>



 @endsection