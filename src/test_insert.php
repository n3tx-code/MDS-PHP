<?php
require_once 'database.php';

/*
$sqlInsert = "INSERT INTO properties (title, area, price, district_id) 
VALUES (:title, :area, :price, :district_id)";
$stmtInsert = $pdo->prepare($sqlInsert);
$stmtInsert->execute([
    'title' => 'Appartement rénové',
    'area' => 45,
    'price' => 320000,
    'district_id' => 1
]); */

$requestedId = 1;
$sqlSelect = "SELECT * FROM properties WHERE id = :id";
$stmtSelect = $pdo->prepare($sqlSelect);
$stmtSelect->execute([
    'id' => $requestedId,
]);

$property = $stmtSelect->fetch();

var_dump($property);