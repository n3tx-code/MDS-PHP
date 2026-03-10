<h1>Agence immobilière MDS !</h1>
<?php
    $propertyName = "Cabane de pêcheur";
    $propertyPrice = 20000;
    $isAvailable = false;
    $propertyCity = "St Tropez";

    // Echo display the text in the output (HTML)
    echo "Le bien <strong>" .  $propertyName . "</strong> coûte <em>" . $propertyPrice . "€</em>. <br/>";
?>

<hr>
<h2>Catégorie du logement</h2>
<?php

    // || = OU
    // && = ET
    if ($propertyPrice > 500000 || $propertyCity == "St Tropez") {
        echo "<p>Luxe</p>";
    } elseif ($propertyPrice > 200000) {
        echo "<p>Familiale</p>";
    } else {
        echo "<p>Étudiant</p>";
    }

    $countdown = 3;
    while ($countdown > 0) {
        echo "<p>Ouverture de l'agence dans " . $countdown . " jours";
        // $countdown = $coutdown - 1;
        $countdown--;
    }
?>
<hr>
<h2>Nombre de visite(s)</h2>
<?php
    // $visitNumber = $visitNumber + 1;
    for ($visitNumber = 1; $visitNumber <=5; $visitNumber++) {
        ?>
        <p>
            Visite programmée n°: <?= $visitNumber; ?>
        </p>
        <?php
    }

$property = [
    "title" => "Appartement T3",
    "price" => 250000,
    "city" => "Lyon"
];

var_dump($property); ?>
<br/>
<?php print_r($property); ?>
<br/>
<?php var_export($property); ?>
</br>
<p>Nom de la propriété : <?= $property["title"] ?></p>
<p>Prix de la propriété : <?= $property["price"] ?></p>
<p>Ville de la propriété : <?= $property["city"] ?></p>
<hr>
<?php
$cities = ["Lyon", "Paris", "Toulouse", "Marseille", "Bordeaux", "Lille", "Strasbourg"];

?>
<ul>
    <?php foreach($cities as $city) { ?>
        <li>Agence de :  <?= $city; ?></li>
    <?php } ?>
</ul>