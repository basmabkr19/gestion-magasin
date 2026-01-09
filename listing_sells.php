<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>List of Sales</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

      body {
          background: linear-gradient(to right, #f2f9ffff, #bfe3fcff);
          font-family: 'Poppins', sans-serif;
          margin: 0;
          padding: 40px;
          color: #333;
      }

      h1 {
          font-size: 36px;
          text-align: center;
          margin-bottom: 30px;
          font-weight: 600;
          text-transform: capitalize;
          text-shadow: 1px 1px 2px rgba(200, 200, 200, 0.4);
          font-family: 'Playfair Display', serif;
          color: black;
          letter-spacing: 1px;
      }

      table {
          width: 95%;
          margin: auto;
          border-collapse: separate;
          border-spacing: 0;
          border-radius: 12px;
          overflow: hidden;
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
          background-color: #ffffff;
      }

      th {
          background-color: #e1f2ffff;
          color: black;
          font-size: 18px;
          font-weight: 600;
          padding: 15px;
          text-align: left;
          border-bottom: 2px solid #dbefff;
      }

      td {
          padding: 14px 20px;
          font-size: 16px;
          color: #333;
          transition: background-color 0.3s ease;
      }

      .new {
          font-family: 'Playfair Display', serif;
          font-size: 15px;
          color: black;
          letter-spacing: 1px;
      }

      .total {
          width: 95%;
          margin: 20px auto;
          font-size: 18px;
          font-weight: 600;
          color: #2c3e50;
          font-family: 'Poppins', sans-serif;
      }
    </style>
</head>
<body>
    <h1>List of Sales client makes</h1>

<?php
require 'connexion.php'; // Connexion à la base, doit définir $con

// Vérifier que la variable de connexion est bien définie
if (!isset($con)) {
    echo "<p style='text-align:center; color:red;'>Erreur de connexion à la base de données.</p>";
    exit;
}

// Récupération et sécurisation de l'id client (int)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id === 0) {
    echo "<p style='text-align:center; color:red;'>Erreur : aucun id client valide fourni.</p>";
    exit;
}

// Requête SQL sans quotes autour de $id
$requete = "SELECT * FROM sales WHERE id_client = $id";
$query = mysqli_query($con, $requete);

if (!$query) {
    echo "<p style='color:red; text-align:center;'>Erreur SQL : " . htmlspecialchars(mysqli_error($con)) . "</p>";
    exit;
}

if (mysqli_num_rows($query) === 0) {
    echo "<p style='text-align:center;'>Aucune vente trouvée pour ce client (ID: $id).</p>";
} else {
    $montant = 0;

    echo "<table>
        <thead>
            <tr>
                <th>Id sale</th>
                <th>Sale date</th>
                <th>Id seller</th>
                <th>Total price (DA)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";

    while ($rows = mysqli_fetch_assoc($query)) {
        $NC = (int)$rows['id_sale']; // Cast en int par sécurité
        $total_price = (float)$rows['total_price'];
        $montant += $total_price;

        echo "<tr>";
        echo "<td>" . htmlspecialchars($NC) . "</td>";
        echo "<td>" . htmlspecialchars($rows['sale_date']) . "</td>";
        echo "<td>" . htmlspecialchars($rows['id_seller']) . "</td>";
        echo "<td>" . htmlspecialchars(number_format($total_price, 2)) . "</td>";
        echo "<td><a href='delete_sales.php?id=$NC' title='Delete'>
                <img src='delete.jpg' alt='delete' width='25' height='25'>
              </a></td>";
        echo "</tr>";
    }

    echo "</tbody></table>";

    echo "<div class='total'>Total of prices is : " . number_format($montant, 2) . " DA calculated for client ID : $id</div>";
}

// Fermer la connexion (optionnel)
mysqli_close($con);
?>
<br>
</body>
</html>

