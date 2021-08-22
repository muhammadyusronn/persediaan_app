<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Transaksi Barang Masuk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Transaksi Barang Masuk</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <a href="barang-masuk-add.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Transaksi Barang Masuk</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>No Nota</th>
                            <th>Suplier</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Biaya</th>
                            <th>Penanggung Jawab</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>No Nota</th>
                            <th>Suplier</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Biaya</th>
                            <th>Penanggung Jawab</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_barangmasuk");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $data['kodetransaksi'] ?></td>
                                <td><?= $data['nonota'] ?></td>
                                <td><?= $data['namasuplier'] ?></td>
                                <td><?= TanggalIndo($data['tanggaltransaksi']) ?></td>
                                <td><?= rupiah($data['totalbiaya']) ?></td>
                                <td><?= $data['penanggungjawab'] ?></td>
                                <td>
                                    <a href="barang-masuk-detail.php?id=<?= $data['kodetransaksi'] ?>" class="btn btn-info" title="DETAIL"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>