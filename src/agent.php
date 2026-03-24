<?php
require_once 'database.php';
require_once 'functions.php';


if (!isset($_GET['id']) && empty($_GET['id'])) {
    echo "l'id est nécessaire";
    die();
}

$errors = [];

$id = cleanData($_GET['id'], 'id', $errors);

$sqlSelect = "SELECT * FROM agents WHERE id = :id";
$stmtSelect = $pdo->prepare($sqlSelect);
$stmtSelect->execute([
    'id' => $id,
]);
$result = $stmtSelect->fetch();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $result['first_name']; ?> <?= $result['last_name'] ?></title>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>


<div class="navbar">
    <div class="navbar-logo">🏠 RealEstate</div>

    <div class="navbar-links">
        <a href="index.php">Accueil</a>
        <a href="property_list.php">Liste des biens</a>
        <a href="agent_list.php">Nos agents</a>
    </div>
</div>
    <?php if($result) {
        ?>
        <div class="container">
    <div class="card">
        <h1><?= $result['first_name']; ?> <?= $result['last_name'] ?></h1>

        <?php foreach ($result as $key => $value): ?>
            <div class="info">
                <span class="label"><?= htmlspecialchars($key) ?> :</span>
                <span><?= htmlspecialchars($value) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
    } else {
        ?>
        <div class="error-container">
    <div class="error-card">
        <div class="error-icon">🔍</div>
        <div class="error-title">Aucun résultat</div>
        <div class="error-text">
            Le bien que vous recherchez n'existe pas ou a été supprimé.
        </div>
        <a href="index.php" class="error-btn">Retour</a>
    </div>
</div>
<?php } ?>

</body>
</html>