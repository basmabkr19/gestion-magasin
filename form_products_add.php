<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form for a New Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="add_products.php?">
        <h4>NEW PRODUCT</h4>
        <hr>
        <div class="field">
            <div>
                <label> name :</label>
                <input type="text" name="name_p" placeholder='Enter product_name' title="Product Name must do not exceed 35 characters,letters,numbers" maxlength="35">
            </div> 
            <div>
                <label>description :</label>
                <input type="text" name="description_p" placeholder='Enter product_description' title="Prodcut description must do not exceed 60 characters,letters,numbers" maxlength="60"> 
            </div>
            <div>
                <label>unit price :</label>
                <input type="number" name="unit_price_p" placeholder='Enter product_unit price' step="0.01" min="0" title="Prodcut unit price must be a decimal (two numbers after comma and ten numbers before comma)"> 
            </div>
            <div>
                <label>stock :</label>
                <input type="number" name="stock_p" step="1" min="0" placeholder='Enter product_stock' title="Prodcut stock must be integer "> 
            </div>

            <div>
                <label>category id :</label>
                <select name="id_category" required>  
                    <?php
                    require'connexion.php';
                    $requete="SELECT * FROM category";
                    $query=mysqli_query($con,$requete);
                    while($rows=mysqli_fetch_assoc($query))
                    {
                        echo "<option value='".$rows["id_c"]."' >".$rows["category_name"]." </option>";
                    }
                    ?>
                </select>    
                <br></br>
            </div>

            <div>
                <label>supplier id :</label>
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

            <input type='submit' value='ADD'>
        </div>
    </form>
</body>
</html>
