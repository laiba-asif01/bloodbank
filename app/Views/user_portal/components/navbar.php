<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css")?> ">
    <!-- Ionicons -->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?=base_url("assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css")?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=base_url("assets/plugins/jqvmap/jqvmap.min.css")?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url("assets/dist/css/adminlte.min.css")?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url("assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url("assets/plugins/daterangepicker/daterangepicker.css")?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?=base_url("assets/plugins/summernote/summernote-bs4.css")?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Ionicons -->
    <!-- Ionicons via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">


    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url("assets/plugins/select2/css/select2.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")?>">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper border border-gray-100">

    <!-- Navbar -->
    <nav class=" navbar navbar-white   max-w-7xl mx-auto">
        <!-- Left navbar links -->
        <ul class="navbar-nav text-[.87rem] pr-2 pl-2">

            <li class="nav-item">
                <h5 class="text-bold text-[25px] text-muted">Welcome, <span class="text-red-600"><?= esc($user['full_name']) ?></span>!</h5>
            </li>



        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto pr-2 pl-2">

            <li class="nav-item">

                <!-- Add this where appropriate in your structure.php -->
                <a href="<?= base_url('user/logout') ?>" class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->


</div>
</body>
</html>


