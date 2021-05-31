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
          <h3 class="box-title">Form Input Provinsi</h3>
          <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/provinsi/list')}}">List Provinsi</a>
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
                  <form action="{{url('admin/provinsi/edit/proses/').'/'.$provinsi->id_provinsi}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                      <label for="nama_provinsi">Nama Provinsi *</label>
                      <input type="text" name="nama_provinsi" class="form-control" id="nama_provinsi" value="{{$provinsi->nama_provinsi}}">
                    </div>
                    <div class="form-group">
                      <label for="status_provinsi">Status Provinsi *</label>
                      <select class="form-control" id="status_provinsi" name="status_provinsi">
                        <option value="" {{($provinsi->status_provinsi == '') ? 'selected':''}}>-Pilih Status-</option>
                        <option value="1" {{($provinsi->status_provinsi == 1) ? 'selected':''}}>Aktif</option>
                        <option value="0" {{($provinsi->status_provinsi == 0) ? 'selected':''}}>Tidak Aktif</option>
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
                      <li>Input text dengan label nama provinsi wajib diisi</li>
                      <li>Selectbox dengan label status provinsi wajib diisi</li>
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