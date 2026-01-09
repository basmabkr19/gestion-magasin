<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Déconnexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e1f2ffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .message-box {
            background-color:rgb(255, 255, 255);
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .message-box h2 {
            color: rgb(31, 5, 33);
            margin-bottom: 30px;
        }
        .btn-login {
            background-color: #e1f2ffff;
            color: black;
            border-color: #c4e3faff;
            padding: 20px 20px;
            border-radius: 8px;
            text-decoration: none;
        }
        .btn-login:hover {
            background-color: #edf5fcff;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2> Logout successful ✅</h2>
        <a href="index.html" class="btn-login">Return to login page</a>
    </div>
</body>
</html>