<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>List of Seller</title>
<style>
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

.new_s {
  font-family: 'Playfair Display', serif;
  font-size: 15px;
  color: black;
  letter-spacing: 1px;
}
</style>    
</head>
<body>
  <h1>List of seller</h1>
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Phone number</th>
      <th>Email</th>
      <th>Address</th>
      <th colspan="2">Actions</th>
    </tr>
    <?php
    require 'connexion.php';
    $requete = "SELECT * FROM seller";
    $query = mysqli_query($con, $requete);
    while ($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id_seller'];
        echo "<tr>";
        echo "<td>" . $rows['id_seller'] . "</td>";
        echo "<td>" . $rows['SELLER_NAME'] . "</td>";
        echo "<td>" . $rows['PHONE_SELLER'] . "</td>";
        echo "<td>" . $rows['EMAIL_SELLER'] . "</td>";
        echo "<td>" . $rows['ADDRESS_SELLER'] . "</td>";
        echo "<td><a href='delete_seller.php?id=$id' title='Delete'>
                <img src='delete.jpg' alt='delete' width='25' height='25'>
              </a></td>";
        echo "<td><a href='form_seller_update.php?id=$id' title='Update'>
                <img src='updated.jpg' alt='update' width='25' height='25'>
              </a></td>";
        echo "</tr>";
    }
    ?>
  </table>
  <br />
  <a class="new_s" target="_self" href="form_seller_add.php">Add a new seller</a>  
</body>
</html>

