<?php
  require 'connexion.php';
    $N=mysqli_real_escape_string($con, $_POST['name_cat']);
    $M=mysqli_real_escape_string($con, $_POST['des_cat']);
     $requete="INSERT INTO category(category_name,description)VALUES('$N','$M')";
     $query=mysqli_query($con,$requete);
     if ($query) {
      header("Location: category.php"); 
      exit();
  } else {
      echo "Mistake : " . mysqli_error($con);
  }
 ?>