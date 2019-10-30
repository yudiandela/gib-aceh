<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/vendor/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a id="logoutBtn" class="nav-link btn btn-danger text-white" href="{{ route('logout') }}">
                        {{ __('Sign Out') }} <i class=" fas fa-sign-out-alt"></i>
                    </a>

                    <form style="display: hidden;" id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="/images/gib-logo.png" alt="{{ config('app.name') }} Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->profile->photo !== null ? Auth::user()->profile->photo : '/images/gib-logo.png' }}"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>{{ __('Dashboard') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile') }}"
                                class="nav-link {{ strpos(Route::currentRouteName(), 'profile') !== false ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>{{ __('Profile') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user') }}"
                                class="nav-link {{ strpos(Route::currentRouteName(), 'user') !== false ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>{{ __('User') }}</p>
                            </a>
                        </li>
                        {{-- <li
                            class="nav-item has-treeview {{ strpos(Route::currentRouteName(), 'profile') !== false ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ strpos(Route::currentRouteName(), 'profile') !== false ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                {{ __('User Management') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('profile.index') }}"
                                    class="nav-link {{ strpos(Route::currentRouteName(), 'profile.index') !== false ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Profile</p>
                                </a>
                            </li>
                        </ul>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>
                Copyright &copy; {{ 2019 == date('Y') ? date('Y') : 2019 . '-' . date('Y') }}
                <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>.
            </strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="/vendor/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- Toastr -->
    <script src="/vendor/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendor/dist/js/adminlte.min.js"></script>
    <!-- InputMask -->
    <script src="/vendor/plugins/moment/moment.min.js"></script>
    <script src="/vendor/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <script>
        $(function() {
            $('#logoutBtn').click(function(event) {
                event.preventDefault();
                $('#logoutForm').submit();
            })
            // Format Handphone
            $('[data-mask]').inputmask()

            $('.dataTable').DataTable();
        })
    </script>
    @stack('script')
</body>

</html>
