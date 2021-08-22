<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_persediaan');
if (!$koneksi) {
    echo 'gagal terkoneksi ke database!';
    die();
}
