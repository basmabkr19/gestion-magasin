<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form to update a category</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      require 'connexion.php';
      if(isset($_GET['id'])){
        $c=$_GET['id'];
        $sql="SELECT * FROM category WHERE id_c='$c' " ;
        $q=mysqli_query($con,$sql);
        $r=mysqli_fetch_assoc($q);
            $N=$r['category_name'];
            $ds=$r['description'];
      }
     ?> 

    <form method="GET" action="update_category.php?<?php if(isset($_GET['id'])){echo "id_category=$c";} ?>"> 
        <input type="hidden" name="id_category" value="<?php echo $_GET['id'];?>">
        <h4>FORM UPDATE A CATEGORY</h4>
        <hr>
        <div class="field">
            <div>
                <label>category id :</label>
                <input type="text" value="<?php echo $c; ?>" placeholder='Enter category id' title="category id must do not exceed 10 characters,letters,numbers" maxlength="10" value="<?php if(isset($_GET['id'])){echo $c;}?>" disabled>
            </div>
            <div>
                <label>category name :</label>
                <input type="text" name='name_cat' placeholder='Enter category_name' title="category Name must do not exceed 30 characters,letters,numbers" maxlength="30" value="<?php if(isset($_GET['id'])){echo $N;}?>">
            </div>
            <div>
                <label>category description :</label>
                <input type="text" name='des_cat' placeholder='Enter category_description' title="category description consists of characters,letters,numbers"  value="<?php if(isset($_GET['id'])){echo $ds;}?>"><br></br>
            </div>
            <input type='submit' value='Update'>
        </div>
    </form>
</body>
</html>
