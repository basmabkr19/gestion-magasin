<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update form of products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      require 'connexion.php';
      if(isset($_GET['id_product'])){
        $id=$_GET['id_product'];
        $sql="SELECT * FROM products WHERE id_product='$id'";
        $q=mysqli_query($con,$sql);
        $r=mysqli_fetch_assoc($q);
            $N=$r['NAME_P'];
            $DE=$r['DESCRIPTION'];
            $up=$r['unit_price'];
            $st=$r['stock'];
            $ic=$r['id_c'];
            $i=$r['id_supplier'];  
      }
    ?> 

    <form method="GET" action="update_products.php?"<?php if(isset($_GET['id_product'])){echo "id_product=$id";} ?>">
    <input type="hidden" name="id_product" value="<?php echo $_GET['id_product'];?>">
        <h4>UPDATE EXISTING PRODUCT</h4>
        <hr>
        <div class="field">
            <div>
                <label>Id :</label>
                <input type="number" value="<?php echo $id; ?>" placeholder="Enter product_id" title="Product ID must be integer"maxlength="10" disabled>
            </div>  
            <div>
                <label> name :</label>
                <input type="text" name="name_p" placeholder='Enter product_name' title="Product Name must do not exceed 35 characters,letters,numbers" maxlength="35" value="<?php if(isset($_GET['id_product'])){echo $N;}?>">
            </div> 
            <div>
                <label>description :</label>
                <input type="text" name="description_p" placeholder='Enter product_description' title="Prodcut description must do not exceed 60 characters,letters,numbers" maxlength="60" value="<?php if(isset($_GET['id_product'])){echo $DE;}?>"> 
            </div>
            <div>
                <label>unit price :</label>
                <input type="number" name="unit_price_p" step="0.01" min="0" placeholder='Enter product_unit price' title="Prodcut unit price must be a decimal (two numbers after comma and ten numbers before comma)" value="<?php if(isset($_GET['id_product'])){echo $up;}?>"> 
            </div>
            <div>
                <label>stock :</label>
                <input type="number" name="stock_p" placeholder='Enter product_stock' min="0" title="Prodcut stock must be integer " value="<?php if(isset($_GET['id_product'])){echo $st;}?>"> 
            </div>

            <div>
                <label>category id :</label>
                <select name="id_category" required>  
                    <option value="<?php echo $ic; ?>"> <?php echo $ic; ?> </option>
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
                    <option value="<?php if(isset($_GET['id_product'])){echo $i;}?>"> <?php echo $i; ?> </option>
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

            <input type='submit' value='Update'>
        </div>
    </form>
</body>
</html>
