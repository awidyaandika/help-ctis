<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../helpctis/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../helpctis/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../helpctis/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../helpctis/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../helpctis/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../helpctis/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../helpctis/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../helpctis/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../helpctis/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../helpctis/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../helpctis/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../helpctis/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
@include('layouts.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content')
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- Modal Logout -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('layouts.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../helpctis/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../helpctis/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Data table -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- For refresh page if user choose cancel on logout sidebar -->
<script>
    $(document).ready(function(){
        $("button").click(function(){
            location.reload(true);
        });
    });
</script>
<!-- Bootstrap 4 -->
<script src="../helpctis/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../helpctis/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../helpctis/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../helpctis/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../helpctis/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../helpctis/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../helpctis/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../helpctis/plugins/jszip/jszip.min.js"></script>
<script src="../helpctis/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../helpctis/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../helpctis/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../helpctis/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../helpctis/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="../helpctis/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../helpctis/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../helpctis/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../helpctis/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../helpctis/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../helpctis/plugins/moment/moment.min.js"></script>
<script src="../helpctis/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../helpctis/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../helpctis/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../helpctis/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../helpctis/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../helpctis/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../helpctis/dist/js/pages/dashboard.js"></script>
</body>
</html>
