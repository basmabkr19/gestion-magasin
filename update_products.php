<?php
require 'connexion.php';
  $N=$_GET['name_p'];
  $DE=$_GET['description_p'];
  $up=$_GET['unit_price_p'];
  $st=$_GET['stock_p'];
  $ic=$_GET['id_category'];
  $i=$_GET['id_su'];
  $d=$_GET['id_product'];
  //echo $idd; exit;
    $s="UPDATE products SET NAME_P='$N',DESCRIPTION='$DE',unit_price='$up',stock='$st',id_c='$ic',id_supplier='$i' WHERE id_product='$d'";
    $query=mysqli_query($con,$s);
    if ($query) {
        header("Location:products.php");
        exit();
    } else {
        echo "Mistake : " . mysqli_error($con);
    }
 ?>
 