<?php
// Database connection settings
$host = 'localhost';
$dpName = 'real_estate';
$user = 'root';
$mdp = 'root';
 
// DSN: tells PDO where the database is and which charset to use
$pdn = 'mysql:host=' . $host . ';dbname=' . $dpName . ';charset=utf8mb4';
 
try {
    // Create the PDO connection and enable helpful error messages
    // ERRMODE: throws an error (exception) instead of hiding problems
    // DEFAULT_FETCH_MODE: returns rows as an associative array (column => value)
    $pdo = new PDO ($pdn, $user, $mdp);
    $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC);
} catch (EXCEPTION $e){
    echo 'Erreur de connexion : ' . $e -> getMessage();
    die();
}
 

$formErrors = [];
 
function cleanData ($input, $name, &$errors) {
    if (isset($input) && !empty($input)) {
        $cleanInput = htmlspecialchars($input);
        return trim($cleanInput);
    } else {
        array_push($errors, 'Le champ ' . $name . ' est vide.');
    }
}

function valuesInferior ($input, &$errors) {
    if ($input < 0) {
            array_push($errors,'Votre prix est inférieur à 0.');
    }
}

$title = cleanData($_POST['title'], 'Titre', $formErrors);
$price = cleanData($_POST['price'], 'Price', $formErrors);
$area = cleanData($_POST['area'], 'Surface', $formErrors);
$district = cleanData($_POST['district'], 'Surface', $formErrors);
 
valuesInferior($price, $formErrors);
valuesInferior($area, $formErrors);

if (empty($formErrors)) {
    // If everything is valid, insert into the database then redirect
    $sqlInsertProperty = "INSERT INTO properties (title,price,area,district_id) 
    VALUES ('" . $title . "', " . $price . ", " . $area . ", " . $district . ")";
    $pdo->exec($sqlInsertProperty);
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