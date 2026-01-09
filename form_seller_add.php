<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <form method="POST" action="add_seller.php?">
        <h4>ADD SELLER</h4>
        <hr>
        <div class="field">  
            <div>
                <label>Full name :</label>
                <input type="text" name='name_e' placeholder='Enter seller_name' title="Seller Name must do not exceed 30 characters,letters,numbers" maxlength="30">
            </div> 
            <div>
                <label>Phone number :</label>
                <input type="tel" name='phone_e' placeholder='Enter seller_phone' title="Seller Phone must do not exceed 50 characters,letters,numbers" maxlength="50"> 
            </div>
             <div>
                <label>email :</label>
                <input type="email" name='email_e' placeholder='Enter seller_email' title='Seller email must do not exceed 50 characters,letters,numbers' maxlength='50'> 
            </div>
             <div>
                <label>address :</label>
                <input type="text" name='address_e' placeholder='Enter seller_address' title='Seller address must do not exceed 50 characters,letters,numbers' maxlength='50'> <br></br>
            </div>
            <input type='submit' value='Send'>
        </div>
    </form>
</body>
</html>
