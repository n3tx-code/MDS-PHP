<?php
// Reuse the PDO connection from database.php
require_once 'database.php';

// Test: insert one property using a prepared statement
$sqlInsert = "INSERT INTO properties (title, area, price, district_id) 
VALUES (:title, :area, :price, :district_id)";
$stmtInsert = $pdo->prepare($sqlInsert);
// Execute the query with the values, the index of the values are the names of the parameters in the query.
$stmtInsert->execute([
    'title' => 'Appartement rénové',
    'area' => 45,
    'price' => 320000,
    'district_id' => 1
]);

// Test: select one property by id using a prepared statement
$requestedId = 1;
$sqlSelect = "SELECT * FROM properties WHERE id = :id";
$stmtSelect = $pdo->prepare($sqlSelect);
$stmtSelect->execute([
    'id' => $requestedId,
]);

// Fetch the row (or false if not found)
$property = $stmtSelect->fetch();

var_dump($property);