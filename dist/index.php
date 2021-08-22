<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <?php
        $tbk = mysqli_query($koneksi, "SELECT kodetransaksi, SUM(totalbelanja) as sum_tbk FROM tb_barangkeluar");
        $count_tbk = mysqli_num_rows($tbk);
        $sum_tbk = mysqli_fetch_array($tbk);

        $tbm = mysqli_query($koneksi, "SELECT kodetransaksi, SUM(totalbiaya) as sum_tbm FROM tb_barangmasuk");
        $count_tbm = mysqli_num_rows($tbm);
        $sum_tbm = mysqli_fetch_array($tbm);

        $usr = mysqli_query($koneksi, "SELECT * FROM tb_admin");
        $count_usr = mysqli_num_rows($usr);
        ?>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"><?= $count_tbk; ?></h2>
                        <div class="m-b-5">Transaksi Barang Keluar</div><i class="fa fa-money widget-stat-icon"></i>
                        <div><i class="m-r-5"></i><small><?= rupiah($sum_tbk['sum_tbk']) ?></small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"><?= $count_tbm ?></h2>
                        <div class="m-b-5">Transaksi Barang Masuk</div><i class="ti-shopping-cart widget-stat-icon"></i>
                        <div><i class="m-r-5"></i><small><?= rupiah($sum_tbm['sum_tbm']); ?></small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"><?= $count_usr ?></h2>
                        <div class="m-b-5">USERS</div><i class="ti-user widget-stat-icon"></i>
                        <div><i class="m-r-5"></i><small></small></div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .visitors-table tbody tr td:last-child {
                display: flex;
                align-items: center;
            }

            .visitors-table .progress {
                flex: 1;
            }

            .visitors-table .progress-parcent {
                text-align: right;
                margin-left: 10px;
            }
        </style>
    </div>
    <!-- END PAGE CONTENT-->
    <?php include 'footer.php'; ?>