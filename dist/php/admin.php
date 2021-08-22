<?php
include 'proses_data.php';
$tabel = 'tb_admin';
if (isset($_POST['submit'])) {
    $pass = md5($_POST['password']);
    $sql = "INSERT INTO $tabel (`username`, `password`, `nama`, `alamat`, `nomorhp`, `level`) 
    VALUES ('$_POST[username]','$pass','$_POST[nama]','$_POST[alamat]','$_POST[nomorhp]','$_POST[level]')";
    $msg = "Admin";
    $scs = "../admin.php";
    $fld = "../admin.php";
    exc_create($sql, $msg, $scs, $fld);
}

if (isset($_POST['update'])) {
    if ($_POST['password'] == '') {
        $sql = "UPDATE $tabel SET `username`='$_POST[username]', `nama`='$_POST[nama]', `alamat`='$_POST[alamat]', `nomorhp`='$_POST[nomorhp]', `level`='$_POST[level]' where `username`='$_POST[username_lama]'";
    } else {
        $pass = md5($_POST['password']);
        $sql = "UPDATE $tabel SET `username`='$_POST[username]', `nama`='$_POST[nama]',`password`='$pass', `alamat`='$_POST[alamat]', `nomorhp`='$_POST[nomorhp]', `level`='$_POST[level]' where `username`='$_POST[username_lama]'";
    }
    $msg = "Admin";
    $scs = "../admin.php";
    $fld = "../admin.php";
    exc_update($sql, $msg, $scs, $fld);
}

if (isset($_GET['del'])) {
    $sql = "DELETE from $tabel where username='$_GET[id]'";
    $msg = "Admin";
    $scs = "../admin.php";
    $fld = "../admin.php";
    exc_delete($sql, $msg, $scs, $fld);
}
