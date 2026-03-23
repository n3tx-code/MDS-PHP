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

$querySelectProperties = "SELECT * FROM properties";
$query = $pdo->query($querySelectProperties);
// Get every property so we can display them
$properties = $query->fetchAll();

$selectDistrict = "SELECT * FROM districts";
$queryDistricts = $pdo -> query($selectDistrict);
// Get all districts for the dropdown in the form
$districts = $queryDistricts -> fetchAll();

// Show a message after a successful insert. success GET parameters is set in process_property.php if the property is successfully added to the database.
if (isset($_GET["succes"]) && $_GET["succes"] == "true") {
    ?>
    <p style="color: green">
        Propriété ajoutée !
    </p>
    <?php
}
?>

<ul>
    <?php foreach($properties as $property) {
        ?>
            <li><?= $property["title"]; ?></li>
        <?php
    } ?>
<ul>

<hr>

<form action="add_property.php" method= "POST">
    <label for="title">Titre de la propriété : </label>
    <input type="text" name="title" id = "title">
    <br/>
    <br/>
 
    <label for="price">Prix : </label>
    <input type="number" name="price" id = "price">
    <br/>
    <br/>
    
    <label for="area">Surface : </label>
    <input type="number" name="area" id = "area">
    <br/>
    <br/>
 
    <select name="district" id="district">
        <?php
            foreach($districts as $district) {
                // We use the id as the value of value because it is the primary key of the district table and it used to link the property to the district in the database.
            ?> 
                <option value= <?= $district['id'];?>><?= $district['name'];?></option>
        <?php } ?>
    </select>
    <br/>
    <br/>
    <button type= "submit">Envoyer</button>
</form>