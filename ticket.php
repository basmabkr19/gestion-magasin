<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Sale Ticket</title>
  <style>
    body {
      background: #fdf6f9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 40px;
      display: flex;
      justify-content: center;
    }

    .receipt {
      background: #ffffff;
      width: 700px;
      padding: 35px 50px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border-top: 8px solid rgb(180, 209, 219);
    }

    .receipt h2 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 30px;
      color: #333;
    }

    .receipt h3 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 20px;
      color: #666;
    }

    .receipt .header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      font-size: 16px;
      color: #444;
    }

    .receipt table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .receipt table th,
    .receipt table td {
      border: 1px solid rgb(207, 158, 179);
      padding: 10px;
      text-align: left;
      font-size: 16px;
    }

    .receipt table th {
      background-color: white;
      color: #333;
    }

    .receipt .total {
      text-align: right;
      font-size: 20px;
      font-weight: bold;
      color: black;
    }

    .thank-you {
      text-align: center;
      margin-top: 30px;
      font-size: 16px;
      color: #555;
    }

    @media print {
      button {
        display: none;
      }
    }
  </style>
</head>
<body>

<?php
require 'connexion.php';

// 🔹 Vérifie l'ID de la vente dans l'URL
$id_sale = isset($_GET['id_sale']) ? intval($_GET['id_sale']) : 0;
if ($id_sale == 0) {
    die("Erreur : identifiant de vente non spécifié dans l'URL");
}

// 🔹 Récupère les infos de la vente principale
$sale_query = "SELECT * FROM sales WHERE id_sale = $id_sale";
$sale_result = mysqli_query($con, $sale_query);
$sale = mysqli_fetch_assoc($sale_result);

if (!$sale) {
    die("Erreur : vente avec ID $id_sale introuvable.");
}

// 🔹 Infos client et vendeur
$client = $sale['id_client'];
$seller = $sale['id_seller'];
$date = $sale['sale_date'];

$client_query = "SELECT * FROM clients WHERE id_client = $client";
$client_result = mysqli_query($con, $client_query);
$client = mysqli_fetch_assoc($client_result);
$FULL_NAME = $client['FULL_NAME'];

$seller_query = "SELECT * FROM seller WHERE id_seller = $seller";
$seller_result = mysqli_query($con, $seller_query);
$seller = mysqli_fetch_assoc($seller_result);
$SELLER_NAME = $seller['SELLER_NAME'];

if (!$sale) {
    die("Erreur : vente avec ID $id_sale introuvable.");
}

?>

<div class="receipt">
    <h2>MY STORE</h2>
    <h3>Sale Ticket</h3>

    <div class="header">
        <div><strong>N° Sale :</strong> <?= $id_sale ?></div>
        <div><strong>Date :</strong> <?= $date ?></div>
    </div>
    <div class="header">
        <div><strong>Client :</strong> <?= $FULL_NAME ?></div>
        <div><strong>Seller :</strong> <?= $SELLER_NAME ?></div>
    </div>

    <!-- 🔹 Tableau des articles -->
    <table>
        <thead>
            <tr>
                <th>Products</th>
                <th>Quantity</th>
                <th>Unit Urice </th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $details_query = " SELECT sd.id_sale, p.NAME_P, sd.quantity_detail, p.unit_price 
                FROM sale_details sd 
                JOIN products p ON sd.id_product= p.id_product 
                WHERE sd.id_sale = $id_sale
            ";
            $details_result = mysqli_query($con, $details_query);
            $grand_total = 0;

            while ($row = mysqli_fetch_assoc($details_result)) {
                $product = $row['NAME_P'];
                $qty = $row['quantity_detail'];
                $price = $row['unit_price'];
                $line_total = $qty * $price;
                $grand_total += $line_total;

                echo "<tr>
                        <td>$product</td>
                        <td>$qty</td>
                        <td>{$price} DA</td>
                        <td>{$line_total} DA</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="total">Total to pay : <?= $grand_total ?> DA</div>

    <div class="thank-you">
        thank you for your purchase !<br>
        +21356143289<br>
        contactstore@gmail.com
    </div>
</div>

<!-- 🔹 Bouton imprimer -->
<div style="text-align: center; margin-top: 30px;">
    <button onclick="window.print()" style="padding: 10px 20px; font-size: 16px;">
        🖨️ Print the ticket
    </button>
</div>


</body>
</html>   




  


