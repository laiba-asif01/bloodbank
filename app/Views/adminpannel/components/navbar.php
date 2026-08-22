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
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav text-[.87rem]">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?=base_url("dashboard")?>" class="nav-link <?= set_active('dashboard') ?>">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?=base_url("settings")?>" class="nav-link <?= set_active(['settings','privacypolicy']) ?>">Settings</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Download Demo APK</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Read Documentation</a>
            </li>


        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-danger elevation-4">
        <a href="<?=base_url("home")?>" class="brand-link">
            <img src="<?= base_url($settings['app_logo'] ?? 'uploads/img.png') ?>"
                 alt="Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">

            <span class="brand-text font-weight-light">
        <?= esc($settings['app_name'] ?? 'Blood Bank App') ?>
    </span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <a href="<?= base_url('adminconfig') ?>" class="brand-link d-flex -ml-2">
                <?php if(session()->get('logo')): ?>
                <img src="<?= base_url('uploads/admin/'.session()->get('logo')) ?>" alt="user image"
                     class="brand-image  img-circle elevation-2" >
                <?php else: ?>
                    <i class="nav-icon fas fa-user-circle"></i>
                <?php endif; ?>
                <span class="brand-text text-[16px] "><?= session()->get('username') ?? 'Admin' ?></span>
            </a>

            <!-- Sidebar Menu --> 
            <nav class="mt-2 text-sm">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="<?=base_url("dashboard")?>" class="nav-link <?= set_active('dashboard') ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url("banks")?>" class="nav-link <?= set_active('banks') ?>">
                            <i class="nav-icon fas fa-hospital-alt"></i>
                            <p>
                                Blood Banks
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?=base_url("donors")?>" class="nav-link <?= set_active('donors') ?>">
                            <i class="nav-icon fa fa-user-alt"></i>
                            <p>
                                Blood Donors
                            </p>
                        </a>

                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?=base_url("requests")?>" class="nav-link <?= set_active('requests') ?>">
                            <i class="nav-icon fas fa-hospital-alt"></i>
                            <p>
                                Blood Requests
                            </p>
                        </a>

                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?=base_url("appusers")?>" class="nav-link <?= set_active('appusers') ?>">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                App Users

                            </p>
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a href="<?=base_url("countries")?>" class="nav-link <?= set_active('countries') ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Countries
                            </p>
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a href="<?=base_url("states")?>" class="nav-link <?= set_active('states') ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                States
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url("cities")?>" class="nav-link <?= set_active('cities') ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Cities

                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url("admin/blogs")?>" class="nav-link <?= set_active(['admin/addblogs','admin/blogs']) ?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Blogs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url("notifications/list") ?>"
                           class="nav-link <?= set_active(['notifications', 'notifications/list', 'notificationslist']) ?>">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>Notifications</p>
                        </a>


                    </li>
                    <li class="nav-item ">
                        <a href="<?=base_url("settings")?>" class="nav-link <?= set_active(['settings','privacypolicy']) ?>">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">MISCELLANEOUS</li>
                    <li class="nav-item pb-3">
                        <a href="<?= base_url('logout') ?>" class="nav-link" >
                            <i class="nav-icon fas fa-file"></i>
                            <p>Logout</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>
</body>
</html>


