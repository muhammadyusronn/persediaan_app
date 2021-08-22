<?php include 'header.php' ?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Form Kategori</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Form Kategori</li>
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
                <form class="form-horizontal" id="form-kategori" method="post" action="php/kategori.php" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="namakategori">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi Kategori</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="deskripsikategori"></textarea>
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