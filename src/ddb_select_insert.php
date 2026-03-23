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

$name = "T3 Confluence";
$surface = 80;
$agentId = 1;
$districtId = 2;

// SQL query with concatenation.
$sqlInsert = "INSERT INTO properties (name, surface, agent_id, district_id) 
VALUES ('". $name . "'," . $surface . ", ". $agentId . ", " . $districtId . ")";
// Execute the SQL query.
$pdo->exec($sqlInsert);


// SQL query with concatenation.
$sqlSelect = "SELECT * from properties WHERE surface >= ". $surface ;

// Execute the SQL query.
$query = $pdo->query($sqlSelect);
// Fetch all the results. It returns an array of associative arrays.
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