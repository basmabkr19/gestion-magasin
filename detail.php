<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Details</title>
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

        #search {
            display: block;
            margin: 0 auto 20px;
            width: 300px;
            padding: 10px 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 95%;
            margin: auto;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background-color:rgb(255, 255, 255);
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

        .faible {
            color: red;
            font-weight: bold;
        }

        .ok {
            color: green;
            font-weight: bold;
        }

    </style>
</head>
<body>

<h1>Stock Detail</h1>

<input type="text" id="search" placeholder="Search for a product...">

<table id="stockTable">
    <thead>
        <tr>
            <th >Name</th>
            <th >Description</th>
            <th >Price (DA)</th>
            <th >Quantity</th>
            <th >Category</th>
            <th >Supplier</th>
            <th >Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'connexion.php';
        $requete = "SELECT * FROM products";
        $query = mysqli_query($con, $requete);
        while ($rows = mysqli_fetch_assoc($query)) {
            $id_category = $rows['id_c'];
            $id_supplier = $rows['id_supplier'];

            echo "<tr>";
            echo "<td>" . htmlspecialchars($rows['NAME_P']) . "</td>";
            echo "<td>" . htmlspecialchars($rows['DESCRIPTION']) . "</td>";
            echo "<td>" . htmlspecialchars($rows['unit_price']) . "</td>";
            echo "<td>" . htmlspecialchars($rows['stock']) . "</td>";

            $requete1 = "SELECT category_name FROM category WHERE id_c='$id_category'";
            $query1 = mysqli_query($con, $requete1);
            $rows1 = mysqli_fetch_assoc($query1);
            echo "<td>" . htmlspecialchars($rows1['category_name'] ?? '') . "</td>";

            $requete2 = "SELECT SUPPLIER_NAME FROM supplier WHERE id_supplier='$id_supplier'";
            $query2 = mysqli_query($con, $requete2);
            $rows2 = mysqli_fetch_assoc($query2);
            echo "<td>" . htmlspecialchars($rows2['SUPPLIER_NAME'] ?? '') . "</td>";

            if ($rows['stock'] <= 5) {
                echo "<td><span class='faible'>Low stock</span></td>";
            } else {
                echo "<td><span class='ok'>Sufficient stock</span></td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<script>
// Recherche instantanée
document.getElementById("search").addEventListener("input", function () {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll("#stockTable tbody tr");

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? "" : "none";
    });
});
</script>

</body>
</html>
