<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require 'connexion.php';

// Initialisation des variables
$id_sale = $_GET['id_sale'] ?? 0;
$t = 0;
$total_general = 0;
$unit_price = 0;

if ($id_sale != 0) {
    $sql = "SELECT * FROM sales WHERE id_sale = '$id_sale'";
    $q = mysqli_query($con, $sql);
    $r = mysqli_fetch_assoc($q);

    if ($r) {
        $N = $r['id_client'];
        $ie = $r['id_seller'];
        $d = $r['sale_date'];
        $t = $r['total_price'];
        $total_general = $t;
    }
}

// Affichage du total général
if (!empty($total_general)) {
    echo "<h3>Total à payer : {$total_general} DA</h3>";
}

// Total simulé s’il existe
$total_simule = $_GET['total'] ?? '';
if (!empty($total_simule)) {
    echo "<h3>Total simulé : {$total_simule} DA</h3>";
}
?>

<form method="POST" action="add_sale.php">
    <input type="hidden" name="id_sale" value="<?= htmlspecialchars($id_sale); ?>">
    <h4>NEW Ticket</h4>
    <hr>

    <div class="field">
        <div>
            <label>Client :</label><br>
            <select name="client_id" required>
                <?php
                $requete = "SELECT * FROM clients";
                $query = mysqli_query($con, $requete);
                while ($rows = mysqli_fetch_assoc($query)) {
                    $selected = (isset($N) && $rows["id_client"] == $N) ? "selected" : "";
                    echo "<option value='{$rows["id_client"]}' $selected>{$rows["FULL_NAME"]}</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Seller :</label><br>
            <select name="seller_id" required>
                <?php
                $requete = "SELECT * FROM seller";
                $query = mysqli_query($con, $requete);
                while ($rows = mysqli_fetch_assoc($query)) {
                    $selected = (isset($ie) && $rows["id_seller"] == $ie) ? "selected" : "";
                    echo "<option value='{$rows["id_seller"]}' $selected>{$rows["SELLER_NAME"]}</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Date :</label><br>
            <input type="date" name="date_vente" value="<?= isset($d) ? $d : '' ?>" required>
        </div>

        <div>
            <label>Product :</label><br>
            <select name="product_id" required>
                <?php
                $requete = "SELECT * FROM products";
                $query = mysqli_query($con, $requete);
                while ($rows = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$rows["id_product"]}'>{$rows["NAME_P"]} ({$rows["DESCRIPTION"]})</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Quantity :</label><br>
            <input type="number" name="quantity" min="1" required>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" name="recalculer">Recalculer</button>
            <button type="submit" name="ajouter">Ajouter au ticket</button>
            <button type="submit" name="Terminer">Fermer</button>
        </div>
    </div>
</form>

</body>
</html>
