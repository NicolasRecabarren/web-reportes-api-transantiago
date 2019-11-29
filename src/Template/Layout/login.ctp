<?php
    # Clase que nos ayuda a crear URLs.
    use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta charset="utf-8">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->fetch('title') ?></title>

        <!-- Font Awesome -->
        <?= $this->Html->css('/js/plugins/fontawesome-free/css/all.min.css') ?>
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <?= $this->Html->css('/js/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>
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
    <body class="hold-transition login-page">
        <div class="bkg-img" style="position: absolute; width: 100%; height: 100%; opacity: 0.3; background-image: url(<?= Router::url('/',true) ?>img/bkg_login.jpg);">
        </div>
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
        <!-- /.login-box -->
    </body>
</html>
