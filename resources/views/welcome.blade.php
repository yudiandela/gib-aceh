<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                @if (Route::has('login'))
                <li class="nav-item">
                    @auth
                    <a class="btn btn-primary" href="{{ route('dashboard.index') }}">
                        <i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}
                    </a>
                    @else
                    <a class="btn btn-primary" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </a>

                    @if (Route::has('register'))
                    <a class="btn btn-primary" href="{{ route('register') }}">
                        <i class="fas fa-users"></i> {{ __('Register') }}
                    </a>
                    @endif
                    @endauth
                </li>
                @endif
            </ul>
        </nav>
    </div>

    <div class="mt-5">
        <div class="login-logo">
            <img width="500" src="/images/gib-aceh-banner.png" alt="{{ config('app.name') }} Banner">
        </div>
    </div>
</body>

</html>
