<?php
  require 'connexion.php';
    $N=mysqli_real_escape_string($con, $_POST['name_e']);
    $phone=$_POST['phone_e'];
    $email=$_POST['email_e'];
    $address=$_POST['address_e'];
    $requete="INSERT INTO seller(SELLER_NAME,PHONE_SELLER,EMAIL_SELLER,ADDRESS_SELLER)
                          VALUES('$N','$phone','$email','$address')";
    $query=mysqli_query($con,$requete);
     if ($query) {
      header("Location: seller.php"); 
      exit();
  } else {
      echo "Mistake : " . mysqli_error($con);
  }
 ?>