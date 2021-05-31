 @extends('admin/app')

 @section('title', $title)
 @section('judul1', $judul1)
 @section('judul2', $judul2)

 @section('konten')
 <section class="content">
 	<div class="row">
 		<div class="col-md-6">
 			@if ($message = Session::get('message'))
 			<div class="alert alert-success alert-block">
 				<button type="button" class="close" data-dismiss="alert">×</button> 
 				<strong>{{ $message }}</strong>
 			</div>
 			@endif
 			<div class="box">
 				<div class="box-header">
 					<h5>Form Page Kontak</h5>
 				</div>
 				<div class="box-body">
 					<form action="{{url('admin/page/kontak/proses')}}/{{$page->id_page_kontak}}" method="post">
 						{{ csrf_field() }}
 						<div class="form-group">
 							<label>Deskripsi</label>
 							<textarea class="form-control" name="deskripsi">{{$page->deskripsi_kontak}}</textarea>
 						</div>
 						<div class="form-group">
 							<label>Alamat</label>
 							<textarea class="form-control" name="alamat">{{$page->alamat_kontak}}</textarea>
 						</div>
 						<div class="form-group">
 							<label>Telepon</label>
 							<input class="form-control" type="number" name="telepon" value="{{$page->telepon_kontak}}">
 						</div>
 						<div class="form-group">
 							<label>Email</label>
 							<input class="form-control" type="email" name="email" value="{{$page->email_kontak}}">
 						</div>
 						<div class="form-group">
 							<label>Facebook Link</label>
 							<input class="form-control" type="text" name="facebook" value="{{$page->fb_kontak}}">
 						</div>
 						<div class="form-group">
 							<label>Twitter Link</label>
 							<input class="form-control" type="text" name="twitter" value="{{$page->tw_kontak}}">
 						</div>
 						<div class="form-group">
 							<label>Longitude</label>
 							<input class="form-control" type="text" name="longitude" value="{{$page->long_kontak}}">
 						</div>
 						<div class="form-group">
 							<label>Latitude</label>
 							<input class="form-control" type="text" name="latitude" value="{{$page->lat_kontak}}">
 						</div>
 						<div class="text-right">
 							<button class="btn btn-success btn-sm">Simpan</button>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 @endsection