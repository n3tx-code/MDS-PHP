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

function cleanData($input) {
    if (isset($input)) {
        $cleanInput = htmlspecialchars($input);
        return trim($cleanInput);
    } 
}

$title = cleanData($_POST['title']);
$price = cleanData($_POST['price']);
$surface = cleanData($_POST['surface']);
$district = cleanData($_POST['district']);

if (empty($title)) { 
    array_push($errors, "Erreur : le champ Titre est vide");
}

if (empty($price)) { 
    array_push($errors, "Erreur : le champ Prix est vide");
}

if (empty($surface)) { 
    array_push($errors, "Erreur : le champ Surface est vide");
}

if (empty($district)) { 
    array_push($errors, "Erreur : le champ Quartie est vide");
}

if (!in_array($district, $allowedDistricts)) { 
    array_push($errors, "Erreur : quartier inconnue");
}

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

var_dump($errors);

if(empty($errors)) {
    echo "Annonce ajoutée sur " . $district . ": " . $title . ", " . $price . "€, " . $surface . "m² (Prix au m² : " . $pricePerSqm . "€/m²).";
} else {
    foreach ($errors as $error) { ?>
        <li class="error"><?php echo $error; ?> </li>
        <?php } ?> 
        </ul>
    <?php 
    }