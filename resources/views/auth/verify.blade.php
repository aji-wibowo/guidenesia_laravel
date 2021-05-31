@extends('layouts/appAuth')

@section('title', 'Verif Email')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="login-box">
                <div class="login-logo">
                    <a href="{{url('/')}}"><b>Serikat</b> Yotani Kerja</a>
                </div>
            </div>
            <div class="box">
                <div class="box-header">{{ __('Verify Your Email Address') }}</div>

                <div class="box-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
