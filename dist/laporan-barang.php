<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Laporan Data Barang</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Laporan Data Barang</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Laporan Data Barang</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="laporan-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Tersedia</th>
                            <th>Harga Modal</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Tersedia</th>
                            <th>Harga Modal</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $sql = mysqli_query($koneksi, "SELECT tb_barang.*,tb_kategori.namakategori as kat 
                        FROM tb_barang,tb_kategori WHERE tb_kategori.idkategori=tb_barang.kategori ORDER BY namabarang ASC");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $data['namabarang'] ?></td>
                                <td><?= $data['jumlahtersedia'] ?></td>
                                <td><?= rupiah($data['hargamodal']) ?></td>
                                <td><?= rupiah($data['harga']) ?></td>
                                <td><?= $data['kat'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>