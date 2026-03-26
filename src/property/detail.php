<?php
// Load database connection and helper functions (../ means go up one level in the directory tree)
require_once '../database.php';
require_once '../functions.php';


// A property id is required in the URL
if (!isset($_GET['id']) && empty($_GET['id'])) {
    echo "l'id est nécessaire";
    die();
}

$errors = [];

// Clean the id from URL input
$id = cleanData($_GET['id'], 'id', $errors);

// Select one property by id (prepared statement)
$sqlSelect = "SELECT * FROM properties WHERE id = :id";
$stmtSelect = $pdo->prepare($sqlSelect);
$stmtSelect->execute([
    'id' => $id,
]);
$result = $stmtSelect->fetch();

if ($result) {
    // Compute price per square meter for display
    $priceSQTm = priceM2($result['area'], $result['price']);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du bien</title>
    <link rel="stylesheet" href="/css/style.css" >
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

        <!-- Loop through all property fields and print them -->
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