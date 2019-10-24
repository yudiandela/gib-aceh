@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <img width="50" class="img-circle" src="/images/gib-logo.png" alt="{{ config('app.name') }} Logo">
        <br>
        {{ config('app.name') }}
    </div>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">{{ __('Reset Password') }}</p>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
