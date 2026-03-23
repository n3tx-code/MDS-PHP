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