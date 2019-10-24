@extends('layouts.auth')

@section('content')
<div>
    <div class="login-logo">
        <img width="50" class="img-circle" src="/images/gib-logo.png" alt="{{ config('app.name') }} Logo">
        <br>
        {{ config('app.name') }}
    </div>
    <!-- /.login-logo -->

    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
    @endif

    <div class="card">
        <div class="card-body register-card-body">
            <h2 class="login-box-msg">
                {{ __('Verify Your Email Address') }}
            </h2>

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                    {{ __('click here to request another') }}
                </button>.
            </form>
        </div>
    </div>
</div>
@endsection
