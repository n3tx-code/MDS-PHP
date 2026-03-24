<?php
if(isset($_GET["source"])) {
    $source = htmlspecialchars($_GET["source"]);
    if($source == "dashboard") {
        echo "Vous venez du tableau de bord";
    }
}


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

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    if ($id >= 0 && $id < count($salesHistories)) {
        $sale = $salesHistories[$id];
        ?>
        <h1>Détail de la vente</h1>
        Client : <?= $sale["clientName"] ?> <br/>
        Type de bien : <?= $sale["propertyType"] ?> <br/>
        Commission : <?= $sale["commission"] ?> <br/>
        Valeur du bien : <?= $sale["saleValue"] ?> <br/>
    <?php
    } else {
        echo "La vente n'existe pas";
    }
} else {
    echo "Aucun ID fourni dans l'URL.";
};
?>


<a href="dashboard.php">Retour au tableau de bord</a>