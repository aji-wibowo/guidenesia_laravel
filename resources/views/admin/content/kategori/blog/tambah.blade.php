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
                  <form action="{{url('admin/blog/kategori/tambah/proses')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="nama_kategori">Nama Kategori *</label>
                      <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="{{old('nama_kategori')}}">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_kategori">Deskripsi Kategori</label>
                      <input type="deskripsi_kategori" name="deskripsi_kategori" class="form-control" id="deskripsi_kategori" value="{{old('deskripsi_kategori')}}">
                    </div>
                    <div class="form-group">
                      <label for="status_kategori">Status Kategori *</label>
                      <select class="form-control" id="status_kategori" name="status_kategori">
                        <option value="">-Pilih Status-</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
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