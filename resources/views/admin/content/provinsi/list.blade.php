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
        <h3 class="box-title">List Data Provinsi</h3>
        <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/provinsi/tambah')}}">Tambah Provinsi</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Provinsi</th>
              <th>Dibuat Pada</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            @if(count($provinsi) > 0)
            @foreach($provinsi as $p)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$p['nama_provinsi']}}</td>
              <td>{{$p['created_at']}}</td>
              <td><a class="btn btn-sm btn-warning" href="{{url('admin/provinsi/edit').'/'.$p['id_provinsi']}}">edit</a> | <a class="btn btn-sm btn-danger hapus" href="{{url('admin/provinsi/hapus').'/'.$p['id_provinsi']}}">hapus</a></td>
            </tr>
            @endforeach
            @else
            <tr class="text-center">
              <td colspan="3">Data Belum Ada.</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
       {{ $provinsi->links() }}
     </div>
   </div>

 </div>
</div>
</section>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '.hapus', function(e){
      e.preventDefault();
      url = $(this).attr('href');
      if (confirm('yakin ingin menghapus?')) {
        window.location.href = url;
      }else{
        e.preventDefault();
      }
    })
  })
</script>

@endsection