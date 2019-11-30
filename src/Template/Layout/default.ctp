<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->fetch('title') ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <?= $this->Html->css('/js/plugins/fontawesome-free/css/all.min.css') ?>
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <?= $this->Html->css('/js/dist/css/adminlte.min.css') ?>
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- jQuery -->
        <?= $this->Html->script('/js/plugins/jquery/jquery.min.js') ?>
        <!-- Bootstrap 4 -->
        <?= $this->Html->script('/js/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
        <!-- AdminLTE App -->
        <?= $this->Html->script('/js/dist/js/adminlte.min.js') ?>
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fas fa-sign-out-alt"></i> Cerrar sesión',['controller' => 'Users', 'action' => 'logout'],[
                                    'class'  => 'nav-link',
                                    'escape' => false
                        ]) ?>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-4 sidebar-light-info">
                <!-- Brand Logo -->
                <a href="javascript:;" class="brand-link navbar-light">
                    <?= $this->Html->image('logo2.png', ['class' => 'brand-image', 'alt' => 'Logo Sitio']) ?>
                <span class="brand-text font-weight-light">a</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <?= $this->Html->image('gato_juanito.jpg', ['class' => 'img-circle elevation-2', 'alt' => 'User Image']) ?>
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Admin</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <?= $this->Html->link('<i class="nav-icon fas fa-tachometer-alt"></i> <p>Dashboard</p>',['controller' => 'Pages', 'action' => 'dashboard'],[
                                            'class'  => 'nav-link',
                                            'escape' => false
                                ]) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link('<i class="nav-icon fas fa-chart-bar"></i> <p>Reportes</p>',['controller' => 'Pages', 'action' => 'reportes'],[
                                            'class'  => 'nav-link',
                                            'escape' => false
                                ]) ?>
                            </li>

                        </ul>
                    </nav>
                <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?= $this->Element('layout/content-header') ?>

                <!-- Main content -->
                <section class="content">
                    <?= $this->fetch('content') ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.1
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
    </body>
</html>
