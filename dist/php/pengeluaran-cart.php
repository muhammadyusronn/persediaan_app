<?php
if (isset($_POST['order'])) {
    if (isset($_SESSION["keranjang_keluar"])) {
        $item_array_id = array_column($_SESSION["keranjang_keluar"], "idbarang");
        if (!in_array($_POST['idbarang'], $item_array_id)) {
            $count = count($_SESSION["keranjang_keluar"]);
            $item_array = array(
                "idbarang" => $_POST['idbarang'],
                "namabarang" => $_POST['namabarang'],
                "hargabarang" => $_POST['hargabarang'],
                "jumlahkeluar" => $_POST['jumlahkeluar'],
            );
            $_SESSION["keranjang_keluar"][$count] = $item_array;
            echo "<script>window.location='barang-keluar-add.php'</script>";
        } else {
            echo "<script>window.location='barang-keluar-add.php'</script>";
        }
    } else {
        $item_array = array(
            "idbarang" => $_POST['idbarang'],
            "namabarang" => $_POST['namabarang'],
            "hargabarang" => $_POST['hargabarang'],
            "jumlahkeluar" => $_POST['jumlahkeluar'],
        );
        $_SESSION["keranjang_keluar"][0] = $item_array;
        echo "<script>window.location='barang-keluar-add.php'</script>";
    }
} else if (isset($_GET['action']) && ($_GET['action'] == 'delete')) {
    if (isset($_SESSION['keranjang_keluar'])) {
        foreach ($_SESSION["keranjang_keluar"] as $keys => $values) {
            if ($values["idbarang"] == $_GET["id"]) {
                unset($_SESSION["keranjang_keluar"][$keys]);
                echo "<script>window.location='barang-keluar-add.php'</script>";
            }
        }
    }
} else if (isset($_GET['cancel']) && $_GET['cancel'] == 'true') {
    unset($_SESSION["keranjang_keluar"]);
    echo "<script>window.location='barang-keluar-add.php'</script>";
}
