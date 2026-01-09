<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form for a new category</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="add_category.php?">
        <h4> REGISTRATION FORM A NEW CATEGORY </h4>
        <hr>
        <div class="field">
            <div>
                <label>category name :</label>
                <input type="text" name='name_cat' placeholder='Enter category_name' title="category Name must do not exceed 30 characters,letters,numbers" maxlength="50">
            </div>
            <div>
                <label>category description :</label>
                <input type="text" name='des_cat' placeholder='Enter category_description' title="category description consists of characters,letters,numbers" maxlength="100"><br></br>
            </div>
            <input type='submit' value='ADD'>
        </div>
    </form>
</body>
</html>
