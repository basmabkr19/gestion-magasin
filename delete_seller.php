<?php
  require 'connexion.php';
  $NE=$_GET['id'];
  $sql="DELETE FROM seller WHERE id_seller ='$NE'";
  $query=mysqli_query($con,$sql);
  if($query){
    header("Location:seller.php");
  exit(); 
} else {
    echo "Mistake: " . mysqli_error($con);
}
  
?>