@extends('admin/app')
@section('title', $title)
@section('judul1', $judul1)
@section('judul2', $judul2)
@section('konten')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List Data Blog</h3>
                    <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/blog/tambah')}}">Tambah
                        blog</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blog as $b)
                            <tr>
                                <td>{{$b->judul_blog}}</td>
                                <td>{{$b->kategori_blog->nama_kategori_blog}}</td>
                                <td>{{$b->user->username}}</td>
                                <td>{{$b->publish_at}}</td>
                                <td><a href="{{url('admin/blog/edit')}}/{{$b->id_blog}}?page={{$page}}"
                                        class="btn btn-warning btn-sm">edit</a> <a
                                        href="{{url('admin/blog/hapus')}}/{{$b->id_blog}}"
                                        class="btn btn-danger btn-sm hapus">delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {{ $blog->links() }}
                </div>
            </div>
        </div>
    </div>
</section>





@endsection
