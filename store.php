<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Info</title>
    <link rel="stylesheet" href="style.css">
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background: linear-gradient(to right, #f2f9ffff, #f2f9ffff);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 20px;
}

.card {
    display: flex;
    flex-direction: column;
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

h4 {
    text-align: center;
    font-size: 24px;
    color: #090101;
    margin-bottom: 20px;
    font-weight: 500;
}

hr {
    margin: 15px 0;
    background-color: black;
    border: 0;
    height: 1px;
}

.info {
    width: 100%;
    margin-bottom: 15px;
}

.info label {
    margin-bottom: 8px;
    font-size: 14px;
    color: #0c0101;
    font-weight: 500;
}

.info input {
    width: 100%;
    padding: 10px;
    border: 1px solid #cececeff;
    border-radius: 8px;
    font-size: 16px;
    color: #555;
    background-color: #eef8ffff;
    transition: all 0.3s ease;
}

.info input:focus {
    border-color: #82befeff;
    background-color: #f1f8ff;
    outline: none;
}

.info input[type="button"] {
    margin-top: 15px;
    background-color: #4e9ef1;
    color:#4e9ef1;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 30px;
    transition: background-color 0.3s ease;
}

.info input[type="button"]:hover {
    background-color: #3578e5;
}

.info input[type="button"]:active {
    background-color: #0067f0;
}

   
    </style>
</head>
<body>
    <?php
        require 'connexion.php';
        $sql = "SELECT * FROM store LIMIT 1";
        $q = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($q);
        
        $N = $r['name_store'];
        $de = $r['description'];
        $phone = $r['phone_number']; 
        $email = $r['email']; 
        $location = $r['location'];
    ?> 

    <div class="card">
        <h4>Store Informations</h4>
        
        <div class="info">

            <label>Name :</label>
            <input type="text" value="<?php echo $N; ?>" readonly>

            <label>Description :</label>
            <input type="text" value="<?php echo $de; ?>" readonly>

            <label>Phone number :</label>
            <input type="tel" value="<?php echo $phone; ?>" readonly>

            <label>Email :</label>
            <input type="email" value="<?php echo $email; ?>" readonly>

            <label>location :</label>
            <input type="text" value="<?php echo $location; ?>" readonly>
        </div>
    </div>
</body>
</html>