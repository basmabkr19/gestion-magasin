<?php
  require 'connexion.php';
  $NP=$_GET['id_product'];
  $sql="DELETE FROM products WHERE id_product ='$NP'";
  $query=mysqli_query($con,$sql);
  if($query){
    header("Location:products.php");
  exit(); 
} else {
    echo "Mistake: ". mysqli_error($con);
}
?>