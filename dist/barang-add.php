<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Form Barang</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Form Barang</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Mohon untuk memasukkan data yang valid!</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-barang" method="post" action="php/barang.php" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="namabarang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Barang</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="harga">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Modal</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="hargamodal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Tersedia</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="jumlahtersedia">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kategori Barang</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kategori">
                                <option disabled>Silahkan pilih kategori branga</option>
                                <?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                                while ($rox = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?= $rox['idkategori'] ?>"><?= $rox['namakategori'] ?></option>
                                <?php } ?>
                            </select>
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