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
?>