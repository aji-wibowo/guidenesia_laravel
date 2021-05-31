@extends('layouts/app')
@section('title', $title)
@section('judul1', $judul1)
@section('judul2', $judul2)
@section('konten')
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h5>Form Ubah Password</h5>
				</div>
				<div class="box-body">
					<form action="{{url('change/password/proses')}}" method="post">
						@csrf
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" disabled>
						</div>
						<div class="form-group">
							<label>Password Lama</label>
							<input type="password" name="password_lama" class="form-control">
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" name="password_baru" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-sm btn-info">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection