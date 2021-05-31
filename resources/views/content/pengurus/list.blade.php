@extends('layouts/app')
@section('title', $title)
@section('judul1', $judul1)
@section('judul2', $judul2)

@section('konten')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('pengurus.box-header-title')}}</h3>
                    <a style="float: right;" class="btn btn-sm btn-success" href="{{url('pengurus/tambah')}}">{{__('pengurus.box-header-title-button')}}</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="table_anggota">
                        <thead>
                            <tr>
                                <th>{{__('pengurus.head1')}}</th>
                                <th>{{__('pengurus.head2')}}</th>
                                <th>{{__('pengurus.head3')}}</th>
                                <th>{{__('pengurus.head4')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pengurus) > 0)
                            @foreach($pengurus as $a)
                            <tr>
                                <td>{{ $a->seker_fullname }}</td>
                                <td>{{ $a->seker_email }}</td>
                                <td>{{__('pengurus.'.$a->active)}}</td>
                                <td class="text-center">
                                    <a href="{{url('pengurus/edit').'/'.$a->seker_user_id}}" class="btn btn-xs btn-warning"><i
                                            class="fa fa-pencil-square-o"></i> {{__('pengurus.edit')}}</a> |
                                    <a href="{{url('pengurus/hapus').'/'.$a->seker_user_id}}"
                                        class="hapusAnggota btn btn-xs btn-danger"><i class="fa fa-trash"></i> {{__('pengurus.delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="4">{{__('pengurus.notfound')}}</td>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $pengurus->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#table_anggota').DataTable();

        $('.hapusAnggota').click(function (e) {
            var url = $(this).attr('href');
            e.preventDefault();

            swal({
                title: "Anda yakin?",
                text: "Data tidak akan dapat kembali jika sudah dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ya',
                cancelButtonText: "Tidak"
            }).then(
                function () {
                    window.location.href = url;
                },
                function () {
                    return false;
                });
        });

    })

</script>

@endsection
