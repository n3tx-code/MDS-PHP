<?php
function priceM2($area, $price) {
    if ($area <= 0) {
        return 0;
    }
    return $price/$area;
}

// Database connection settings
$host = 'localhost';
$dpName = 'real_estate';
$user = 'root';
$mdp = 'root';
 
// DSN: tells PDO where the database is and which charset to use
$pdn = 'mysql:host=' . $host . ';dbname=' . $dpName . ';charset=utf8mb4';
 
try {
    // Create the PDO connection and enable helpful error messages
    // ERRMODE: throws an error (exception) instead of hiding problems
    // DEFAULT_FETCH_MODE: returns rows as an associative array (column => value)
    $pdo = new PDO ($pdn, $user, $mdp);
    $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC);
} catch (EXCEPTION $e){
    echo 'Erreur de connexion : ' . $e -> getMessage();
    die();
}

// Verify that an id is provided.
if (!isset($_GET['id']) && empty($_GET['id'])) {
    echo "l'id est nécessaire";
    die();
}

$id = htmlspecialchars($_GET['id']);

// Query: select the property with this id
$sqlSelect = "SELECT * FROM properties WHERE id=" . $id;
$query = $pdo->query($sqlSelect);
$result = $query->fetch();
if ($result) {
    // If we have a result, compute price per m2
    $priceSQTm = priceM2($result['area'], $result['price']);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du bien</title>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>


<div class="navbar">
    <div class="navbar-logo">🏠 RealEstate</div>

    <div class="navbar-links">
        <a href="index.php">Accueil</a>
        <a href="property_list.php">Liste des biens</a>
    </div>
</div>
    <?php if($result) {
        ?>
        <div class="container">
    <div class="card">
        <h1>🏠 Détail du bien</h1>

        <!-- Loop over the fetched row to display each field -->
        <?php foreach ($result as $key => $value): ?>
            <div class="info">
                <span class="label"><?= htmlspecialchars($key) ?> :</span>
                <span><?= htmlspecialchars($value) ?></span>
            </div>
        <?php endforeach; ?>

        <div class="info price">
            Prix : <?= number_format($result['price'], 0, ',', ' ') ?> €
        </div>

        <div class="info sqm">
            Prix au m² : <?= number_format($priceSQTm, 2, ',', ' ') ?> €/m²
        </div>
    </div>
</div>
<?php
    } else {
        ?>
        <div class="error-container">
    <div class="error-card">
        <div class="error-icon">🔍</div>
        <div class="error-title">Aucun résultat</div>
        <div class="error-text">
            Le bien que vous recherchez n'existe pas ou a été supprimé.
        </div>
        <a href="index.php" class="error-btn">Retour</a>
    </div>
</div>
<?php } ?>

</body>
</html>