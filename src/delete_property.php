<?php
// Load session and database connection
require_once 'session.php';
require_once 'database.php';

// A property id is required in the URL
if (isset($_GET['id'])) {
    // Sanitize id from URL
    $id = intval(htmlspecialchars($_GET['id']));

    // First check that the property exists
    $selectPropertySQL = "SELECT id FROM properties WHERE id = :id";
    $stmtSelect = $pdo->prepare($selectPropertySQL);
    $stmtSelect->execute([
        "id" => $id
    ]);

    if ($stmtSelect->fetch()) {
        // Delete the property using a prepared statement
        $sqlDelete = "DELETE FROM properties WHERE id = :id";
        $stmtDelete = $pdo->prepare($sqlDelete);
        $stmtDelete->execute([
            'id'=> $id,
        ]);

        // Only one row should be deleted
        if ($stmtDelete->rowCount() == 1) {
            header('Location: dashboard.php');
        } else {
            echo "Une erreur est survenu lors de la suppression";
        }

    } else {
        echo "Propriété introuvable";
    }

} else {
    // Fallback redirect when id is missing
    header('Location: /property/');
    die();
}