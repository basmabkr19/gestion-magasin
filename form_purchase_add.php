<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form ffor a new purchase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <form method="POST" action="add_purchase.php?">
    <h4>NEW PURCHASE</h4>
    <hr>
    <div class="field"> 
        <div>
            <label>Supplier :</label>
            <select name="id_su" required>  
                    <?php
                    require'connexion.php';
                    $requete="SELECT * FROM supplier";
                    $query=mysqli_query($con,$requete);
                    while($rows=mysqli_fetch_assoc($query))
                    {
                        echo "<option value='".$rows["id_supplier"]."' >".$rows["SUPPLIER_NAME"]." </option>";
                    }
                    ?>
                </select>    
            <br></br>
        </div> 
        <div>
            <label>Product :</label>
            <select name="id_pr" required>  
                    <?php
                    require'connexion.php';
                    $requete="SELECT * FROM products";
                    $query=mysqli_query($con,$requete);
                    while($rows=mysqli_fetch_assoc($query))
                    {
                        echo "<option value='".$rows["id_product"]."' >".$rows["NAME_P"]."(".$rows["DESCRIPTION"].") </option>";
                    }
                    ?>
                </select>    
            <br></br>
        </div>
        <div>
            <label>Quantity :</label>
            <input type="number" name="quantity" placeholder="Enter quantity" title="Quantity must be an integer">
        </div>
        <div>
            <label>Purchase Date :</label>
            <input type="date" name="purchase_date" title="Select the purchase date">
        </div>
        <br>
        <input type="submit" value="ADD">
    </div>
</form>

</body>
</html>