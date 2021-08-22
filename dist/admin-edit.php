<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Form Admin</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Form Admin</li>
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
                <?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$_GET[id]'");
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <form class="form-horizontal" id="form-admin" method="post" action="php/admin.php" novalidate="novalidate">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="nama" value="<?= $row['nama'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="hidden" name="username_lama" value="<?= $row['username'] ?>">
                                <input class="form-control" type="text" name="username" value="<?= $row['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Kosong jika tidak merubah password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Kosongkan jika tidak merubah password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat"><?= $row['alamat'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="nomorhp" value="<?= $row['nomorhp'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="level">
                                    <option disabled>Pilih Level User</option>
                                    <option <?php if ($row['level'] == 'Pimpinan') {
                                                echo 'selected';
                                            } ?> value="Pimpinan">Pimpinan</option>
                                    <option <?php if ($row['level'] == 'Admin') {
                                                echo 'selected';
                                            } ?> value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-warning" name="update" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
    <?php include 'footer.php' ?>