<?php
include 'proses_data.php';
$nama_tabel = 't_akun';

if (isset($_POST['submit'])) {
	$pass = md5($_POST['password']);
	$sql = "INSERT INTO $nama_tabel (`email`, `password`, `nama`, `alamat`, `nomorhp`, `level`) VALUES ('$_POST[email]','$pass','$_POST[nama]','$_POST[alamat]','$_POST[nomorhp]','$_POST[level]')";
	// echo $sql;
	// die();
	$pesan = "User";
	$sks = "../data_admin.php";
	$ggl = "../input_admin.php";
	tambahdata($sql, $pesan, $sks, $ggl);
}

if (isset($_GET['del'])) {
	$sql = "DELETE from $nama_tabel where email='$_GET[id]'";
	$pesan = "User";
	$sks = "../data_admin.php";
	$ggl = "../data_admin.php";
	hapusdata($sql, $pesan, $sks, $ggl);
}

if (isset($_POST['update'])) {
	// echo "aa";
	// die();
	if (isset($_POST['cek_pass'])) {
		$sql = "UPDATE $nama_tabel SET `email`='$_POST[email]', `nama`='$_POST[nama]', `alamat`='$_POST[alamat]', `nomorhp`='$_POST[nomorhp]', `level`='$_POST[level]' where `email`='$_POST[email_lama]'";
	} else {
		$pass = md5($_POST['password']);
		$sql = "UPDATE $nama_tabel SET `email`='$_POST[email]', `nama`='$_POST[nama]', `alamat`='$_POST[alamat]', `nomorhp`='$_POST[nomorhp]',`password`='$pass', `level`='$_POST[level]' where `email`='$_POST[email_lama]'";
	}
	$pesan = "User";
	$sks = "../data_admin.php";
	$ggl = "../data_admin.php";
	editdata($sql, $pesan, $sks, $ggl);
}
