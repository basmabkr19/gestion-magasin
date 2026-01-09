<?php
  require 'connexion.php';
  if(isset($_GET['id'])){
    $N=$_GET['name_c'];
    $email=$_GET['email_c'];
    $phone=$_GET['phone_c'];
    $address=$_GET['address_c'];
    $d=$_GET['id'];
    $city=$_GET['city_c'];
    $country=$_GET['country_c'];
    //echo $idd; exit;
      $s="UPDATE clients SET FULL_NAME='$N',EMAIL='$email',phone_client='$phone',ADRESSE='$address',city_client='$city',country_client='$country' WHERE id_client='$d'";
      $query=mysqli_query($con,$s);
      if ($query) {
          header("Location: display.php");
          exit();
      } else {
          echo "Mistake : " . mysqli_error($con);
      }
  }
 ?>
 
