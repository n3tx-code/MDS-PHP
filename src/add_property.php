<?php

require_once 'database.php';
require_once 'functions.php';
 

$formErrors = [];
 
function valuesInferior ($input, &$errors) {
    if ($input < 0) {
            array_push($errors,'Votre prix est inférieur à 0.');
    }
}

$title = cleanData($_POST['title'], 'Titre', $formErrors);
$price = cleanData($_POST['price'], 'Price', $formErrors);
$area = cleanData($_POST['area'], 'Surface', $formErrors);
$district_id = cleanData($_POST['district'], 'Surface', $formErrors);
 
valuesInferior($price, $formErrors);
valuesInferior($area, $formErrors);

if (empty($formErrors)) {
    $sqlInsert = "INSERT INTO properties (title,price,area,district_id) 
    VALUES (:title, :price, :area, :district_id)";
    $stmtInsert = $pdo->prepare($sqlInsert);
    $stmtInsert->execute([
        'title' => $title,
        'area' => $area,
        'price' => $price,
        'district_id' => $district_id
    ]);

    header('Location: property_list.php?succes=true');
} 

?>
<h2>Erreur(s): </h2>
<ul>
<?php
foreach ($errors as $error) {
    ?>
    <li><?= $error; ?>
    <?php } ?>
</ul>