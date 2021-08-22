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
                                <tr>
                                    <td>BRG001</td>
                                    <td>Pena</td>
                                    <td>20.000</td>
                                    <td>10</td>
                                    <td>200.000</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Total</td>
                                    <td>200.000</td>
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
                <form class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode Transaksi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kodetransaksi">
                        </div>
                    </div>
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
                        <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" name="tanggaltransaksi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total Biaya</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="totalbiaya">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button class="btn btn-info" name="submit" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
    <?php include 'footer.php' ?>