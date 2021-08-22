<?php
session_start();
include 'php/config.php';
include 'php/function.php';
if (!isset($_SESSION['loged_in'])) {
    echo "<script>alert('Silahkan login terlebih dahulu!');window.location='login.html'</script>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Sistem Informasi Persediaan Barang</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.php">
                    <span class="brand">SI Persediaan</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <?php $sql_brg = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE jumlahtersedia <=20");
                    $count_notif = mysqli_num_rows($sql_brg);
                    ?>
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-primary envelope-badge"><?= $count_notif; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong><?= $count_notif; ?> New</strong> Notifications</span>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <?php while ($rx = mysqli_fetch_array($sql_brg)) { ?>
                                        <a class="list-group-item">
                                            <div class="media">
                                                <div class="media-img">
                                                    <span class="badge badge-default badge-big"><i class="fa fa-shopping-basket"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-13">Jumlah Stock <?= $rx['namabarang'] . ' Tersisa ' . $rx['jumlahtersedia'] ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="./assets/img/admin-avatar.png" />
                            <span></span><?= $_SESSION['nama'] ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="php/proses_logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/1024px-User_icon_2.svg.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?= $_SESSION['nama'] ?></div><small><?= $_SESSION['level'] ?></small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="index.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">FEATURES</li>
                    <?php if ($_SESSION['level'] == 'Admin') { ?>
                        <li>
                            <a href="javascript:;"><i class="sidebar-item-icon fa fa-book"></i>
                                <span class="nav-label">Master</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-2-level collapse">
                                <li>
                                    <a href="admin.php">Admin</a>
                                </li>
                                <li>
                                    <a href="kategori.php">Kategori</a>
                                </li>
                                <li>
                                    <a href="barang.php">Barang</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="sidebar-item-icon fa fa-shopping-cart"></i>
                                <span class="nav-label">Transaksi</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-2-level collapse">
                                <li>
                                    <a href="barang-masuk.php">Barang Masuk</a>
                                </li>
                                <li>
                                    <a href="barang-keluar.php">Barang Keluar</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Laporan</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="laporan-barang.php">Barang</a>
                            </li>
                            <li>
                                <a href="laporan-barang-masuk.php">Barang Masuk</a>
                            </li>
                            <li>
                                <a href="laporan-barang-keluar.php">Barang Keluar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->