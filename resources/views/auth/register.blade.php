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
            <p class="login-box-msg">{{ __('Register a new membership') }}</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" placeholder="Full name" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
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

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="1" required>
                            <label for="agreeTerms">
                                {{ __('I agree to the') }} <a href="#">{{ __('terms') }}</a>
                            </label>
                        </div>
                        @error('terms')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    {{ __('Sign up using Facebook') }}
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    {{ __('Sign up using Google+') }}
                </a>
            </div>

            <a href="{{ route('login') }}" class="text-center">
                {{ __('I already have a membership') }}
            </a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <!-- /.login-card-body -->
</div>
@endsection
