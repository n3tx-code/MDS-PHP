<?php
// Load PDO database connection
require_once '../database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Nos propriétés</title>
<link rel="stylesheet" href="/css/style.css" >
</head>
<body>
    <?php
// Integrate the top navigation
require_once '../navbar.php';


// Load all properties for the list
$querySelectProperties = "SELECT * FROM properties";
$query = $pdo->query($querySelectProperties);
$properties = $query->fetchAll();

// Load all districts for the form dropdown
$selectDistrict = "SELECT * FROM districts";
$queryDistricts = $pdo -> query($selectDistrict);
$districts = $queryDistricts -> fetchAll();

// Show feedback after a successful property creation
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
            <li><?= $property["title"]; ?> | 
            <a href="update_property.php?id=<?= $property['id']; ?>">Modifier</a></li>
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
            ?> 
                <option value= <?= $district['id'];?>><?= $district['name'];?></option>
        <?php } ?>
    </select>
    <br/>
    <br/>
    <button type= "submit">Envoyer</button>
</form>
</body>
</html>