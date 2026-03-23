<?php
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

// Load all properties from the database
$sqlSelectAllProperties = "SELECT * FROM properties";
$query = $pdo->query($sqlSelectAllProperties);
// Fetch all the results. It returns an array of associative arrays.
$properties = $query->fetchAll(); 

function priceM2($area, $price) {
    if ($area <= 0) {
        return 0;
    }
    return $price/$area;
}

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