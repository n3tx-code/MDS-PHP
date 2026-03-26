<?php
// Load database connection + helper functions
require_once 'database.php';
require_once 'functions.php';

// Load all properties so we can display them in the table
$sqlSelectAllProperties = "SELECT * FROM properties";
$query = $pdo->query($sqlSelectAllProperties);
$properties = $query->fetchAll();

// Choose a category label based on the price
function propertyCategory($propertyPrice) {
    if ($propertyPrice > 500000) {
        return "Luxe";
    } elseif ($propertyPrice > 200000) {
        return "Familiale";
    } else {
        return "Étudiant";
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Nos propriétés</title>
<link rel="stylesheet" href="css/style.css" >
</head>
<body>
<?php
// Top navigation
require_once 'navbar.php';
?>
<div class="container">
    <h1>🏠 Nos propriétés</h1>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <td>Informations</td>
                    <td>Prix m2</td>
                    <td>Catégorie logement</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Render one table row per property
                    foreach($properties as $property) {
                        ?>
                        <tr>
                            <td>
                                <a href="/property/property.php?id=<?= $property['id']; ?>">
                                    <?= $property['title']; ?> - <?= $property['price']; ?> € - 
                                    <?= $property['area']; ?> - <?= $property['district_id']; ?>
                                </a>
                            </td>
                            <td>
                                <?= priceM2($property['area'], $property['price']); ?>
                            </td>
                            <td>
                                <?= propertyCategory($property["price"]); ?>
                            </td>
                        </tr>
                        <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>