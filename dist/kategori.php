<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Data Kategori</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Data Kategori</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <a href="kategori-add.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Kategori</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi Kategori</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi Kategori</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $data['idkategori'] ?></td>
                                <td><?= $data['namakategori'] ?></td>
                                <td><?= $data['deskripsikategori'] ?></td>
                                <td>
                                    <a href="php/kategori.php?del&id=<?= $data['idkategori'] ?>" class="btn btn-danger" title="HAPUS" onclick="javascript: return confirm('anda yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>