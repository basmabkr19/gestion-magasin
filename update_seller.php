<?php
  require 'connexion.php';
    $N=$_GET['name_e'];
    $phone=$_GET['phone_e'];
    $email=$_GET['email_e'];
    $address=$_GET['address_e'];
    $d=$_GET['id_se'];
      $s="UPDATE seller SET SELLER_NAME='$N',PHONE_SELLER='$phone',EMAIL_SELLER='$email',ADDRESS_SELLER='$address' WHERE id_seller='$d'";
      $query=mysqli_query($con,$s);
      if ($query) {
          header("Location: seller.php");
          exit();
      } else {
          echo "Mistake : " . mysqli_error($con);
      }
      

 ?>