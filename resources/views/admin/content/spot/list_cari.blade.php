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

                    <h3 class="box-title">List Data Spot</h3>

                    <div style="width: 200px; display:inline; float: right; margin-left: 10px;">
                    <form action="{{url('admin/spot/list_cari')}}" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="key" placeholder="ketik kemudian enter..">
                        </div>
                    </form>
                    </div>

                    <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/spot/tambah')}}">Tambah Spot</a>

                </div>

                <!-- /.box-header -->

                <div class="box-body">

                    <table class="table table-bordered">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Judul</th>

                                <th>Dibuat Pada</th>
                                
                                <th>Views</th>

                                <th>#</th>

                            </tr>

                        </thead>

                        <tbody>

                            @if(count($spot) > 0)

                            @foreach($spot as $p)

                            <tr>

                                <td>{{$loop->iteration}}</td>

                                <td>{{$p['judul_spot']}}</td>

                                <td>{{$p['publish_at']}}</td>

                                <td>{{$p['views_spot']}}</td>

                                <td><a class="btn btn-sm btn-info" href="{{url('admin/spot/galeri').'/'.$p['id_spot']}}">galeri</a> | <a class="btn btn-sm btn-warning" href="{{url('admin/spot/edit').'/'.$p['id_spot']}}?page={{$page}}">edit</a> | <a class="btn btn-sm btn-danger hapus" href="{{url('admin/spot/hapus').'/'.$p['id_spot']}}">hapus</a></td>

                            </tr>

                            @endforeach

                            @else

                            <tr class="text-center">

                                <td colspan="4">Data Belum Ada.</td>

                            </tr>

                            @endif

                        </tbody>

                    </table>

                </div>

                <!-- /.box-body -->

                <div class="box-footer clearfix">

                    {{ $spot->links() }}

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