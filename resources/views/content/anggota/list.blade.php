@extends('layouts/app')
@section('title', $title)
@section('judul1', $judul1)
@section('judul2', $judul2)
@section('konten')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h5>Daftar Data</h5>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No. Anggota</th>
								<th>Nama</th>
								<th>Pekerjaan</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>00001</td>
								<td>Aji Wibowo</td>
								<td>Programmer</td>
								<td><a href="#" class="btn btn-xs btn-info"><i class="fa-search"></i> detail</a> | <a href="#" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> edit</a> | <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> hapus</a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="box-footer clearfix">

					{{-- {{ $blog->links() }} --}}

				</div>
			</div>
		</div>
	</div>
</section>
@endsection