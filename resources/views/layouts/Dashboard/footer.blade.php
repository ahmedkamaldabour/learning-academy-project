<footer class='main-footer'>
    <strong>Copyright &copy; 2014-2021 <a href='https://adminlte.io'>AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class='float-right d-none d-sm-inline-block'>
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class='control-sidebar control-sidebar-dark'>
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src='{{asset('AssetsAdmin')}}/plugins/jquery/jquery.min.js'></script>
<!-- jQuery UI 1.11.4 -->
<script src='{{asset('AssetsAdmin')}}/plugins/jquery-ui/jquery-ui.min.js'></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src='{{asset('AssetsAdmin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js'></script>
<!-- ChartJS -->
<script src='{{asset('AssetsAdmin')}}/plugins/chart.js/Chart.min.js'></script>
<!-- Sparkline -->
<script src='{{asset('AssetsAdmin')}}/plugins/sparklines/sparkline.js'></script>
<!-- JQVMap -->
<script src='{{asset('AssetsAdmin')}}/plugins/jqvmap/jquery.vmap.min.js'></script>
<script src='{{asset('AssetsAdmin')}}/plugins/jqvmap/maps/jquery.vmap.usa.js'></script>
<!-- jQuery Knob Chart -->
<script src='{{asset('AssetsAdmin')}}/plugins/jquery-knob/jquery.knob.min.js'></script>
<!-- daterangepicker -->
<script src='{{asset('AssetsAdmin')}}/plugins/moment/moment.min.js'></script>
<script src='{{asset('AssetsAdmin')}}/plugins/daterangepicker/daterangepicker.js'></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src='{{asset('AssetsAdmin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'></script>
<!-- Summernote -->
<script src='{{asset('AssetsAdmin')}}/plugins/summernote/summernote-bs4.min.js'></script>
<!-- overlayScrollbars -->
<script src='{{asset('AssetsAdmin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'></script>
<!-- AdminLTE App -->
<script src='{{asset('AssetsAdmin')}}/dist/js/adminlte.js'></script>
<!-- AdminLTE for demo purposes -->
{{--<script src='{{asset('AssetsAdmin')}}/dist/js/demo.js'></script>--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src='{{asset('AssetsAdmin')}}/dist/js/pages/dashboard.js'></script>--}}
{{-- sweet alert --}}
@include('sweetalert::alert')
@yield('js')

</body>
</html>