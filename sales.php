<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>List of sales</title>
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

        .f {
            font-family: 'Playfair Display', serif;
            font-size: 15px;
            color: black;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <h1>List of sales</h1>
    <table>
        <tr>
            <th>NUM SALE</th>
            <th>Date</th>
            <th>Client</th>
            <th>Seller</th>
            <th>Total prices</th>
            <th>Action</th>
        </tr>
        <?php
        require 'connexion.php';
        $requete = "SELECT * FROM sales";
        $query = mysqli_query($con, $requete);
        while ($rows = mysqli_fetch_assoc($query)) {
            $id_sale = $rows['id_sale'];
            $id_client = $rows['id_client'];
            $id_seller = $rows['id_seller'];
            $date = date_format(new DateTime($rows['sale_date']), 'Y-m-d');
            echo "<tr>";
            echo "<td>" . $rows['id_sale'] . "</td>";
            echo "<td>" . $date . "</td>";
            $requete1 = "SELECT * FROM clients WHERE id_client='$id_client'";
            $query1 = mysqli_query($con, $requete1);
            while ($rows1 = mysqli_fetch_assoc($query1)) {
                echo "<td>" . $rows1['FULL_NAME'] . "</td>";
            }
            $requete2 = "SELECT * FROM seller WHERE id_seller='$id_seller'";
            $query2 = mysqli_query($con, $requete2);
            while ($rows2 = mysqli_fetch_assoc($query2)) {
                echo "<td>" . $rows2['SELLER_NAME'] . "</td>";
            }
            echo "<td>" . $rows['total_price'] . "</td>";
            echo "<td> <a href='ticket.php?id_sale=$id_sale' title='ticket vente'>
                        <img src='buy.png' alt='' width='30' height='30'>
                   </a> </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br />
    <a class="f" target="_self" href="form_sale_add.php?id_sale=0">New Ticket</a>
</body>
</html>
