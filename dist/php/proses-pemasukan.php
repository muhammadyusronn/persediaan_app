<?php 
 if (isset($_POST['pesan'])) {
            if (isset($_SESSION["shoping_cart"])) {
              $item_array_id= array_column($_SESSION["shoping_cart"], "idbahan");
                if (!in_array($_POST['idbahan'], $item_array_id)) {
                    $count=count($_SESSION["shoping_cart"]);
                        $item_array = array(
                          "idbahan" => $_POST['idbahan'],
                          "namabahan" => $_POST['namabahan'],
                          "jumlahmasuk" => $_POST['jumlahmasuk'],
                        );
                        $_SESSION["shoping_cart"][$count]=$item_array;
                   
                }else{
                    header('Location = transaksai-bahan-masuk.php');
                }
            }else{
                    $item_array = array(
                      "idbahan" => $_POST['idbahan'],
                      "namabahan" => $_POST['namabahan'],
                      "jumlahmasuk" => $_POST['jumlahmasuk'],
                        );
                $_SESSION["shoping_cart"][0] = $item_array;

            }
}else if(isset($_GET['action'])&&($_GET['action']=='delete')){
     if (isset($_SESSION['shoping_cart'])) {
        foreach ($_SESSION["shoping_cart"] as $keys => $values) {
        if ($values["idbahan"]==$_GET["id"]) {
            unset($_SESSION["shoping_cart"][$keys]);
        }
    }
    }
    
}else if (isset($_GET['cancel'])&&$_GET['cancel']=='true') {
      unset($_SESSION["shoping_cart"]); 
      echo "<script>window.location='transaksi-bahan-masuk.php'</script>" ; 
                        
}
 ?>