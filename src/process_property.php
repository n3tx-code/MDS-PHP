<?php
require_once 'functions.php';
?>

<style>
    .error {
        color : red;
        font-style: italic;
    }
</style>

<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { ?>
    <p class="error">
        Erreur : cette page doit être appelée via une requête POST. <br/>Vous pouvez le faire depuis le <a href="add_property.php">formulaire de création d'annonce</a>.
    </p>
<?php
    exit;
}

$errors = [];
$allowedDistricts = ["Lyon Centre", "Confluence", "Bellecour", "Dauphiné Lacassagne", "Croix-Rousse", "Villeurbanne"];
$title = "Aucun titre";
$price = 0;
$surface = 0;
$district = "Aucun quartier";

$formErrors = [];
$title = cleanData($_POST['title'], 'Titre', $formErrors);

$title = cleanData($_POST['title'], 'Titre', $formErrors);
$price = cleanData($_POST['price'], 'Prix', $formErrors);
$surface = cleanData($_POST['surface'], 'Surface', $formErrors);
$district = cleanData($_POST['district'], 'Quartier', $formErrors);


$price = intval($price);
if ($price <= 0) { 
        array_push($errors, "Erreur : le prix est invalide");
    }

$surface = floatval($surface);
if ($surface <= 0) { 
    array_push($errors, "Erreur : la surface est invalide");
}

$pricePerSqm = 0;
if ($surface > 0) {
    $pricePerSqm = $price / $surface; ?>
    <?php
} else { 
    array_push($errors, "Erreur : Surface invalide pour calcul m2");
}

if(empty($errors)) {
    date_default_timezone_set('Europe/Paris');
    $currentDate = date("d/m/Y H:i:s");
    $newProperty = [
        "title" => $title,
        "price" => $price,
        "surface" => $surface,
        "pricePerSqm" => $pricePerSqm,
        "district" => $district,
        "createAt" => $currentDate
    ];

    $fileName = "properties.csv";
    $file = fopen($fileName, 'a');
    fputcsv($file, $newProperty);
    fclose($file);

    echo "Annonce ajoutée sur " . $district . ": " . $title . ", " . $price . "€, " . $surface . "m² (Prix au m² : " . $pricePerSqm . "€/m²).";
} else {
    foreach ($errors as $error) { ?>
        <li class="error"><?php echo $error; ?> </li>
        <?php } ?> 
        </ul>
    <?php 
    }