<?php
session_start();

// Check that the user is logged in by checking the session variable agent_id
if (!isset($_SESSION['agent_id'])) {
    header('Location: login.php');
    die();
}
?>
<h1>Dashboard</h1>
<!-- Display the agent name from the session variable agent_name -->
<h2>Hello <?= $_SESSION['agent_name']; ?></h2>
<?php
$salesHistories = [
        [
            "clientName" => "Jean",
            "propertyType" => "Appartement",
            "commission" => 1200,
            "saleValue" => 250000
        ],
        [
            "clientName" => "Madeleine",
            "propertyType" => "Appartement",
            "commission" => 1000,
            "saleValue" => 220000
        ],
        [
            "clientName" => "Macron",
            "propertyType" => "Appartement",
            "commission" => 1400,
            "saleValue" => 260000
        ],
    ];
?>
<h2>Mes ventes</h2>
<ul>
    <?php 
        // Used to create a unique index for the link (sale.php?id=...)
        $count = 0;
        // Loop over each sale and print one <li> with a link
        foreach($salesHistories as $sale) {
            ?>
                <li>
                    <a href="sale.php?id=<?= $count; ?>&source=dashboard">Vente de <?= $sale["clientName"]; ?></a>
                </li>
            <?php
            $count++;
        } ?>
</ul>