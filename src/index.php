<?php
require_once 'database.php';
require_once 'functions.php';

$sqlSelectAllProperties = "SELECT * FROM properties";
$query = $pdo->query($sqlSelectAllProperties);
$properties = $query->fetchAll();

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

<div class="navbar">
    <div class="navbar-logo">🏠 RealEstate</div>

    <div class="navbar-links">
        <a href="index.php">Accueil</a>
        <a href="property_list.php">Liste des biens</a>
    </div>
</div>
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
                    foreach($properties as $property) {
                        ?>
                        <tr>
                            <td>
                                <a href="property.php?id=<?= $property['id']; ?>">
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