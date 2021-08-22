<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Detail Transaksi Barang Masuk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="barang-masuk.php">Transaksi Barang Masuk</a></li>
            <li class="breadcrumb-item">Detail Transaksi Barang Masuk</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
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
                                        <td></td>
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
                                        <a href="barang-masuk-add.php?cancel=true" class="btn btn-danger" onclick="javascript: return confirm('Anda yakin membatalkan transaksi?')" title="CANCEL"><i class="fa fa-times"></i> CANCEL</a>
                                    </td>
                                </tr>
                            </tfoot>
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
                <form class="form-horizontal" action="php/barang-masuk.php" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Nota</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nonota">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Suplier</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="namasuplier">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total Biaya</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="hidden" value="<?= $total ?>" name="totalbiaya" readonly>
                            <input class="form-control" type="text" value="<?= rupiah($total) ?>" name="totalbiayaa" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button class="btn btn-info" name="checkout" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
    <?php include 'footer.php' ?>