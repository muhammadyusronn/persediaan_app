<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Laporan Transaksi Barang Keluar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Laporan Transaksi Barang Keluar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <?php if (!isset($_POST['filter_data'])) { ?>
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Silahkan pilih periode laporan!</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mulai Dari</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="date" name="mulaidari" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sampai</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="date" name="sampai" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" name="filter_data" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <a href="" class="btn btn-warning mb-4">RESET</a>
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Laporan Transaksi Barang Keluar</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="laporan-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kode Transaksi</th>
                                <th>Konsumen</th>
                                <th>Kontak</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Belanja</th>
                                <th>Penanggung Jawab</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kode Transaksi</th>
                                <th>Konsumen</th>
                                <th>Kontak</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Belanja</th>
                                <th>Penanggung Jawab</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_barangkeluar WHERE tanggaltransaksi BETWEEN '$_POST[mulaidari]' AND '$_POST[sampai]'");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?= $data['kodetransaksi'] ?></td>
                                    <td><?= $data['konsumen'] ?></td>
                                    <td><?= $data['kontak'] ?></td>
                                    <td><?= TanggalIndo($data['tanggaltransaksi']) ?></td>
                                    <td><?= rupiah($data['totalbelanja']) ?></td>
                                    <td><?= $data['penanggungjawab'] ?></td>
                                    <td>
                                        <a href="barang-keluar-detail.php?id=<?= $data['kodetransaksi'] ?>" class="btn btn-info" title="DETAIL"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include 'footer.php' ?>