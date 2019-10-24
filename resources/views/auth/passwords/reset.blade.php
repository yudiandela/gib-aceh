@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <img width="50" class="img-circle" src="/images/gib-logo.png" alt="{{ config('app.name') }} Logo">
        <br>
        {{ config('app.name') }}
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">{{ __('Reset Password') }}</p>

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        value="{{ $email ?? old('email') }}" placeholder="Email" required>
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

                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input name="password_confirmation" type="password" class="form-control"
                        placeholder="Retype password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Reset Password') }}</button>

            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <!-- /.login-card-body -->
</div>
@endsection
