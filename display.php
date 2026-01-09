<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>List of Clients</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

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
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    th, td {
      padding: 14px 16px;
      font-size: 16px;
      text-align: left;
      border-bottom: 1px solid #eee;
      vertical-align: middle;
    }

    th {
      background-color: #e1f2ffff;
      color: #333;
      font-weight: 600;
    }

    .actions {
      display: flex;
      gap: 10px;
      align-items: center;
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

    .new {
      font-family: 'Playfair Display', serif;
      font-size: 15px;
      color: black;
      letter-spacing: 1px;
      display: block;
      text-align: center;
      margin-top: 25px;
      text-decoration: none;
    }

    .new:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>List of Clients</h1>
  <table>
    <thead>
      <tr>
        <th>Id client</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require 'connexion.php';
      $requete = "SELECT * FROM clients";
      $query = mysqli_query($con, $requete);
      while ($rows = mysqli_fetch_assoc($query)) {
        $NC = $rows['id_client'];
        echo "<tr>";
        echo "<td>" . $rows['id_client'] . "</td>";
        echo "<td>" . $rows['FULL_NAME'] . "</td>";
        echo "<td>" . $rows['EMAIL'] . "</td>";
        echo "<td>" . $rows['phone_client'] . "</td>";
        echo "<td>" . $rows['ADRESSE'] . "</td>";
        echo "<td>" . $rows['city_client'] . "</td>";
        echo "<td>" . $rows['country_client'] . "</td>";
        echo "<td>
                <div class='actions'>
                  <a href='delete_client.php?id=$NC' title='Delete'>
                    <img src='delete.jpg' alt='delete'>
                  </a>
                  <a href='form_client_update.php?id=$NC' title='Update'>
                    <img src='updated.jpg' alt='update'>
                  </a>
                  <a href='listing_sells.php?id=$NC' title='Achats'>
                    <img src='file.jpg' alt='achats'>
                  </a>
                </div>
              </td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  <a class="new" href="form_client_add.php">Add a new client</a>
</body>
</html>

