<?php
  require 'connexion.php';
  if(isset($_GET['id_category'])){
    $N=$_GET['name_cat'];
    $M=$_GET['des_cat'];
    $d=$_GET['id_category'];
      $s="UPDATE category SET category_name='$N',description='$M' WHERE id_c='$d'";
      $query=mysqli_query($con,$s);
      if ($query) {
          header("Location: category.php");
          exit();
      } else {
          echo "Mistake : " . mysqli_error($con);
      }
  }
 ?>