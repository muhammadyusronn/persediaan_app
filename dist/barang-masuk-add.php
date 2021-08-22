<?php include 'header.php';
include 'php/pemasukan-cart.php';
?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Transaksi Barang Masuk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="barang-masuk.php">Transaksi Barang Masuk</a></li>
            <li class="breadcrumb-item">Tambah Transaksi Barang Masuk</li>
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
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sql = mysqli_query($koneksi, "SELECT tb_barang.*,tb_kategori.namakategori as kat 
                                FROM tb_barang,tb_kategori WHERE tb_kategori.idkategori=tb_barang.kategori ORDER BY namabarang ASC");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $data['idbarang'] ?></td>
                                        <td><?= $data['namabarang'] ?></td>
                                        <td><?= rupiah($data['harga']) ?></td>
                                        <td><?= $data['jumlahtersedia'] ?></td>
                                        <td>
                                            <a href="?id=<?= $data['idbarang'] ?>" class="btn btn-info" title="ORDER"><i class="fa fa-shopping-cart"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['keranjang_masuk'])) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Data Order</div>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['keranjang_masuk'] as $i) :
                                        $total = $total + ($i['hargabarang'] * $i['jumlahmasuk']);
                                    ?>
                                        <tr>
                                            <td><?= $i['idbarang'] ?></td>
                                            <td><?= $i['namabarang'] ?></td>
                                            <td><?= rupiah($i['hargabarang']) ?></td>
                                            <td><?= $i['jumlahmasuk'] ?></td>
                                            <td><?= rupiah($i['hargabarang'] * $i['jumlahmasuk']) ?></td>
                                            <td>
                                                <a href="?action=delete&id=<?= $i['idbarang'] ?>" class="btn btn-warning" title="HAPUS"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td><?= rupiah($total); ?></td>
                                        <td>
                                            <a href="?cancel=true" class="btn btn-danger" onclick="javascript: return confirm('Anda yakin membatalkan transaksi?')" title="CANCEL"><i class="fa fa-times"></i></a>
                                            <a href="barang-masuk-checkout.php" class="btn btn-success" title="CHECKOUT"><i class="fa fa-money"></i></a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if (isset($_GET['id'])) {
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE idbarang='$_GET[id]'");
        while ($row = mysqli_fetch_array($sql)) {
    ?>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Form Transaksi</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="hidden" name="idbarang" value="<?= $row['idbarang'] ?>">
                                    <input class="form-control" type="text" name="namabarang" value="<?= $row['namabarang'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Harga Jual</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="harga" value="<?= $row['harga'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah Tersedia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="jumlahtersedia" value="<?= $row['jumlahtersedia'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Harga Barang</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="hargamodal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah Masuk</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="jumlahmasuk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" name="order" type="submit">Submit</button>
                                    <a href="barang-masuk-add.php" class="btn btn-warning">RESET</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
    <!-- END PAGE CONTENT-->
    <?php include 'footer.php' ?>