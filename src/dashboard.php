<h1>Dashboard</h1>
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
        $count = 0;
        foreach($salesHistories as $sale) {
            ?>
                <li>
                    <a href="sale.php?id=<?= $count; ?>&source=dashboard">Vente de <?= $sale["clientName"]; ?></a>
                </li>
            <?php
            $count++;
        } ?>
</ul>