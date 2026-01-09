<?php
  require 'connexion.php';
  $d=$_GET['id'];
  $sql="DELETE FROM category WHERE id_c ='$d'";
  $query=mysqli_query($con,$sql);
  if($query){
    header("Location:category.php");
  exit(); 
} else {
    echo "Mistake: " . mysqli_error($con);
}
  
?>