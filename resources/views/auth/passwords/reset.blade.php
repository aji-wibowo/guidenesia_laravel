 @extends('layouts/appAuth')

 @section('title', 'Email')

 @section('konten')

 <div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>Serikat</b> Yotani Kerja</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Masukan password baru Anda</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback">
               <label for="email">{{ __('E-Mail Address') }}</label>
               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
               @error('email')
               <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
               @enderror
               <span class="fa fa-envelope form-control-feedback"></span>
           </div>

           <div class="form-group has-feedback">
               <label for="password">{{ __('Password') }}</label>
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
               @error('password')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <span class="fa fa-key form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
           <label for="password-confirm">{{ __('Password Confirm') }}</label>
           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
           @error('password')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <span class="fa fa-key form-control-feedback"></span>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
             {{ __('Reset Password') }}
         </button>
     </div>
 </form>
 
</div>
</form>
</div>
</div>
@endsection
