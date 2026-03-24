<?php
// IMPORTANT : session_start() must always be the FIRST LINE before any HTML output
session_start();
require_once 'database.php';
require_once 'functions.php';

// If the user is already logged in, don't display the login form
if (isset($_SESSION['agent_id'])) {
    echo "Vous êtes déjà connecté.";
    exit;
}

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
    
    $emailInput = trim(htmlspecialchars($_POST['email']));
    $passwordInput = htmlspecialchars($_POST['password']);

    // Step 1: Search the user in the database via their email
    $sql = "SELECT * FROM agents WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $emailInput]);
    $agent = $stmt->fetch();

    // Step 2: If the agent exists AND the password entered matches the stored hash
    if ($agent && password_verify($passwordInput, $agent['password'])) {

        // Regenerate the session ID to prevent session fixation attacks
        session_regenerate_id(true);

        // Successful connection: store the agent ID and first name in the global session
        $_SESSION['agent_id'] = $agent['id'];
        $_SESSION['agent_name'] = $agent['first_name'];

        // Redirect to the dashboard
        header('Location: dashboard.php');
        // Always exit after a header location
        exit;

    } else {
        // Generic message to not indicate if it's the email or password that is false (better security practice)
        echo "Identifiants incorrects.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST" action="login.php">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>