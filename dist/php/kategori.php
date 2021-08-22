<?php
include 'proses_data.php';
$tabel = 'tb_kategori';
if (isset($_POST['submit'])) {
    $kd = "SELECT max(idkategori) as maxKode from $tabel";
    $char = "KAT";
    $kode = getKode($kd, $char);
    $sql = "INSERT INTO $tabel (`idkategori`,`namakategori`,`deskripsikategori`) VALUES ('$kode','$_POST[namakategori]','$_POST[deskripsikategori]')";
    $msg = "Kategori";
    $scs = "../kategori.php";
    $fld = "../kategori.php";
    exc_create($sql, $msg, $scs, $fld);
}

if (isset($_GET['del'])) {
    $sql = "DELETE from $tabel where idkategori='$_GET[id]'";
    $msg = "Kategori";
    $scs = "../kategori.php";
    $fld = "../kategori.php";
    exc_delete($sql, $msg, $scs, $fld);
}
