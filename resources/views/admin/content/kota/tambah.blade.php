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

 					<h3 class="box-title">Form Input Kota</h3>

 					<a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/kota/list')}}">List Kota</a>

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

 									<form action="{{url('admin/kota/tambah/proses')}}" method="post" enctype="multipart/form-data">

 										{{ csrf_field() }}

 										<div class="form-group">

 											<label for="nama_kota">Nama Kota *</label>

 											<input type="text" name="nama_kota" class="form-control" id="nama_kota" value="{{old('nama_kota')}}">

 										</div>

 										<div class="form-group">

 											<label for="provinsi">Provinsi</label>

 											<select class="form-control" name="provinsi">

 												<option value="">-Pilih Provinsi-</option>

 												@foreach($provinsi as $p)

 												<option {{old('status_kota') == $p->id_provinsi ? 'selected' : ''}} value="{{$p->id_provinsi}}">{{$p->nama_provinsi}}</option>

 												@endforeach

 											</select>

 										</div>

 										<div class="form-group">

 											<label for="foto_kota">Foto Kota</label>

 											<input type="file" id="foto_kota" name="foto_kota" value="{{old('foto_kota')}}>

 											<p class="help-block">Foto akan dijadikan cover.</p>

 										</div>

 										<div class="form-group">

 											<label for="status_kota">Status Kota *</label>

 											<select class="form-control" id="status_kota" name="status_kota">

 												<option value="">-Pilih Status-</option>

 												<option {{old('status_kota') == '1' ? 'selected' : ''}} value="1">Aktif</option>

 												<option {{old('status_kota') == '0' ? 'selected' : ''}} value="0">Tidak Aktif</option>

 											</select>

 										</div>

 										<div class="text-right">

 											<button class="btn btn-sm btn-success">Submit</button>

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

 											<li>Input text dengan label nama Kota wajib diisi</li>

 											<li>Selectbox dengan label status Kota wajib diisi</li>
 											<li>Input text dengan label foto Kota wajib diisi</li>

 										</ul>

 									</div>

 								</div>

 							</div>

 						</div>

 					</div>

 				</div>

 				<!-- /.box-body -->

 			</div>



 		</div>

 	</div>

 </section>

 @endsection