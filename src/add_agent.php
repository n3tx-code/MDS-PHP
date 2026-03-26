<?php
// Load shared session, database connection, and helper functions
require_once 'session.php';
require_once 'database.php';
require_once 'functions.php';


// Handle form submission only when request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form validation errors
    $errors = [];
    // Clean and validate each input
    $firstName = cleanData($_POST['first-name'], "Prénom", $errors);
    $lastName = cleanData($_POST['last-name'], "Nom", $errors);
    $email = cleanData($_POST['email'], "Email", $errors);
    $password = cleanData($_POST['password'], "Mot de passe", $errors);
    $experienceYears = cleanData($_POST['years-experiences'], "Année(s) d'expérience(s)", $errors);

    if (sizeof($errors) == 0) {
        // Never store raw passwords: store a hashed version
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new agent using a prepared statement
        $sql = "INSERT INTO agents (first_name, last_name, email, password, experience_years) 
        VALUES (:first_name, :last_name, :email, :password, :experience_years)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email'      => $email,
            'password'   => $hashedPassword,
            'experience_years' => $experienceYears
        ]);

        echo "Agent ajouté !";
    } else {
        // If validation fails, show errors
        var_dump($errors);
        echo "Erreur dans votre formulaire";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout agent</title>
</head>
<body>
    <h1>Ajout agent</h1>
    <form method="POST" action="add_agent.php">
        <p>
            <label for="first-name">Prénom :</label>
            <input type="text" id="first-name" name="first-name" required>
        </p>
        <p>
            <label for="last-name">Nom :</label>
            <input type="text" id="last-name" name="last-name" required>
        </p>
        <p>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </p>
        <p>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </p>
        <p>
            <label for="years-experiences">Année(s) expérience(s) :</label>
            <input type="number" id="years-experiences" name="years-experiences" required>
        </p>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>