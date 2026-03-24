<?php

require_once 'database.php';

$password = "Ceciestmonmotdepasse!";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO agents (first_name, last_name, email, password, experience_years) 
VALUES (:first_name, :last_name, :email, :password, :experience_years)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'first_name' => 'Jean',
    'last_name' => 'Pierre',
    'email'      => 'jean-pierre@example.com',
    'password'   => $hashedPassword,
    'experience_years' => 15
]);

echo "Agent ajouté";