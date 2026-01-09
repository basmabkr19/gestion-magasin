<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="add_supplier.php?">
        <h4>ADD SUPPLIER</h4>
        <hr>
        <div class="field"> 
            <div>
                <label>Full name :</label>
                <input type="text" name='name_s' placeholder='Enter supplier_name' title="Supllier Name must do not exceed 50 characters,letters,numbers" maxlength="50">
            </div> 
            <div>
                <label>Phone number :</label>
                <input type="tel" name='phone_s'  placeholder='Enter supplier_phone number' title="Supplier phone number must do not exceed 50 characters,letters,numbers" maxlength="50"> 
            </div>
            <div>
                <label>Email :</label>
                <input type="email" name='email_s' placeholder='Enter supplier_email' title='Supplier Email must do not exceed 50 characters,letters,numbers' maxlength="50" > 
            </div>
            <div>
                <label>address :</label>
                <input type="text" name='address_s' placeholder='Enter supplier_address' title='Supplier address consists of characters,letters,numbers' >  
            </div>
            <div>
                <label>city :</label>
                <input type="text" name='city_s'  placeholder='Enter supplier_city' title='Supplier city consists of characters,letters,numbers' maxlength="30">
            </div>
            <div>
                <label>country :</label>
                <input type="text" name='country_s' placeholder='Enter supplier_country' title='Supplier country consists of characters,letters,numbers' maxlength="30"><br></br>
            </div>
            <input type='submit' value='Send'>
        </div>
    </form>
</body>
</html>
