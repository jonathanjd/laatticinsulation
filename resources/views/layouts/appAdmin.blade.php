<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Admin</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Styles -->
    <link href="{{ asset('adminLTE/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminLTE/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminLTE/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminLTE/css/skins/_all-skins.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminLTE/css/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
</head>

<body class="hold-transition skin-black sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('admin.include.header')
        @include('admin.include.mainSideBar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               @yield('content-header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2014-2018
                <a href="#">My Admin</a>.</strong> All rights reserved.
        </footer>

        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('adminLTE/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminLTE/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('adminLTE/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminLTE/js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('adminLTE/js/fastclick.js') }}"></script>
    <script src="{{ asset('adminLTE/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('adminLTE/js/adminlte.min.js') }}"></script>
    @yield('script')
</body>

</html>