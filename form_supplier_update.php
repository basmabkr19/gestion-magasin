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
        $NS1=$_GET['id'];
        $sql="SELECT * FROM supplier WHERE id_supplier='$NS1' " ;
        $q=mysqli_query($con,$sql);
        $r=mysqli_fetch_assoc($q);
            $N=$r['SUPPLIER_NAME'];
            $phone=$r['SUPPLIER_PHONE'];
            $email=$r['EMAIL'];
            $address=$r['address'];
            $cc=$r['city'];
            $c=$r['country'];
      }
     ?> 
    <form method="GET" action="update_supplier.php?" <?php if(isset($_GET['id'])) ?>>
        <input type="hidden" name="id_supplier" value="<?php echo $NS1; ?>">
        <h4>UPDATE SUPPLIER</h4>
        <hr>
        <div class="field">
            <div>
                <label>Id :</label>
                <input type="number" value="<?php echo $NS1; ?>"  placeholder="Enter Supplier ID " title="Supplier ID must be integer"disabled>
            </div>  
            <label>Full name :</label>
                <input type="text" name='name_s' placeholder='Enter supplier_name' title="Supllier Name must do not exceed 50 characters,letters,numbers" maxlength="50" value="<?php if(isset($_GET['id'])){echo $N;}?>">
            </div> 
            <div>
                <label>Phone number :</label>
                <input type="tel" name='phone_s'  placeholder='Enter supplier_phone number' title="Supplier phone number must do not exceed 50 characters,letters,numbers" maxlength="50" value="<?php if(isset($_GET['id'])){echo $phone;}?>"> 
            </div>
            <div>
                <label>Email :</label>
                <input type="email" name='email_s' placeholder='Enter supplier_email' title='Supplier Email must do not exceed 50 characters,letters,numbers' maxlength="50" value="<?php if(isset($_GET['id'])){echo $email;}?>"> 
            </div>
            <div>
                <label>address :</label>
                <input type="text" name='address_s' placeholder='Enter supplier_address' title='Supplier address consists of characters,letters,numbers' value="<?php if(isset($_GET['id'])){echo $address;}?>">  
            </div>
            <div>
                <label>city :</label>
                <input type="text" name='city_s'  placeholder='Enter supplier_city' title='Supplier city consists of characters,letters,numbers' maxlength="30"value="<?php if(isset($_GET['id'])){echo $cc;}?>">
            </div>
            <div>
                <label>country :</label>
                <input type="text" name='country_s' placeholder='Enter supplier_country' title='Supplier country consists of characters,letters,numbers' maxlength="30"value="<?php if(isset($_GET['id'])){echo $c;}?>"><br></br>
            </div>
            <input type='submit' value='Send'>
        </div>
    </form>
</body>
</html>
