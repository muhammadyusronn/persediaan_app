<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Detail Transaksi Barang Keluar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="barang-keluar.php">Transaksi Barang Keluar</a></li>
            <li class="breadcrumb-item">Detail Transaksi Barang Keluar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Barang</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_detailkeluar WHERE kodetransaksi='$_GET[id]'");
                                while ($row = mysqli_fetch_array($sql)) {
                                    $total = $total + ($row['hargabarang'] * $row['jumlahbarang']);
                                ?>
                                    <tr>
                                        <td><?= $row['kodebarang'] ?></td>
                                        <td><?= $row['namabarang'] ?></td>
                                        <td><?= rupiah($row['hargabarang']) ?></td>
                                        <td><?= $row['jumlahbarang'] ?></td>
                                        <td><?= rupiah($row['hargabarang'] * $row['jumlahbarang']) ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Total</td>
                                    <td><?= rupiah($total); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Detail Transaksi</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <?php
                $qwr = mysqli_query($koneksi, "SELECT * FROM tb_barangkeluar WHERE kodetransaksi='$_GET[id]'");
                while ($data = mysqli_fetch_array($qwr)) {
                ?>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode Transaksi</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="kodetransaksi" readonly value="<?= $data['kodetransaksi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Konsumen</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="konsumen" readonly value="<?= $data['konsumen'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">kontak</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="kontak" readonly value="<?= $data['kontak'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="tanggaltransaksi" readonly value="<?= $data['tanggaltransaksi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total Belanja</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="totalbelanja" readonly value="<?= rupiah($data['totalbelanja']) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="penanggungjawab" readonly value="<?= $data['penanggungjawab'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <a href="cetak-struk-keluar.php?id=<?= $data['kodetransaksi'] ?>" target="_BLANK" class="btn btn-success"><i class="fa fa-print"></i> CETAK</a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
    <?php include 'footer.php' ?>