<?php
require 'connexion.php';
$NS = mysqli_real_escape_string($con, $_POST['id_su']);
$id = mysqli_real_escape_string($con, $_POST['id_pr']);
$purchase_date = mysqli_real_escape_string($con, $_POST['purchase_date']);
$quantity = mysqli_real_escape_string($con, $_POST['quantity']);

echo "NS: $NS<br>";
echo "id: $id<br>";
echo "purchase_date: $purchase_date<br>";
echo "quantity: $quantity<br>";

// Vérification existence
$checkSupplier = mysqli_query($con, "SELECT * FROM supplier WHERE id_supplier = '$NS'");
$checkProduct = mysqli_query($con, "SELECT * FROM products WHERE id_product = '$id'");


if (mysqli_num_rows($checkSupplier) == 0 || mysqli_num_rows($checkProduct) == 0) {
    die("Erreur : Fournisseur ou produit introuvable.");
}

// Insertion
$sql = "INSERT INTO purchases (id_product, id_supplier, quantity, purchase_date) 
        VALUES ('$id', '$NS', '$quantity', '$purchase_date')";
mysqli_query($con, $sql);

// Mise à jour du stock
$updateStock = "UPDATE products SET stock = stock + $quantity WHERE id_product = '$id'";
mysqli_query($con, $updateStock);

// Redirection
header('Location: purchases.php');
exit();
?>