<?php
session_start();
include 'config.php';
include 'proses_data.php';
$nama_tabel = 'tb_barangkeluar';
$nama_tabeldetail = 'tb_detailkeluar';
$nama_tabelbarang = 'tb_barang';

if (isset($_POST['checkout'])) {
    $pj = $_SESSION['username'];
    $kd = "SELECT max(kodetransaksi) as maxKode from $nama_tabel";
    $char = "TKL";
    $kode = getKode($kd, $char);
    $sql = "INSERT INTO $nama_tabel (`kodetransaksi`, `tanggaltransaksi`, `konsumen`, `kontak`, `totalbelanja`, `penanggungjawab`) VALUES ('$kode','$_POST[tanggaltransaksi]','$_POST[konsumen]','$_POST[kontak]','$_POST[totalbelanja]','$pj')";
    $exc = mysqli_query($koneksi, $sql);
    if ($exc) {
        foreach ($_SESSION["keranjang_keluar"] as $keys => $values) {
            $qwery = "INSERT INTO $nama_tabeldetail (`kodetransaksi`, `kodebarang`, `namabarang`, `hargabarang`, `jumlahbarang`) VALUES ('$kode','$values[idbarang]','$values[namabarang]','$values[hargabarang]','$values[jumlahkeluar]')";
            $ekc = mysqli_query($koneksi, $qwery);
        }
        if ($ekc) {
            foreach ($_SESSION["keranjang_keluar"] as $keys => $values) {
                $qwery = "UPDATE $nama_tabelbarang SET jumlahtersedia=jumlahtersedia-'$values[jumlahkeluar]' where idbarang='$values[idbarang]'";
                $eks = mysqli_query($koneksi, $qwery);
            }
            unset($_SESSION['keranjang_keluar']);
            echo "<script>alert('Data Transaksi Berhasil Disimpan!');window.location='../barang-keluar-detail.php?id=$kode'</script>";
        }
    } else {
        echo "<script>alert('Data Transaksi Gagal Disimpan!');window.location='../barang-keluar-add.php'</script>";
    }
}
