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
          <h3 class="box-title">Form Input Kategori</h3>
          <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/blog/kategori/list')}}">List Kategori</a>
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
                  <form action="{{url('admin/blog/kategori/edit/proses/').'/'.$kategori->id_kategori_blog}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                      <label for="nama_kategori">Nama Kategori *</label>
                      <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="{{$kategori->nama_kategori_blog}}">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_kategori">Deskripsi Kategori</label>
                      <input type="deskripsi_kategori" name="deskripsi_kategori" class="form-control" id="deskripsi_kategori" value="{{$kategori->deskripsi_kategori_blog}}">
                    </div>
                    <div class="form-group">
                      <label for="status_kategori">Status Kategori *</label>
                      <select class="form-control" id="status_kategori" name="status_kategori">
                        <option value="" {{($kategori->status_kategori_blog == '') ? 'selected':''}}>-Pilih Status-</option>
                        <option value="1" {{($kategori->status_kategori_blog == 1) ? 'selected':''}}>Aktif</option>
                        <option value="0" {{($kategori->status_kategori_blog == 0) ? 'selected':''}}>Tidak Aktif</option>
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
                      <li>Input text dengan label nama kategori wajib diisi</li>
                      <li>Selectbox dengan label status kategori wajib diisi</li>
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