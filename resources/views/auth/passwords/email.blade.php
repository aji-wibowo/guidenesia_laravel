 @extends('layouts/appAuth')

 @section('title', 'Email')

 @section('konten')

 <div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>Serikat</b> Yotani Kerja</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Masukan email Anda yang terdaftar</p>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group has-feedback">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Send Link') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="text-right">
           <a href="{{url('login')}}" class="btn btn-link">Sudah ingat? Login</a>
       </div>
   </div>
</div>
@endsection