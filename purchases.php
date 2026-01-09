<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>List of Purchases</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

    body {
      background: linear-gradient(to right, #bfe3fcff, #bfe3fcff);
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
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    th, td {
      padding: 14px 16px;
      font-size: 16px;
      border-bottom: 1px solid #eee;
      vertical-align: middle;
      text-align: left;
    }

    th {
      background-color: #e1f2ffff;
      color: black;
      font-weight: 600;
    }

    .actions {
      display: flex;
      gap: 10px;
      align-items: center;
      justify-content: center;
    }

    .actions a img {
      width: 24px;
      height: 24px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .actions a img:hover {
      transform: scale(1.1);
    }

    a.add-link {
      display: inline-block;
      font-family: 'Playfair Display', serif;
      font-size: 15px;
      color: black;
      letter-spacing: 1px;
      margin: 15px 40px;
      text-decoration: none;
    }

    a.add-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>List of Purchases</h1>
  <table>
    <tr>
      <th s>Num Purchase</th>
      <th>Product</th>
      <th>Supplier</th>
      <th>Quantity</th>
      <th>Purchase Date</th>
      <th>Actions</th>
    </tr>
    <?php
      require 'connexion.php';
      $requete = "SELECT * FROM purchases";
      $query = mysqli_query($con, $requete);

      while ($rows = mysqli_fetch_assoc($query)) {
          $id = $rows['id_purchase'];
          $id_product = $rows['id_product'];
          $id_supplier = $rows['id_supplier'];

          echo "<tr>";
          echo "<td>" . $rows['id_purchase'] . "</td>";

          $requete1 = "SELECT * FROM products WHERE id_product='$id_product'";
          $query1 = mysqli_query($con, $requete1);
          while ($rows1 = mysqli_fetch_assoc($query1)) {
              echo "<td>" . $rows1['NAME_P'] . " (" . $rows1['DESCRIPTION'] . ")</td>";
          }

          $requete2 = "SELECT * FROM supplier WHERE id_supplier='$id_supplier'";
          $query2 = mysqli_query($con, $requete2);
          while ($rows2 = mysqli_fetch_assoc($query2)) {
              echo "<td>" . $rows2['SUPPLIER_NAME'] . "</td>";
          }

          echo "<td>" . $rows['quantity'] . "</td>";
          echo "<td>" . $rows['purchase_date'] . "</td>";

          echo "<td class='actions'>
                  <a href='delete_purchase.php?id_purchase=$id' title='Delete'>
                    <img src='delete.jpg' alt='delete'>
                  </a>
                </td>";
          echo "</tr>";
      }
    ?>
  </table>

  <a class="add-link" href="form_purchase_add.php">Add a new Purchase</a>
</body>
</html>
