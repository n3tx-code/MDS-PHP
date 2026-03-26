<?php
// Load the PDO database connection
require_once 'database.php';

// Check if an agent/admin already exists
$countQuery = "SELECT COUNT(*) as count FROM agents";
$stmt = $pdo->query($countQuery);
$count = $stmt->fetch();
if ($count['count'] > 0) {
    echo "Un admin existe déjà, impossible d'en créer un autre.";
    die();
}

// Create a default password and hash it before storing
$password = "secret";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the admin account with a prepared statement
$sql = "INSERT INTO agents (first_name, last_name, email, password, experience_years) 
VALUES (:first_name, :last_name, :email, :password, :experience_years)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'first_name' => 'Admin',
    'last_name' => 'Admin',
    'email'      => 'admin@example.com',
    'password'   => $hashedPassword,
    'experience_years' => 100
]);

echo "Admin ajouté";