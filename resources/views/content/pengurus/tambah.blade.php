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
                    <h3 class="box-title">{{__('pengurus.box-header-title-tambah')}}</h3>
                    <a style="float: right;" class="btn btn-sm btn-success" href="{{url('pengurus/list')}}">{{__('pengurus.box-header-title-button-tambah')}}</a>
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
                                    <form action="{{url('pengurus/tambah/proses')}}" method="post"
                                    id="formTambahAnggota">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="#no_anggota">{{__('pengurus.label1')}}</label>
                                        <input class="form-control" type="text" name="no_anggota" id="no_anggota"
                                        value="{{old('no_anggota')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#nama_anggota">{{__('pengurus.label2')}}</label>
                                        <input class="form-control" type="text" name="nama_anggota"
                                        id="nama_anggota" value="{{old('nama_anggota')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#no_ktp">{{__('pengurus.label3')}}</label>
                                        <input class="form-control" type="text" name="no_ktp" id="no_ktp"
                                        value="{{old('no_ktp')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">{{__('pengurus.label4')}}</label>
                                        <input class="form-control" type="text" name="telepon" id="telepon"
                                        value="{{old('telepon')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#jenis_kelamin">{{__('pengurus.label5')}}</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="-">{{__('pengurus.pick1')}}</option>
                                            <option {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}
                                            value="Pria">{{__('pengurus.jengkel1')}}</option>
                                            <option {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}
                                            value="Wanita">{{__('pengurus.jengkel2')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="#umur">{{__('pengurus.label6')}}</label>
                                        <select class="form-control" name="umur" id="umur">
                                            <option value="-">{{__('pengurus.pick2')}}</option>
                                            <option {{old('umur') == '<30' ? 'selected' : ''}} value="<30">{{__('pengurus.umur1')}}</option>
                                            <option {{old('umur') == '30-45' ? 'selected' : ''}} value="30-45">{{__('pengurus.umur2')}}</option>
                                            <option {{old('umur') == '45>' ? 'selected' : ''}} value="45>">{{__('pengurus.umur3')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="#agama">{{__('pengurus.label7')}}</label>
                                        <select class="form-control" name="agama" id="agama">
                                            <option value="-">{{__('pengurus.pick3')}}</option>
                                            <option {{old('agama') == 'islam' ? 'selected' : ''}} value="islam">
                                            Islam</option>
                                            <option {{old('agama') == 'kristen' ? 'selected' : ''}} value="kristen">
                                            Kristen</option>
                                            <option {{old('agama') == 'katolik' ? 'selected' : ''}} value="katolik">
                                            Katolik</option>
                                            <option {{old('agama') == 'hindu' ? 'selected' : ''}} value="hindu">
                                            Hindu</option>
                                            <option {{old('agama') == 'buddha' ? 'selected' : ''}} value="buddha">
                                            Buddha</option>
                                            <option {{old('agama') == 'konghucu' ? 'selected' : ''}}
                                            value="konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="#no_pkb">{{__('pengurus.label8')}}</label>
                                        <input class="form-control" type="text" name="no_pkb" id="no_pkb"
                                        value="{{old('no_pkb')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#tahun_pkb">{{__('pengurus.label9')}}</label>
                                        <input class="form-control" type="text" name="tahun_pkb" id="tahun_pkb"
                                        value="{{old('tahun_pkb')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#pekerjaan">{{__('pengurus.label10')}}</label>
                                        <input class="form-control" type="text" name="pekerjaan" id="pekerjaan"
                                        value="{{old('pekerjaan')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#perusahaan">{{__('pengurus.label11')}}</label>
                                        <input class="form-control" type="text" name="perusahaan" id="perusahaan"
                                        value="{{old('perusahaan')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#status_anggota">{{__('pengurus.label12')}}</label>
                                        <select class="form-control" name="status_anggota" id="status_anggota">
                                            <option value="-">{{__('pengurus.pick4')}}</option>
                                            <option {{old('status_anggota') == 'aktif' ? 'selected' : ''}} value="aktif">
                                            {{__('pengurus.status1')}}</option>
                                            <option {{old('status_anggota') == 'nonaktif' ? 'selected' : ''}} value="nonaktif">
                                            {{__('pengurus.status2')}}</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="box-footer text-right clearfix">
                                <div class="form-group">
                                    <button onclick="event.preventDefault();
                                    document.getElementById('formTambahAnggota').submit();"
                                    class="btn btn-sm btn-success">{{__('pengurus.button-submit')}}</button>

                                    <a href="{{url('pengurus/list')}}" class="btn btn-sm btn-danger">{{__('pengurus.button-cancel')}}</a>
                                </div>
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
