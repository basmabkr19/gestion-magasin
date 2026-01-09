<?php
  require 'connexion.php';
    $id=$_GET['id_supplier'];
    $N=$_GET['name_s'];
    $phone=$_GET['phone_s'];
    $email=$_GET['email_s'];
    $address=$_GET['address_s'];
    $city=$_GET['city_s'];
    $country=$_GET['country_s'];
    //echo $idd; exit;
      $s="UPDATE supplier SET SUPPLIER_NAME='$N',SUPPLIER_PHONE='$phone',EMAIL='$email',address='$address',city='$city',country='$country' WHERE id_supplier='$id'";
      $query=mysqli_query($con,$s);
      if ($query) {
          header("Location: supplier.php");
          exit();
      } else {
          echo "Mistake : " . mysqli_error($con);
      }
  
 ?>