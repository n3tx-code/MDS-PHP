<?php 
// Function to clean the data
function cleanData ($input, $name, &$errors) {
    if (isset($input) && !empty($input)) {
        $cleanInput = htmlspecialchars($input);
        return trim($cleanInput);
    } else {
        array_push($errors, 'Le champ ' . $name . ' est vide.');
    }
}

// Function to calculate the price per square meter
function priceM2($area, $price) {
    if ($area <= 0) {
        return 0;
    }
    return $price/$area;
}