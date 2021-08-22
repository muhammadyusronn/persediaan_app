<?php
if (isset($_POST['order'])) {
    if (isset($_SESSION["keranjang_masuk"])) {
        $item_array_id = array_column($_SESSION["keranjang_masuk"], "idbarang");
        if (!in_array($_POST['idbarang'], $item_array_id)) {
            $count = count($_SESSION["keranjang_masuk"]);
            $item_array = array(
                "idbarang" => $_POST['idbarang'],
                "namabarang" => $_POST['namabarang'],
                "hargabarang" => $_POST['hargamodal'],
                "jumlahmasuk" => $_POST['jumlahmasuk'],
            );
            $_SESSION["keranjang_masuk"][$count] = $item_array;
            echo "<script>window.location='barang-masuk-add.php'</script>";
        } else {
            echo "<script>window.location='barang-masuk-add.php'</script>";
        }
    } else {
        $item_array = array(
            "idbarang" => $_POST['idbarang'],
            "namabarang" => $_POST['namabarang'],
            "hargabarang" => $_POST['hargamodal'],
            "jumlahmasuk" => $_POST['jumlahmasuk'],
        );
        $_SESSION["keranjang_masuk"][0] = $item_array;
        echo "<script>window.location='barang-masuk-add.php'</script>";
    }
} else if (isset($_GET['action']) && ($_GET['action'] == 'delete')) {
    if (isset($_SESSION['keranjang_masuk'])) {
        foreach ($_SESSION["keranjang_masuk"] as $keys => $values) {
            if ($values["idbarang"] == $_GET["id"]) {
                unset($_SESSION["keranjang_masuk"][$keys]);
                echo "<script>window.location='barang-masuk-add.php'</script>";
            }
        }
    }
} else if (isset($_GET['cancel']) && $_GET['cancel'] == 'true') {
    unset($_SESSION["keranjang_masuk"]);
    echo "<script>window.location='barang-masuk-add.php'</script>";
}
