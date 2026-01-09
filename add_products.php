<?php
    require 'connexion.php';
    $N=mysqli_real_escape_string($con, $_POST['name_p']);
    $DE=$_POST['description_p'];
    $up=$_POST['unit_price_p'];
    $st=$_POST['stock_p'];
    $ic=$_POST['id_category'];
    $i=$_POST['id_su'];
    $requete="INSERT INTO products(NAME_P,DESCRIPTION,unit_price,stock,id_c,id_supplier)VALUES('$N','$DE','$up','$st','$ic','$i')";
    $query=mysqli_query($con,$requete);
    if ($query) {
        header("Location:products.php"); 
        exit();
    } else {
        echo "Mistake : " . mysqli_error($con);
    }
?>
 