<?php
require 'connexion.php';
$purchase_id = $supplier_id = $product_id = $purchase_date = "";

if (isset($_GET['id_purchase'])) {
$purchase_id = $_GET['id_purchase'];
    $sql = "SELECT * FROM purchases WHERE id_purchase = '$purchase_id'";
    $res = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($res)) {	
        $supplier_id = $row['id_supplier'];
        $product_id = $row['id_product'];
        $purchase_date = $row['purchase_date'];
        $quantity =  $row['quantity'];
 
        $updateStock = "UPDATE products SET stock = stock - $quantity WHERE id_product = '$product_id'";
        mysqli_query($con, $updateStock);

        $delete = "DELETE FROM purchases WHERE id_purchase = '$purchase_id'";
        mysqli_query($con, $delete);

        header("Location:purchases.php");
        exit();
    } else {
        echo "Achat introuvable ou déjà supprimé.";
    }
}

?>