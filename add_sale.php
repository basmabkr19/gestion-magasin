<?php
$con = mysqli_connect("localhost", "root", "", "gestion_stock");
if (!$con) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
if (isset($_POST['Terminer']))
{
    header("Location: sales.php");
    exit;
}else if (isset($_POST['recalculer']))
{

    // Vérifier que toutes les données nécessaires sont envoyées
    if (!isset($_POST['id_sale'],$_POST['client_id'], $_POST['seller_id'], $_POST['date_vente'], $_POST['product_id'], $_POST['quantity'])) {
        die("Erreur : données du formulaire manquantes.");
    }
    $id_sale = $_POST['id_sale'];
    $client = $_POST['client_id'];
    $seller = $_POST['seller_id'];
    $date = $_POST['date_vente'];
    $product = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Vérification que le vendeur et client existent
    $check_seller = mysqli_query($con, "SELECT * FROM seller WHERE id_seller = '$seller'");
    $check_client = mysqli_query($con, "SELECT * FROM clients WHERE id_client = '$client'");
    if (mysqli_num_rows($check_seller) == 0 || mysqli_num_rows($check_client) == 0) {
        die("Erreur : client ou vendeur inexistant !");
    }

    // Vérification du stock
    $result = mysqli_query($con, "SELECT * FROM products WHERE id_product = '$product'");
    $row = mysqli_fetch_assoc($result);
    $price = $row['unit_price'];
    $NAME_P = $row['NAME_P'];
    if ($row['stock'] < $quantity) 
    {
        die("Erreur : stock insuffisant pour le produit $NAME_P");
    }

    if ($_POST['id_sale']==0)
    {
        $total_price = $total_price + ($quantity * $price) ;
        // Insertion dans sales
        $insert_sale = "INSERT INTO sales (id_client, id_seller, sale_date, total_price) 
                        VALUES ('$client', '$seller', '$date', '$total_price')";
        if (!mysqli_query($con, $insert_sale)) {
            die("Erreur insertion vente : " . mysqli_error($con));
        }

        $result0 = mysqli_query($con, "SELECT * FROM sales WHERE id_client = '$client' and id_seller = '$seller' and sale_date = '$date'");
        $row0 = mysqli_fetch_assoc($result0);
        $id_sale = $row0['id_sale'];
    }else
    {
        $result0 = mysqli_query($con, "SELECT SUM(quantity_detail*price) AS prix FROM sale_details WHERE id_sale='$id_sale'");
        $row0 = mysqli_fetch_assoc($result0);
        $total_price = $row0['prix'];
        $total_price = $total_price + ($quantity * $price);

        // Mise a jour dans sales
        $update_sale = "UPDATE sales SET total_price='$total_price' WHERE id_sale='$id_sale'";
        if (!mysqli_query($con, $update_sale)) {
            die("Erreur Mettre à jour des ventes : " . mysqli_error($con));
        }
    }
    

    // Insertion du détail
    $insert_detail = "INSERT INTO sale_details (id_sale, id_product, quantity_detail, price)
                        VALUES ('$id_sale', '$product', '$quantity', '$price')";
    if (!mysqli_query($con, $insert_detail)) {
        die("Erreur détail vente : " . mysqli_error($con));
    }

    // Mise à jour du stock
    $new_stock = $row['stock'] - $quantity;
    mysqli_query($con, "UPDATE products SET stock = $new_stock WHERE id_product = '$product'");


    header("Location: form_sale_add.php?id_sale=$id_sale");
    exit;
    
}
else if (isset($_POST['ajouter']))
{
    // Vérifier que toutes les données nécessaires sont envoyées
    if (!isset($_POST['client_id'], $_POST['seller_id'], $_POST['date_vente'], $_POST['product_id'], $_POST['quantity'])) {
        die("Erreur : données du formulaire manquantes.");
    }

    $client = $_POST['client_id'];
    $seller = $_POST['seller_id'];
    $date = $_POST['date_vente'];
    $product = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $id_sale = $_POST['id_sale'];

    // Vérification que le vendeur et client existent
    $check_seller = mysqli_query($con, "SELECT * FROM seller WHERE id_seller = '$seller'");
    $check_client = mysqli_query($con, "SELECT * FROM clients WHERE id_client = '$client'");
    if (mysqli_num_rows($check_seller) == 0 || mysqli_num_rows($check_client) == 0) {
        die("Erreur : client ou vendeur inexistant !");
    }

    // Vérification du stock
    $result = mysqli_query($con, "SELECT * FROM products WHERE id_product = '$product'");
    $row = mysqli_fetch_assoc($result);
    $price = $row['unit_price'];
    $NAME_P = $row['NAME_P'];
    if ($row['stock'] < $quantity) 
    {
        die("Erreur : stock insuffisant pour le produit $NAME_P");
    }

    if ($id_sale==0 || $id_sale=="")
    {
        $total_price = $quantity * $price ;
        // Insertion dans sales
        $insert_sale = "INSERT INTO sales (id_client, id_seller, sale_date, total_price) 
                        VALUES ('$client', '$seller', '$date', '$total_price')";
        if (!mysqli_query($con, $insert_sale)) {
            die("Erreur insertion vente : " . mysqli_error($con));
        }

        $result0 = mysqli_query($con, "SELECT * FROM sales WHERE id_client = '$client' and id_seller = '$seller' and sale_date = '$date'");
        $row0 = mysqli_fetch_assoc($result0);
        $id_sale = $row0['id_sale'];
    }else
    {

        $result0 = mysqli_query($con, "SELECT SUM(quantity_detail*price) AS prix FROM sale_details WHERE id_sale='$id_sale'");
        $row0 = mysqli_fetch_assoc($result0);
        $total_price = $row0['prix'];
        $total_price = $total_price + ($quantity * $price);

        // Mise a jour dans sales
        $update_sale = "UPDATE sales SET total_price='$total_price' WHERE id_sale='$id_sale'";
        if (!mysqli_query($con, $update_sale)) {
            die("Erreur Mettre à jour des ventes : " . mysqli_error($con));
        }
    }   

    // Insertion du détail
    $insert_detail = "INSERT INTO sale_details (id_sale, id_product, quantity_detail, price)
                        VALUES ('$id_sale', '$product', '$quantity', '$price')";
    if (!mysqli_query($con, $insert_detail)) {
        die("Erreur détail vente : " . mysqli_error($con));
    }

    // Mise à jour du stock
    $new_stock = $row['stock'] - $quantity;
    mysqli_query($con, "UPDATE products SET stock = $new_stock WHERE id_product = '$product'");

    header("Location: ticket.php?id_sale=$id_sale&id_client=$client&id_seller=$seller&sale_date=$date&id_product=$product");
    exit;
}

mysqli_close($con);
?>
