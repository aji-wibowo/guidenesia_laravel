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
                    <h3 class="box-title">{{__('anggota.box-header-title-tambah')}}</h3>
                    <a style="float: right;" class="btn btn-sm btn-success" href="{{url('anggota/list')}}">{{__('anggota.box-header-title-button-tambah')}}</a>
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
                                    <form action="{{url('anggota/edit/proses').'/'.$pengurus->id}}" method="post"
                                        id="formEditAnggota">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="form-group">
                                            <label for="#no_anggota">{{__('anggota.label1')}}</label>
                                            <input class="form-control" type="text" name="no_anggota" id="no_anggota"
                                                value="{{$pengurus->no_anggota}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#nama_anggota">{{__('anggota.label2')}}</label>
                                            <input class="form-control" type="text" name="nama_anggota"
                                                id="nama_anggota" value="{{$pengurus->nama_anggota}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#no_ktp">{{__('anggota.label3')}}</label>
                                            <input class="form-control" type="text" name="no_ktp" id="no_ktp"
                                                value="{{$pengurus->no_ktp}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">{{__('anggota.label4')}}</label>
                                            <input class="form-control" type="text" name="telepon" id="telepon"
                                                value="{{$pengurus->telepon}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#jenis_kelamin">{{__('anggota.label5')}}</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="-">{{__('anggota.pick1')}}</option>
                                                <option {{ $pengurus->jenis_kelamin == 'Pria' ? 'selected' : '' }}
                                                    value="Pria">{{__('anggota.jengkel1')}}</option>
                                                <option {{ $pengurus->jenis_kelamin == 'Wanita' ? 'selected' : '' }}
                                                    value="Wanita">{{__('anggota.jengkel2')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#umur">{{__('anggota.label6')}}</label>
                                            <select class="form-control" name="umur" id="umur">
                                                <option value="-">{{__('anggota.pick2')}}</option>
                                                <option {{$pengurus->umur == '<30' ? 'selected' : ''}} value="<30">{{__('anggota.umur1')}}</option>
                                                <option {{$pengurus->umur == '30-45' ? 'selected' : ''}} value="30-45">{{__('anggota.umur2')}}</option>
                                                <option {{$pengurus->umur == '45>' ? 'selected' : ''}} value="45>">{{__('anggota.umur3')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#agama">{{__('anggota.label7')}}</label>
                                            <select class="form-control" name="agama" id="agama">
                                                <option value="-">{{__('anggota.pick3')}}</option>
                                                <option {{$pengurus->agama == 'islam' ? 'selected' : ''}} value="islam">
                                                    Islam</option>
                                                <option {{$pengurus->agama == 'kristen' ? 'selected' : ''}} value="kristen">
                                                    Kristen</option>
                                                <option {{$pengurus->agama == 'katolik' ? 'selected' : ''}} value="katolik">
                                                    Katolik</option>
                                                <option {{$pengurus->agama == 'hindu' ? 'selected' : ''}} value="hindu">
                                                    Hindu</option>
                                                <option {{$pengurus->agama == 'buddha' ? 'selected' : ''}} value="buddha">
                                                    Buddha</option>
                                                <option {{$pengurus->agama == 'konghucu' ? 'selected' : ''}}
                                                    value="konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#no_pkb">{{__('anggota.label8')}}</label>
                                            <input class="form-control" type="text" name="no_pkb" id="no_pkb"
                                                value="{{$pengurus->no_pkb}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#tahun_pkb">{{__('anggota.label9')}}</label>
                                            <input class="form-control" type="text" name="tahun_pkb" id="tahun_pkb"
                                                value="{{$pengurus->tahun_pkb}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#pekerjaan">{{__('anggota.label10')}}</label>
                                            <input class="form-control" type="text" name="pekerjaan" id="pekerjaan"
                                                value="{{$pengurus->pekerjaan}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#perusahaan">{{__('anggota.label11')}}</label>
                                            <input class="form-control" type="text" name="perusahaan" id="perusahaan"
                                                value="{{$pengurus->perusahaan}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#status_anggota">{{__('anggota.label12')}}</label>
                                            <select class="form-control" name="status_anggota" id="status_anggota">
                                                <option value="-">{{__('pick4')}}</option>
                                                <option {{$pengurus->status_anggota == 'aktif' ? 'selected' : ''}} value="aktif">
                                                    {{__('anggota.status1')}}</option>
                                                <option {{$pengurus->status_anggota == 'nonaktif' ? 'selected' : ''}} value="nonaktif">
                                                    {{__('anggota.status2')}}</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer text-right clearfix">
                                    <div class="form-group">
                                        <button onclick="event.preventDefault();
                                    document.getElementById('formEditAnggota').submit();"
                                            class="btn btn-sm btn-success">{{__('anggota.button-submit')}}</button>

                                        <a href="{{url('anggota/list')}}" class="btn btn-sm btn-danger">{{__('anggota.button-cancel')}}</a>
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
