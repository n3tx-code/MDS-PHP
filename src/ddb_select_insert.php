<?php

$host = "localhost";
$dbname = "real_estate";
$user = "root";
$password = "root";

$dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
    // On active les exceptions pour que PDO nous renvoie une exception en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // On demande à PDO de renvoyer les résultats sous forme de tableaux associatifs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connexion réussie !";
} catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}

// INSERT INTO DDB
$name = "T3 Confluence";
$surface = 80;
$agentId = 1;
$districtId = 2;

$sqlInsert = "INSERT INTO properties (name, surface, agent_id, district_id) 
VALUES ('". $name . "'," . $surface . ", ". $agentId . ", " . $districtId . ")";

$pdo->exec($sqlInsert);

// SELECT
$surface = 80;
$sqlSelect = "SELECT * from properties WHERE surface >= ". $surface ;
$query = $pdo->query($sqlSelect);
$properties = $query->fetchAll();
?>

<ul>
    <?php foreach($properties as $property) {
        ?>
        <li>
            <?= $property["name"]; ?>
        </li>
        <?php
    } ?>
</ul>