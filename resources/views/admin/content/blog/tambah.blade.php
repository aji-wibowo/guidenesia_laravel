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
                    <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/spot/list')}}">List
                        Spot</a>
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
                                    <form action="{{url('admin/blog/tambah/proses')}}" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="judulBlog">Judul Blog</label>
                                            <input type="text" name="judul" class="form-control"
                                                placeholder="Suami cabuli istri sah" value="{{old('judul')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="editorKonten">Konten</label>
                                            <textarea class="form-control" name="konten" id="editorKontenBlog"
                                                placeholder="Sebagai suami yang sah...">
                                 </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select class="form-control" name="kategori" id="kategori">
                                                <option value="">-Pilih Kategori-</option>
                                                @foreach($kategori as $k)
                                                <option value="{{$k->id_kategori_blog}}"
                                                    {{old('kategori') == $k->id_kategori_blog ? 'selected' : ''}}>
                                                    {{$k->nama_kategori_blog}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Deskripsi & Keyword</label>
                                            <textarea class="form-control" name="meta_deskripsi"
                                                placeholder="Meta Deskripsi">{{old('meta_deskripsi')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="meta_keyword" class="form-control"
                                                data-role="tagsinput" value="{{old('meta_keyword')}}" width="100%"
                                                placeholder="Meta Keyword">
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto Header</label>
                                            <input type="file" name="foto">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Aktif
                                                </option>
                                                <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Tidak Aktif
                                                </option>
                                            </select>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-success btn-sm">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h6>QTips</h6>
                                </div>
                                <div class="box-body">
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
</section>
@endsection
