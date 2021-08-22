<?php
session_start();
include 'config.php';
include 'proses_data.php';
$nama_tabel = 'tb_barangmasuk';
$nama_tabeldetail = 'tb_detailmasuk';
$nama_tabelbarang = 'tb_barang';

if (isset($_POST['checkout'])) {
    $pj = $_SESSION['username'];
    $kd = "SELECT max(kodetransaksi) as maxKode from $nama_tabel";
    $char = "TMS";
    $kode = getKode($kd, $char);
    $sql = "INSERT INTO $nama_tabel (`kodetransaksi`, `nonota`, `namasuplier`, `tanggaltransaksi`, `penanggungjawab`, `totalbiaya`) VALUES ('$kode','$_POST[nonota]','$_POST[namasuplier]',NOW(),'$pj','$_POST[totalbiaya]')";
    $exc = mysqli_query($koneksi, $sql);
    // die();
    if ($exc) {
        foreach ($_SESSION["keranjang_masuk"] as $keys => $values) {
            $qwery = "INSERT INTO $nama_tabeldetail (`kodetransaksi`, `kodebarang`, `namabarang`, `jumlahbarang`, `hargabarang`) VALUES ('$kode','$values[idbarang]','$values[namabarang]','$values[jumlahmasuk]','$values[hargabarang]')";
            $ekc = mysqli_query($koneksi, $qwery);
        }
        if ($ekc) {
            foreach ($_SESSION["keranjang_masuk"] as $keys => $values) {
                $qwery = "UPDATE $nama_tabelbarang SET jumlahtersedia=jumlahtersedia+'$values[jumlahmasuk]' where idbarang='$values[idbarang]'";
                $eks = mysqli_query($koneksi, $qwery);
            }
            unset($_SESSION['keranjang_masuk']);
            echo "<script>alert('Data Transaksi Berhasil Disimpan!');window.location='../barang-masuk-detail.php?id=$kode'</script>";
        }
    } else {
        echo "<script>alert('Data Transaksi Gagal Disimpan!');window.location='../barang-masuk-add.php'</script>";
    }
}
