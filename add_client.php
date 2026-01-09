<?php
  require 'connexion.php';
    $N=mysqli_real_escape_string($con, $_POST['name_c']);
    $email=$_POST['email_c'];
    $phone=$_POST['phone_c'];
    $address=$_POST['address_c'];
    $city=$_POST['city_c'];
    $country=$_POST['country_c'];
    $requete="INSERT INTO clients(FULL_NAME,EMAIL,phone_client,ADRESSE,city_client,country_client)
                          VALUES('$N','$email','$phone','$address','$city','$country')";
    $query=mysqli_query($con,$requete);
     if ($query) {
      header("Location: display.php"); 
      exit();
  } else {
      echo "Mistake : " . mysqli_error($con);
  }
 ?>
 
