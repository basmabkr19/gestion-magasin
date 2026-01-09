<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      require 'connexion.php';
      if(isset($_GET['id'])){
        $NC=$_GET['id'];
        $sql="SELECT * FROM clients WHERE id_client='$NC' " ;
        $q=mysqli_query($con,$sql);
        $r=mysqli_fetch_assoc($q);
            $N=$r['FULL_NAME'];
            $email=$r['EMAIL'];
            $phone=$r['phone_client'];
            $address=$r['ADRESSE'];
            $cc=$r['city_client'];
            $c=$r['country_client'];
      }
     ?> 
    <form method="GET" action="update_client.php?<?php if(isset($_GET['id'])){echo "id=$NC";} ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <h4>UPDATE CLIENT</h4>
        <hr>
        <div class="field">
            <div>
                <label>Id :</label>
                <input type="number" value="<?php echo $NC; ?>"  placeholder="Client ID " title="Client ID must be integer"maxlength="10" disabled>
            </div>  
            <div>
                <label>Full name :</label>
                <input type="text" name='name_c' placeholder='Enter client_name' title="Client Name must do not exceed 50 characters,letters,numbers" maxlength="50" value="<?php if(isset($_GET['id'])){echo $N;}?>">
            </div> 
            <div>
                <label>Email :</label>
                <input type="email" name='email_c' placeholder='Enter client_email' title="Client Email must do not exceed 30 characters,letters,numbers" maxlength="30" value="<?php if(isset($_GET['id'])){echo $email;}?>"> 
            </div>
            <div>
                <label>Phone number :</label>
                <input type="tel" name='phone_c' placeholder='Enter client_phone number' title="Client phone number must do not exceed 15 characters,letters,numbers" maxlength="15" value="<?php if(isset($_GET['id'])){echo $phone;}?>">  
            </div>
            <div>
              <label>Address :</label>
              <input type="text" name='address_c' placeholder='Enter client_address' placeholder='Enter client_phone number' title='Client phone number must do not exceed 100 characters,letters,numbers' maxlength='100' value="<?php if(isset($_GET['id'])){echo $address;}?>"> 
            </div> 
             <div>
              <label>city :</label>
              <input type="text" name='city_c' placeholder='Enter client_city' placeholder='Enter client_city' title='Client city must do not exceed 30 characters,letters,numbers' maxlength='30' value="<?php if(isset($_GET['id'])){echo $cc;}?>"> 
            </div> 
             <div>
              <label>country :</label>
              <input type="text" name='country_c' placeholder='Enter client_country' placeholder='Enter client_country' title='Client country must do not exceed 30 characters,letters,numbers' maxlength='30' value="<?php if(isset($_GET['id'])){echo $c;}?>"> <br></br>
            </div> 
            <input type='submit' value='Send'>
        </div>
    </form>
</body>
</html>