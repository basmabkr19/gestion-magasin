<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>List of Products</title>
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

    .new_se, .c {
      font-family: 'Playfair Display', serif;
      font-size: 15px;
      color: black;
      letter-spacing: 1px;
      display: inline-block;
      margin: 10px 0;
      text-decoration: none;
    }

    .new_se:hover, .c:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>List of Products</h1>
  <table>
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Description</th>
      <th>Unit Price</th>
      <th>Stock</th>
      <th>Category ID</th>
      <th>Supplier ID</th>
      <th>Actions</th>
    </tr>
    <?php
    require 'connexion.php';
    $requete = "SELECT * FROM products";
    $query = mysqli_query($con, $requete);
    while ($rows = mysqli_fetch_assoc($query)) {
        $d = $rows['id_product'];
        echo "<tr>";
        echo "<td>" . $rows['id_product'] . "</td>";
        echo "<td>" . $rows['NAME_P'] . "</td>";
        echo "<td>" . $rows['DESCRIPTION'] . "</td>";
        echo "<td>" . $rows['unit_price'] . "</td>";
        echo "<td>" . $rows['stock'] . "</td>";
        echo "<td>" . $rows['id_c'] . "</td>";
        echo "<td>" . $rows['id_supplier'] . "</td>";
        echo "<td class='actions'>
                <a href='delete_products.php?id_product=$d' title='Delete'>
                  <img src='delete.jpg' alt='delete'>
                </a>
                <a href='form_products_update.php?id_product=$d' title='Update'>
                  <img src='updated.jpg' alt='update'>
                </a>
              </td>";
        echo "</tr>";
    }
    ?>
  </table>
  <br>
  <a class="new_se" href="form_products_add.php">Add a new Product</a><br>
  <a class="c" href="category.php">List of categories</a>
</body>
</html>

