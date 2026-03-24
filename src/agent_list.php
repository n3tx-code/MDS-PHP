<?php
require_once 'database.php';
require_once 'functions.php';

$seniority = NULL;
if (isset($_GET['seniority']) && !empty($_GET['seniority'])) {
    $seniority = trim(htmlspecialchars($_GET['seniority']));
}



$experienceYears = 0;

if ($seniority == "junior") {
    $experienceYears = 0;
} elseif ($seniority == "confirmed") {
    $experienceYears = 2;
} elseif ($seniority == "senior") {
    // Senior
    $experienceYears = 5;
}

$sqlSelect = "SELECT * FROM agents WHERE experience_years > :experience_years";
$stmtSelect = $pdo->prepare($sqlSelect);
$stmtSelect->execute([
    'experience_years' => $experienceYears,
]);
$agents = $stmtSelect->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Agents</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: auto;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .filters {
        text-align: center;
        margin-bottom: 20px;
    }

    .filters a {
        display: inline-block;
        margin: 5px;
        padding: 8px 15px;
        border-radius: 20px;
        text-decoration: none;
        background: #e9ecef;
        color: #555;
        transition: 0.2s;
    }

    .filters a:hover {
        background: #2c7be5;
        color: white;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    li {
        padding: 12px;
        border-bottom: 1px solid #eee;
        transition: 0.2s;
    }

    li:hover {
        background: #f1f5ff;
    }

    .agent-name {
        font-weight: bold;
        color: #333;
    }

    .empty {
        text-align: center;
        color: #888;
        padding: 20px;
    }
</style>

</head>
<body>

<div class="container">
    <h1>👨‍💼 Nos agents</h1>

    <div class="card">
        <div class="filters">
            <a href="?seniority=junior">Junior</a>
            <a href="?seniority=confirmed">Confirmé</a>
            <a href="?seniority=senior">Sénior</a>
        </div>

        <ul>
            <?php foreach($agents as $agent) {
                ?>
                <li>
                    <a href="agent.php?id=<?= $agent['id']; ?>" class="agent-name">
                        <?= $agent['first_name']; ?> <?= $agent['last_name']; ?>
                    </span>
                </li>
                <?php
            } ?>    
        </ul>

        <?php if (empty($agents)) { ?>
            <div class="empty">Aucun agent trouvé</div>
        <?php } ?>
    </div>
</div>

</body>
</html>