<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Koppee <?= (!empty($modulePage0)) ? '| '.ucfirst($modulePage0) : '' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $conf['web_url'] ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="<?= $conf['web_url'] ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $conf['web_url'] ?>/assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="<?= $conf['web_url'] ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= $conf['web_url'] ?>/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= $conf['web_url'] ?>/assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= $conf['web_url'] ?>/assets/plugins/select2/css/select2.min.css">
    <!-- JS -->
    <script src="<?= $conf['web_url']; ?>/assets/plugins/jquery/jquery.min.js"></script>
</head>
<? if ($include == 'login'){ ?>
<body class="login-page">
<? }else{ ?>
<body class="sidebar-mini sidemenu-closed sidebar-collapse layout-fixed" style="height:auto">
<? } ?>


<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link text-center">
            <!--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
            <span class="brand-text font-weight-light">Admin Tondiraba</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <!--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= Manager::getManagerByID($DB, $_SESSION['manager_id']) ?></a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="/" class="nav-link <?= (empty($modulePage0)) ? 'active' : '' ?>">
                            <i class=" nav-icon fas fa-info"></i>

                            <p>
                                Info
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/testimonial.html"
                           class="nav-link <?= ($modulePage0 == 'testimonial') ? 'active' : '' ?>">
                            <i class=" nav-icon fas fa-list"></i>
                            <p>
                                TESTIMONIAL
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/menu.html" class="nav-link <?= ($modulePage0 == 'menu') ? 'active' : '' ?>">
                            <i class=" nav-icon fas fa-store"></i>
                            <p>
                                MENU
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="/menu/category.html" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Категории</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="/menu/product.html" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Продукты</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="/menu/list_dishes.html" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список блюд</p></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

				<? if (!empty($data['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
						<?= showArray($data['error']) ?>

                    </div>
					<?
				} ?>
				<?
				if (!empty($data['success'])) { ?>
                    <div class="alert alert-success" role="alert">
						<?= showArray($data['success']) ?>
                    </div>
					<?
				} ?>

            </div>

			<?= $data['body']; ?>

        </div>
    </div>


</div>


<? if ($eror404) { ?>
    <hr>
    404
<? } ?>


<!-- Select2 -->
<script src="<?= $conf['web_url']; ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= $conf['web_url']; ?>/assets/js/adminlte.min.js"></script>
<script>
    //Initialize Select2 Elements
    $('.select2_dish_and_product').select2();

    //адресс
    $(document).ready(function () {
        $('.select2_dish_and_product').val(<?=$DishAndProduct?>);
        $('.select2_dish_and_product').trigger('change');
    });
</script>
</body>

</html>

