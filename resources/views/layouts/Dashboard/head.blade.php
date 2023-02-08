<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>{{config('app.name')}} | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel='stylesheet'
          href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='{{asset('AssetsAdmin')}}/plugins/fontawesome-free/css/all.min.css'>
    <!-- Ionicons -->
{{--    <link rel='stylesheet'--}}
{{--          href='{{asset('AssetsAdmin')}}/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>--}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel='stylesheet'
          href='{{asset('AssetsAdmin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'>
    <!-- iCheck -->
    <link rel='stylesheet' href='{{asset('AssetsAdmin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css'>
    {{--    <!-- JQVMap -->--}}
    <link rel='stylesheet' href='{{asset('AssetsAdmin')}}/plugins/jqvmap/jqvmap.min.css'>
    {{--    <!-- Theme style -->--}}
    <link rel='stylesheet' href='{{asset('AssetsAdmin')}}/dist/css/adminlte.min.css'>
    {{--    <!-- overlayScrollbars -->--}}
    <link rel='stylesheet' href='{{asset('AssetsAdmin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'>
    {{--    <!-- Daterange picker -->--}}
    <link rel='stylesheet' href='{{asset('AssetsAdmin')}}/plugins/daterangepicker/daterangepicker.css'>
    {{--    <!-- summernote -->--}}
    <link rel='stylesheet' href='{{asset('AssetsAdmin')}}/plugins/summernote/summernote-bs4.min.css'>

    @yield('css')
</head>