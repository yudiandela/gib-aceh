@extends('layouts.auth')

@section('content')
<div>
    <div class="login-logo">
        <img width="50" class="img-circle" src="/images/gib-logo.png" alt="{{ config('app.name') }} Logo">
        <br>
        {{ config('app.name') }}
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <h2 class="login-box-msg">
                {{ __('Confirm Password') }}
            </h2>

            {{ __('Please confirm your password before continuing.') }}
            <form action="{{ route('password.confirm') }}" method="POST">
                @csrf
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

                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ __('Confirm Password') }}
                </button>

            </form>

            @if (Route::has('password.request'))
            <div class="mt-2">
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
