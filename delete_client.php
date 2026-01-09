
<?php
  require 'connexion.php';
  $NC=$_GET['id'];
  $sql="DELETE FROM clients WHERE id_client='$NC'";
  $query=mysqli_query($con,$sql);
  if($query){
    header("Location:display.php");
  exit(); 
} else {
    echo "Mistake: " . mysqli_error($con);
}
?>
