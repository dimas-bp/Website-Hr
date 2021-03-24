<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Calender -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('admin') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>H</b>R</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>HRM</b> GiNK</span>

            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url() ?>/template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url() ?>/template/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('gambar/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('gambar/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= session()->get('nama_user') ?> - <?php if (session()->get('level') == 1) {
                                                                                    echo 'Admin';
                                                                                } else {
                                                                                    echo 'User';
                                                                                } ?>
                                        <small><?= date('l, d-m-Y') ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?= base_url('admin') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="header">MENU</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Karyawan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Daftar Karyawan</a></li>
                            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Daftar Kehadiran</a></li>
                            <li><a href="<?= base_url('tipe') ?>"><i class="fa fa-circle-o"></i> Tipe Karyawan</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Calon Karyawan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Tambah Data</a></li>
                            <li><a href="<?= base_url('calkar') ?>"><i class="fa fa-circle-o"></i> Data Calon Karyawan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/calendar.html">
                            <i class="fa fa-calendar"></i> <span>Profil</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">3</small>
                                <small class="label pull-right bg-blue">17</small>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/mailbox/mailbox.html">
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-yellow">12</small>
                                <small class="label pull-right bg-green">16</small>
                                <small class="label pull-right bg-red">5</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $this->renderSection('content') ?>
            </section>
            <!-- jQuery 3 -->
            <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="<?= base_url() ?>/template/bower_components/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 3.3.7 -->
            <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- Morris.js charts -->
            <script src="<?= base_url() ?>/template/bower_components/raphael/raphael.min.js"></script>
            <script src="<?= base_url() ?>/template/bower_components/morris.js/morris.min.js"></script>
            <!-- Sparkline -->
            <script src="<?= base_url() ?>/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
            <!-- jvectormap -->
            <script src="<?= base_url() ?>/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="<?= base_url() ?>/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="<?= base_url() ?>/template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="<?= base_url() ?>/template/bower_components/moment/min/moment.min.js"></script>
            <script src="<?= base_url() ?>/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
            <!-- datepicker -->
            <script src="<?= base_url() ?>/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="<?= base_url() ?>/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <!-- Slimscroll -->
            <script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
            <!-- Calender -->
            <script src="<?= base_url() ?>/template/bower_components/moment/moment.js"></script>
            <script src="<?= base_url() ?>/template/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
            <!-- DataTables -->
            <script src="<?= base_url() ?>/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="<?= base_url() ?>/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="<?= base_url() ?>/template/dist/js/pages/dashboard.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
            <script>
                $(function() {
                    $('#example1').DataTable()
                    $('#example2').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': false,
                        'ordering': true,
                        'info': true,
                        'autoWidth': false
                    })
                })
            </script>
            <script>
                window.setTimeout(function() {
                    $('.alert').fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            </script>
            <!-- Page specific script -->
</body>

</html>