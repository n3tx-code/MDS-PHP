<?php

$fileName = 'test.csv';

// Open in "append" mode: create the file if it does not exist
$file = fopen($fileName, 'a');
$array = ["Nils", "VAEDE", "B1 DEV"];

// Write one CSV row from the array
fputcsv($file, $array);
// Close the file to free the resource
fclose($file);
echo "fichier créé";

// Re-open in "read" mode to check what we wrote
$file = fopen($fileName, 'r');
// Read the CSV line by line
while (($agentData = fgetcsv($file)) !== false) {
    // $agentData is an array of values for one row
    var_dump($agentData);
    echo "<br/> <br/>";
}
fclose($file);

