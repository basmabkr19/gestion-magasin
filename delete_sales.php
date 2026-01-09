<?php
  require 'connexion.php';
  $NS=$_GET['id'];
  $sql="DELETE FROM sales WHERE id_sale='$NS'";
  $query=mysqli_query($con,$sql);
  if($query){
    header("Location:display.php");
  exit(); 
} else {
    echo "Mistake: " . mysqli_error($con);
}
?>