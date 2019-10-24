@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <img width="80" class="img-circle" src="/images/gib-logo.png" alt="{{ config('app.name') }} Logo">
        <br>
        {{ config('app.name') }}
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                {{ __('Sign in to start your session') }}
            </p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input name="email" type="text" class="form-control @error('email')is-invalid @enderror"
                        placeholder="{{ __('Username or Email') }}" value="{{ old('email') }}" required>
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
                    <input name="password" type="password" class="form-control" placeholder="{{ __('Password') }}"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Sign In') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- {{ __('OR') }} -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> {{ __('Sign in using Facebook') }}
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> {{ __('Sign in using Google+') }}
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('I forgot my password') }}</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{ __('Register a new membership') }}</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
