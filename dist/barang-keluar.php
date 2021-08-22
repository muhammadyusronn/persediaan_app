<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Transaksi Barang Keluar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Transaksi Barang Keluar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <a href="barang-keluar-add.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Transaksi Barang Keluar</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
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
                        <?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_barangkeluar");
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
    </div>
    <?php include 'footer.php' ?>