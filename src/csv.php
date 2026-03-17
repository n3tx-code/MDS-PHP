<?php

$fileName = 'test.csv';

$file = fopen($fileName, 'a');
$array = ["Nils", "VAEDE", "B1 DEV"];
fputcsv($file, $array);
fclose($file);
echo "fichier créé";

$file = fopen($fileName, 'r');
while (($agentData = fgetcsv($file)) !== false) {
    var_dump($agentData);
    echo "<br/> <br/>";
}
fclose($file);

