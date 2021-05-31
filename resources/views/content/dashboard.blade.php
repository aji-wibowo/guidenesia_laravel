@extends('layouts/app')
@section('title', $title)
@section('judul1', $judul1)
@section('judul2', $judul2)
@section('konten')
<style type="text/css">
    .img__description {
        position: absolute;
        background: rgba(29, 106, 154, 0.72);
        color: #fff;
        visibility: hidden;
        opacity: 0;
        transition: opacity .2s, visibility .2s;
    }

    .box-profile:hover .img__description {
        visibility: visible;
        opacity: 1;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a id="changePict" href="#" data-toggle="modal" data-target="#modal-default"><img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"></a>
                    <p class="img__description">Klik gambar untuk edit.</p>

                    <h3 class="profile-username text-center">{{Auth::user()->seker_fullname}}</h3>

                    <p class="text-muted text-center">{{$dataUser->first()->role->first()->seker_rolename}}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Tingkat</b> <a class="pull-right">{{$dataUser->first()->seker_grade_name}}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->

                <div class="modal fade" id="modal-default" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Ubah Foto Profil</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="formFotoProfil" action="#" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile" name="foto_profil">

                                            <p class="help-block">Upload file dengan extensi jpg/png.</p>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Tentang Kami</a></li>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Berbadan Hukum</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <form id="formTentangKami" action="#" method="post">
                                <div class="form-group">
                                    <label>Nama Lengkap Serikat</label>
                                    <input type="text" name="nama_serikat" class="form-control" value="{{Auth::user()->seker_fullname}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="8">{{Auth::user()->seker_address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kebun</label>
                                            <select class="form-control" name="kebun">
                                                <option value='-'>-Pilih Kebun-</option>
                                                @foreach($dataKebun as $kebun)
                                                <option {{$dataUser->first()->kebun_id == $kebun->kebun_id ? 'selected' : ''}} value="{{$kebun->kebun_id}}">{{$kebun->kebun_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <select class="form-control" name="kecamatan" disabled>
                                                <option value='-'>-Pilih Kecamatan-</option>
                                                @foreach($dataKecamatan as $kecamatan)
                                                <option {{$dataUser->first()->kecamatan_id == $kecamatan->kecamatan_id ? 'selected' : ''}} value="{{$kecamatan->kecamatan_id}}">{{$kecamatan->kecamatan_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kabupaten</label>
                                            <select class="form-control" name="kabupaten" disabled>
                                                <option value='-'>-Pilih Kabupaten-</option>
                                                @foreach($dataKabupaten as $kabupaten)
                                                <option {{$dataUser->first()->kabupaten_kota_id == $kabupaten->kabupaten_kota_id ? 'selected' : ''}} value="{{$kabupaten->kabupaten_kota_id}}">{{$kabupaten->kabupaten_kota_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <select class="form-control" name="provinsi" disabled>
                                                <option value='-'>-Pilih Provinsi</option>
                                                @foreach($dataProvinsi as $provinsi)
                                                <option {{$dataUser->first()->provinsi_id == $provinsi->provinsi_id ? 'selected' : ''}} value="{{$provinsi->provinsi_id}}">{{$provinsi->provinsi_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tentang Serikat Kerja</label>
                                    <textarea class="form-control" name="tentang" rows="5">{{Auth::user()->keterangan}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-sm" id="bSimpanTentang">simpan</button>
                                    {{-- <button class="btn btn-danger btn-sm" id="bBatalTentang">batal</button> --}}
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <form id="formBerbadanHukum" action="#" method="post">
                                <div class="form-group">
                                    <label>Nama Lengkap Serikat Kerja</label>
                                    <input type="text" name="badan_nama_serikat" class="form-control" value="{{Auth::user()->seker_fullname}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>No. Badan Hukum</label>
                                    <input type="text" name="badan_nomor" class="form-control" value="{{$dataUser->first()->seker_no_hukum}}">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Anggota dan Pengurus Terdaftar</label>
                                    <input type="text" name="jumlah_pekerja" class="form-control" value="{{$dataUser->first()->seker_jumlah}}">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" {{$dataUser->first()->active == '1' ? 'checked' : ''}}> Aktif
                                    </label>
                                </div>
                                <div class="form-group" style="margin-top: 5px">
                                    <button type="submit" class="btn btn-info btn-sm" id="bSimpanBadan">simpan</button>
                                    {{-- <button class="btn btn-danger btn-sm" id="bBatalBadan">batal</button> --}}
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="kebun"]').change(function(e){
                var data = $(this).val();

                $.ajax({
                    url : '{{url('ajax/get/kebun')}}',
                    type : 'post',
                    data : { id : data},
                    success : function(r){
                        r = r.trim();
                        r = $.parseJSON(r);
                        $('select[name="kecamatan"]').val(r.kecamatan_id);
                        $('select[name="kabupaten"]').val(r.kabupaten_kota_id);
                        $('select[name="provinsi"]').val(r.provinsi_id);
                    }
                });
            })

            $('#bSimpanTentang').click(function(e){
                e.preventDefault();
                var formdata = $('#formTentangKami').serialize();

                $.ajax({
                    url : '{{url('ajax/detail/tentang/proses')}}',
                    type : 'post', 
                    data : formdata,
                    success : function(r){
                        r = r.trim();
                        r = $.parseJSON(r);
                        swal(r.title, r.text, r.icon);
                    }, 
                    error: function(err){
                        swal('Aw!', 'Maaf, terjadi kesalahan : ' + err.responseJSON.message, 'error');
                    }
                });

            })

            $('#bSimpanBadan').click(function(e){
                e.preventDefault();
                var formdata = $('#formBerbadanHukum').serialize();

                $.ajax({
                    url : '{{url('ajax/detail/hukum/proses')}}',
                    type : 'post',
                    data : formdata,
                    success : function(r){
                        r = r.trim();
                        r = $.parseJSON(r);
                        swal(r.title, r.text, r.icon);
                    },
                    error : function(err){
                        swal('Aw!', 'Maaf, terjadi kesalahan : ' + err.responseJSON.message, 'error');
                    }
                });
            })
        })
    </script>

    @endsection
