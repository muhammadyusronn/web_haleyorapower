<?php 
 if (isset($_POST['pesan'])) {
            if (isset($_SESSION["pemasukan_cart"])) {
              $item_array_id= array_column($_SESSION["pemasukan_cart"], "kodebarang");
                if (!in_array($_POST['kodebarang'], $item_array_id)) {
                    $count=count($_SESSION["pemasukan_cart"]);
                        $item_array = array(
                          "kodebarang" => $_POST['kodebarang'],
                          "namabarang" => $_POST['namabarang'],
                          "jumlahorder" => $_POST['jumlahorder']
                        );
                        $_SESSION["pemasukan_cart"][$count]=$item_array;
                   
                }else{
                    header('Location = v_transaksi-barang.php');
                }
            }else{
                    $item_array = array(
                      "kodebarang" => $_POST['kodebarang'],
                      "namabarang" => $_POST['namabarang'],
                      "jumlahorder" => $_POST['jumlahorder'],
                        );
                $_SESSION["pemasukan_cart"][0] = $item_array;

            }
}else if(isset($_GET['action'])&&($_GET['action']=='delete')){
     if (isset($_SESSION['pemasukan_cart'])) {
        foreach ($_SESSION["pemasukan_cart"] as $keys => $values) {
        if ($values["kodebarang"]==$_GET["id"]) {
            unset($_SESSION["pemasukan_cart"][$keys]);
        }
    }
    //header('Location = v_transaksi-barang.php');
    }
    
}else if (isset($_GET['cancel'])&&$_GET['cancel']=='true') {
                        unset($_SESSION["pemasukan_cart"]);    
}
 ?>