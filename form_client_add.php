<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="add_client.php?">
        <h4>ADD CLIENT</h4>
        <hr>
        <div class="field">
            <div>
                <label>Full name :</label>
                <input type="text" name='name_c' placeholder='Enter client_name' title="Client Name must do not exceed 50 characters,letters,numbers" maxlength="50">
            </div> 
            <div>
                <label>Email :</label>
                <input type="email" name='email_c' placeholder='Enter client_email' title="Client Email must do not exceed 30 characters,letters,numbers" maxlength="30"> 
            </div>
            <div>
                <label>Phone number :</label>
                <input type="tel" name='phone_c' placeholder='Enter client_phone number' title="Client phone number must do not exceed 15 characters,letters,numbers" maxlength="15">  
            </div>
            <div>
              <label>Address :</label>
              <input type="text" name='address_c' placeholder='Enter client_address' placeholder='Enter client_phone number' title='Client phone number must do not exceed 100 characters,letters,numbers' maxlength='100'> 
            </div> 
             <div>
              <label>city :</label>
              <input type="text" name='city_c' placeholder='Enter client_city' placeholder='Enter client_city' title='Client city must do not exceed 30 characters,letters,numbers' maxlength='30'> 
            </div> 
             <div>
              <label>country :</label>
              <input type="text" name='country_c' placeholder='Enter client_country' placeholder='Enter client_country' title='Client country must do not exceed 30 characters,letters,numbers' maxlength='30'> <br></br>
            </div> 
            <input type='submit' value='Send'>
        </div>
    </form>
</body>
</html>