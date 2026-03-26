<?php 

// Clean the data
function cleanData ($input, $name, &$errors) {
    if (isset($input) && !empty($input)) {
        $cleanInput = htmlspecialchars($input);
        return trim($cleanInput);
    } else {
        array_push($errors, 'Le champ ' . $name . ' est vide.');
    }
}

// Calculate the price per square meter
function priceM2($area, $price) {
    if ($area <= 0) {
        return 0;
    }
    return $price/$area;
}

// Check if the value is inferior to 0
function valuesInferior ($input, &$errors) {
    if ($input < 0) {
            array_push($errors,'Votre prix est inférieur à 0.');
    }
}