<?php
session_start();
error_reporting(0);
ob_start();

include 'php/function.php';
include 'php/config.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Bagian halaman HTML yang akan konvert -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>CETAK TRANSAKSI</title>
  <style type="text/css">
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding-left: 10px;
      padding-left: 10px;
    }
  </style>
</head>

<body>
  <h3 align=center><u>BUKTI TRANSAKSI BARANG MASUK</u></h3>
  <?php
  $q = "SELECT * from tb_barangmasuk where kodetransaksi='$_GET[id]'";
  // echo $q;
  // die();
  $sql = mysqli_query($koneksi, $q);
  while ($data = mysqli_fetch_array($sql)) { ?>
    <table class="table" width="100" % style="width:210mm" align="left" border="0">
      <tr>
        <th width="130" height="25" align="left">Kode Transaksi </th>
        <th width="20" height="25" align="left">:</th>
        <th width="400" height="25" align="left"><?php echo $data['kodetransaksi']; ?></th>
      </tr>
      <tr>
        <th width="130" height="25" align="left">Tanggal Transaksi</th>
        <th width="20" height="25" align="left">:</th>
        <th width="400" height="25" align="left"><?php echo TanggalIndo($data['tanggaltransaksi']); ?></th>
      </tr>
      <tr>
        <th width="130" height="25" align="left">Nomor Nota </th>
        <th width="20" height="25" align="left">:</th>
        <th width="400" height="25" align="left"><?php echo $data['nonota']; ?></th>
      </tr>
      <tr>
        <th width="130" height="25" align="left">Nama Supplier </th>
        <th width="20" height="25" align="left">:</th>
        <th width="400" height="25" align="left"><?php echo $data['namasuplier']; ?></th>
      </tr>
      <tr>
        <th width="130" height="25" align="left">Total Biaya</th>
        <th width="20" height="25" align="left">:</th>
        <th width="400" height="25" align="left"><?php echo rupiah($data['totalbiaya']); ?></th>
      </tr>
      <tr>
        <th width="130" height="25" align="left">Penanggung Jawab</th>
        <th width="20" height="25" align="left">:</th>
        <th width="400" height="25" align="left"><?php echo $data['penanggungjawab']; ?></th>
      </tr>
    </table>
  <?php }
  ?>
  <p>Detail Transaksi</p>
  <table class="table" width="100" % style="width:210mm" align="center" border="1">
    <tr align="center">
      <th style="width: 20px">#</th>
      <th style="width: 100px">Kode Barang</th>
      <th style="width: 100px">Nama Barang</th>
      <th style="width: 100px">Jumlah Barang</th>
      <th style="width: 100px">Harga Barang</th>
    </tr>
    <?php
    $nox = 1;
    $sql1 = "SELECT * from tb_detailmasuk where kodetransaksi ='$_GET[id]'";
    $gett = mysqli_query($koneksi, $sql1);
    while ($values = mysqli_fetch_array($gett)) {
    ?>
      <tr align="center">
        <th style="width: 20px"><?php echo $nox++; ?></th>
        <th style="width: 100px"><?php echo $values['kodebarang']; ?></th>
        <th style="width: 100px"><?php echo $values['namabarang']; ?></th>
        <th style="width: 100px"><?php echo $values['jumlahbarang']; ?></th>
        <th style="width: 100px"><?php echo rupiah($values['hargabarang']); ?></th>
      </tr>
    <?php
    }
    ?>
  </table>
  <br>
  <br>
  <table border="0">
    <tr>
      <td style="width: 30%" colspan="3">Palembang, <?php echo TanggalIndo(date('Y-m-d')); ?></td>
    </tr>
    <tr>
      <td style="width: 40%" colspan="2">Mengetahui,</td>
    </tr>
    <tr>
      <td style="width: 30%;height: 90px"></td>
    </tr>
    <tr>
      <td style="width: 30%"></td>
    </tr>
  </table>
</body>

</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename = "Bukti Bahan Masuk " . $_GET['id'] . "__" . date('d-m-Y') . ".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">' . ($content) . '</page>';
require_once(dirname(__FILE__) . '/html2pdf/html2pdf.class.php');
try {
  $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'ISO-8859-15', array(18, 15, 20, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
} catch (HTML2PDF_exception $e) {
  echo $e;
}
?>