<?php

$source = "Aucune source";
$title = "Aucun titre";
$price = "Aucun prix";
$surface = "Aucune surface";


function calculateQuarterMeterPrice($surface, $price) {
    if ($surface <= 0) {
        return 0;
    }
    return $price / $surface;
}

function sanitizeInput($input) {
    if (empty($input)) {
        return "";
    }
    $cleanData = htmlspecialchars($input);
    return trim($cleanData);
}

if (isset($_GET['source'])) {
    $source = sanitizeInput($_GET['source']);
}

if (isset($_POST['title'])) {
    $title = sanitizeInput($_POST['title']);
}

if (isset($_POST['propertyPrice'])) {
    $price = intval(sanitizeInput($_POST['propertyPrice']));
}

if (isset($_POST['propertySurface'])) {
    $surface = intval(sanitizeInput($_POST['propertySurface']));
}

$quarterMeterPrice = 0;

if (isset($_POST['propertyPrice']) && isset($_POST['propertySurface'])) {
    $quarterMeterPrice = calculateQuarterMeterPrice($surface, $price);
}
?>

<p> Source de l'ajout : <?= $source; ?>
<p>
    Nouvelle annonce : <?= $title; ?>
</p>
<p>
    Prix défini : <?= $price; ?>
</p>
<p>
    Surface : <?= $surface; ?><br/>
    Prix m2 : <?= $quarterMeterPrice ?>
</p>
