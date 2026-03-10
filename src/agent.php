<!-- Exercice 1 & 2 -->
<h1>Agence féérique</h1>
<?php
$agentName = "Roger";
$yearsExperience = 7;
$totalSales = 10000;

echo "Monsieur <strong>" . $agentName . "</strong> vend depuis <em>" . $yearsExperience . "ans</em> et a réalisé <strong>" . $totalSales . "</strong> ventes. <br/>"; 
?>

<!-- Exercice 3 -->
<?php
if ($yearsExperience > 5) {
    echo "Agent Senior";
} else {
    echo "Agent Junior";
}
?>

<!-- Exercice 4 -->
<?php
$totalCommission = 0;
$contractsCount = 0;

while ($totalCommission < 5000) {
    // $totalCommission = totalCommission + rand(500, 1500);
    $comission = rand(500, 1500);
    var_dump($comission);
    $totalCommission += rand(500, 1500);
    $contractsCount++;
}
echo "<p>Contrat nécessaire avant bonus : " . $contractsCount . "</p>";
?>

<!-- Exercice 5 -->
<?php
for($i = 0; $i < 3; $i++) {
    echo "*";
}
?>

<!-- Exercice 6 -->
<?php
$sectors = ["Lyon Centre", "Villeurbanne", "Lyon Part-Dieu", "Lyon Confluence"];
$favoritePlace = $sectors[3];
echo "<p>Mon endroit préféré à Lyon : " . $favoritePlace . "</p>";
?>

<!-- Exercice 7 -->
<ul>
    <?php foreach($sectors as $sector) { ?>
        <li>
            <?= $sector ?>
        </li>   
    <?php } ?>
<ul>


<!-- Exercice 8 -->
<?php
    $lastSale = [
        "clientName" => "Marie Martin",
        "propertyType" => "Appartement T3",
        "commission" => 8500
    ];

    echo $lastSale["clientName"] . "<br/>";
    echo $lastSale["propertyType"] . "<br/>";
    echo $lastSale["commission"] . "<br/>";

?>

<!-- Exercice 9 -->
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

<!-- Exercice 10 -->
<table>
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Type</th>
            <th scope="col">Commission</th>
            <th scope="col">Valeur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($salesHistories as $saleHistory) { ?>
            <tr>
                <th scope="row"><?= $saleHistory["clientName"]; ?></th>
                <th scope="row"><?= $saleHistory["propertyType"]; ?></th>
                <th scope="row"><?= $saleHistory["commission"]; ?> €</th>
                <th scope="row"><?= $saleHistory["saleValue"]; ?> €</th>
            </tr>
        <?php } ?>
    </tbody>
</table>