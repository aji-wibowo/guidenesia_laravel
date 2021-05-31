@extends('layouts/appAuth')

@section('title', 'Login')

@section('konten')
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>Serikat</b> Yotani Kerja</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="seker_username" class="form-control" placeholder="Username"
                value="{{ old('seker_username') }}" {{-- required --}}>
                @error('seker_username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password"
                value="{{ old('password') }}" {{-- required --}}>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::captcha(['data-theme' => 'light']) !!}
                @error('g-recaptcha-response')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            <div style="margin-top: 5px;"> 
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">I forgot my password</a>
                @endif
            </div>
            <!-- /.col -->
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection