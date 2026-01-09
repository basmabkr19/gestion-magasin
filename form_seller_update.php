<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      require 'connexion.php';
      if(isset($_GET['id'])){
        $NE=$_GET['id'];
        $sql="SELECT * FROM seller WHERE id_seller='$NE' " ;
        $q=mysqli_query($con,$sql);
        $r=mysqli_fetch_assoc($q);
            $N=$r['SELLER_NAME'];
            $phone=$r['PHONE_SELLER'];
            $email=$r['EMAIL_SELLER'];
            $address=$r['ADDRESS_SELLER'];
      }
     ?> 
    <form method="GET" action="update_seller.php?<?php if(isset($_GET['id'])){echo "id_se=$NE";} ?>">
        <input type="hidden" name="id_se" value="<?php echo $_GET['id'];?>">
        <h4>UPDATE SELLER</h4>
        <hr>
        <div class="field">
            <div>
                <label>Id :</label>
                <input type="number"  value="<?php echo $NE; ?>"  placeholder="Enter Seller ID " title="Seller ID must be integer" value="<?php if(isset($_GET['id'])){echo $NE;}?>" disabled>
            </div>  
            <div>
                <label>Full name :</label>
                <input type="text" name='name_e' placeholder='Enter seller_name' title="Seller Name must do not exceed 30 characters,letters,numbers" maxlength="30" value="<?php if(isset($_GET['id'])){echo $N;}?>">
            </div> 
            <div>
                <label>Phone number :</label>
                <input type="tel" name='phone_e' placeholder='Enter seller_phone' title="Seller Phone must do not exceed 50 characters,letters,numbers" maxlength="50" value="<?php if(isset($_GET['id'])){echo $phone;}?>"> 
            </div>
             <div>
                <label>email :</label>
                <input type="email" name='email_e' placeholder='Enter seller_email' title='Seller email must do not exceed 50 characters,letters,numbers' maxlength='50' value="<?php if(isset($_GET['id'])){echo $email;}?>">
            </div>
             <div>
                <label>address :</label>
                <input type="text" name='address_e' placeholder='Enter seller_address' title='Seller address must do not exceed 50 characters,letters,numbers' maxlength='50' value="<?php if(isset($_GET['id'])){echo $address;}?>"> <br></br>
            </div>
            <input type='submit' value='Send'>
        </div>
    </form>
</body>
</html>
