<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IMS | Inventory Management System</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/skin-green.min.css') }}">
    
    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #00a65a;
            --primary-dark: #008d4c;
            --secondary-color: #3c8dbc;
            --accent-color: #605ca8;
            --text-dark: #222d32;
            --text-light: #b8c7ce;
        }
        
        /* Header Styles */
        .main-header .logo {
            transition: all 0.3s;
            background-color: var(--primary-dark);
        }
        
        .main-header .logo:hover {
            background-color: var(--primary-color);
        }
        
        .logo-lg b, .logo-mini b {
            font-weight: 700;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .user-header {
            background-color: var(--primary-color) !important;
        }
        
        /* Footer Styles */
        .main-footer {
            background: #c4c4c4;
            border-top: 1px solid #eee;
            color: rgb(0, 0, 0);
            padding: 15px;
        }
        
        /* Content Wrapper */
        .content-wrapper {
            background-color: #f4f6f9;
        }
        
        /* User Panel Enhancements */
        .user-image {
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .dropdown-menu {
            border-radius: 3px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }
        
        /* Button Enhancements */
        .btn-danger {
            background-color: #dd4b39;
            border-color: #d73925;
        }
        
        .btn-danger:hover {
            background-color: #d73925;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 767px) {
            .main-header .logo {
                width: 100%;
                float: none;
                text-align: center;
            }
            
            .navbar-custom-menu {
                float: none;
                margin-right: 0;
            }
        }
    </style>
    
    @yield('top')
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>IMS</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Inventory System</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </a>
            
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('user-profile.png') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ \Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image in dropdown -->
                            <li class="user-header">
                                <img src="{{ asset('user-profile.png') }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ \Auth::user()->name }}
                                    <small>{{ \Auth::user()->email }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a class="btn btn-danger btn-flat btn-block" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header (Optional) -->
        {{-- <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('subtitle')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                @yield('breadcrumbs')
            </ol>
        </section> --}}

        <!-- Main Content -->
        <section class="content container-fluid">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <strong>Version</strong> 3.1.0
        </div>
        <strong>&copy; {{ date('Y') }} - IMS</strong> Developed in Sri Lanka
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

@yield('bot')
</body>
</html>