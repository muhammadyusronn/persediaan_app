<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Data Admin</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Data Admin</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <a href="admin-add.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Admin</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_admin");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['nomorhp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['level'] ?></td>
                                <td>
                                    <a href="admin-edit.php?id=<?= $data['username'] ?>" class="btn btn-warning" title="EDIT"><i class="fa fa-pencil"></i></a>
                                    <a href="php/admin.php?del&id=<?= $data['username'] ?>" class="btn btn-danger" title="HAPUS" onclick="javascript: return confirm('anda yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>