<?php
  require 'connexion.php';
    $N=mysqli_real_escape_string($con, $_POST['name_s']);
    $phone=$_POST['phone_s'];
    $email=$_POST['email_s'];
    $address=$_POST['address_s'];
    $city=$_POST['city_s'];
    $country=$_POST['country_s'];
    $requete="INSERT INTO supplier(SUPPLIER_NAME,SUPPLIER_PHONE,EMAIL,address,city,country)
                          VALUES('$N','$phone','$email','$address','$city','$country')";
    $query=mysqli_query($con,$requete);
     if ($query) {
      header("Location: supplier.php"); 
      exit();
  } else {
      echo "Mistake : " . mysqli_error($con);
  }
 ?>