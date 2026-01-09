<?php
  require 'connexion.php';
  $NS1=$_GET['id'];
  $sql="DELETE FROM supplier WHERE id_supplier='$NS1'";
  $query=mysqli_query($con,$sql);
    if($query){
      header("Location:supplier.php");
    exit(); 
  } else {
      echo "Mistake: " . mysqli_error($con);
  }

?>