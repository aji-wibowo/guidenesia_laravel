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
                  <form action="{{url('admin/provinsi/tambah/proses')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="provinsi">Nama Provinsi *</label>
                      <input type="text" name="provinsi" class="form-control" id="provinsi" value="{{old('provinsi')}}">
                    </div>
                    <div class="form-group">
                      <label for="status_provinsi">Status *</label>
                     <select id="status_provinsi" class="form-control" name="status_provinsi">
                       <option value="">-Pilih Status-</option>
                       <option value="1" {{old('status_provinsi') == '1' ? 'selected' : ''}}>Aktif</option>
                       <option value="0" {{old('status_provinsi') == '2' ? 'selected' : ''}}>Tidak Aktif</option>
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
                      <li>Input text dengan label provinsi wajib diisi</li>
                      <li>Input text dengan label status wajib diisi</li>
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