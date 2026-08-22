<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<footer class=" text-gray-400 max-w-7xl mx-auto p-3">
    <strong>Copyright &copy; 2014-2019</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

</aside>
<!-- /.control-sidebar -->


<!-- jQuery -->
<script src="<?=base_url("assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url("assets/plugins/jquery-ui/jquery-ui.min.js")?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- DataTables -->
<script src="<?=base_url("assets/plugins/datatables/jquery.dataTables.min.js")?>"></script>
<script src="<?=base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")?>"></script>
<script src="<?=base_url("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")?>"></script>
<script src="<?=base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")?>"></script>
<!-- ChartJS -->
<script src="<?=base_url("assets/plugins/chart.js/Chart.min.js")?>"></script>
<!-- Sparkline -->
<script src="<?=base_url("assets/plugins/sparklines/sparkline.js")?>"></script>
<!-- JQVMap -->
<script src="<?=base_url("assets/plugins/jqvmap/jquery.vmap.min.js")?>"></script>
<script src="<?=base_url("assets/plugins/jqvmap/maps/jquery.vmap.usa.js")?>"></script>

<!-- jQuery Knob Chart -->
<script src="<?=base_url("assets/plugins/jquery-knob/jquery.knob.min.js")?>"></script>
<!-- daterangepicker -->
<script src="<?=base_url("assets/plugins/moment/moment.min.js")?>"></script>
<script src="<?=base_url("assets/plugins/daterangepicker/daterangepicker.js")?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url("assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")?>"></script>
<!-- Summernote -->
<script src="<?=base_url("assets/plugins/summernote/summernote-bs4.min.js")?>"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url("assets/dist/js/adminlte.js")?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url("assets/dist/js/pages/dashboard.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url("assets/dist/js/demo.js")?>"></script>

<!-- Select2 -->
<script src="<?= base_url("assets/plugins/select2/js/select2.full.min.js")?>"></script>
<script>
    $(function () {
        // Initialize Select2 Elements
        $('.select2').select2();

        // Initialize Select2 Elements with Bootstrap 4 theme
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>


<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

    });
</script>


<!-- Toast Notification Container -->
<div id="toast-container"></div>


<script>
    function showToast(message) {
        let container = $("#toast-container");
        let toast = $("<div>").addClass("toast-message").text(message);

        container.append(toast);

        // Slide in (right se left)
        container.css("right", "20px");

        // 3 sec baad slide out
        setTimeout(function () {
            toast.fadeOut(500, function () {
                $(this).remove();
                if (container.children().length === 0) {
                    container.css("right", "-400px");
                }
            });
        }, 3000);
    }

</script>
</body>
</html>