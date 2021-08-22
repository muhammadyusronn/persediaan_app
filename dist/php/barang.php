<?php
include 'proses_data.php';
$tabel = 'tb_barang';
if (isset($_POST['submit'])) {
    $kd = "SELECT max(idbarang) as maxKode from $tabel";
    $char = "BRG";
    $kode = getKode($kd, $char);
    $sql = "INSERT INTO $tabel (`idbarang`, `namabarang`, `harga`,`hargamodal`, `jumlahtersedia`, `kategori`) VALUES ('$kode','$_POST[namabarang]','$_POST[harga]','$_POST[hargamodal]','$_POST[jumlahtersedia]','$_POST[kategori]')";
    $msg = "Barang";
    $scs = "../barang.php";
    $fld = "../barang.php";
    exc_create($sql, $msg, $scs, $fld);
}

if (isset($_POST['update'])) {
    $sql = "UPDATE $tabel SET `namabarang`='$_POST[namabarang]', `harga`='$_POST[harga]',`hargamodal`='$_POST[hargamodal]', `jumlahtersedia`='$_POST[jumlahtersedia]', `kategori`='$_POST[kategori]' WHERE `idbarang`='$_POST[idbarang]'";
    $msg = "Barang";
    $scs = "../barang.php";
    $fld = "../barang.php";
    exc_update($sql, $msg, $scs, $fld);
}

if (isset($_GET['del'])) {
    $sql = "DELETE from $tabel where idbarang='$_GET[id]'";
    $msg = "Barang";
    $scs = "../barang.php";
    $fld = "../barang.php";
    exc_delete($sql, $msg, $scs, $fld);
}
