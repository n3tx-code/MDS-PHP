<?php
// Load session protection, database connection, and helper functions
require_once 'session.php';
require_once 'database.php';
require_once 'functions.php';

// Read property id from URL and load current values
if (isset($_GET['id'])) {
    $id = intval(htmlspecialchars($_GET['id']));

    // Select the property to prefill the update form
    $selectPropertySQL = "SELECT * FROM properties WHERE id = :id";
    $stmtSelect = $pdo->prepare($selectPropertySQL);
    $stmtSelect->execute([
        "id" => $id
    ]);
    $property = $stmtSelect->fetch();

    // Load districts for the dropdown list
    $selectDistrict = "SELECT * FROM districts";
    $queryDistricts = $pdo -> query($selectDistrict);
    $districts = $queryDistricts -> fetchAll();
    
} else {
    header('Location: /property/');
    die();
}


// When form is submitted, validate and update the property
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect validation errors
    $formErrors = [];
    $title = cleanData($_POST['title'], 'Titre', $formErrors);
    $price = cleanData($_POST['price'], 'Price', $formErrors);
    $area = cleanData($_POST['area'], 'Surface', $formErrors);
    $district_id = cleanData($_POST['district'], 'Surface', $formErrors);
    
    valuesInferior($price, $formErrors);
    valuesInferior($area, $formErrors);

    if (empty($formErrors)) {
        // Update the selected property using a prepared statement
        $sqlUpdate = "UPDATE properties SET title = :title, price = :price, area = :area, district_id = :district_id WHERE id = :id";
        $stmtInsert = $pdo->prepare($sqlUpdate);
        $stmtInsert->execute([
            'title' => $title,
            'price' => $price,
            'area' => $area,
            'district_id' => $district_id,
            'id' => $id
        ]);
        // Save a one-time message in session, then go back to dashboard
        $_SESSION["message"] = $property["title"] . " a bien été mise à jour";
        header('Location: dashboard.php');
    } 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Nos propriétés</title>
<link rel="stylesheet" href="css/style.css" >
</head>
<body>
    <?php
        // Shared top navigation
        require_once 'navbar.php';
    ?>
<!-- Prefilled form: current property values are shown for editing -->
<form action="update_property.php?id=<?= $property['id']; ?>" method= "POST">
    <label for="title">Titre de la propriété : </label>
    <input type="text" name="title" id = "title" value="<?= $property['title']; ?>">
    <br/>
    <br/>
 
    <label for="price">Prix : </label>
    <input type="number" name="price" id = "price" value="<?= $property['price']; ?>">
    <br/>
    <br/>
    
    <label for="area">Surface : </label>
    <input type="number" name="area" id = "area" value="<?= $property['area']; ?>">
    <br/>
    <br/>
    
    <p>
        Quartier actuel : <?= $property['district_id']; ?>
    </p>
    <select name="district" id="district">
        <!-- Mark current district as selected -->
        <?php
            foreach($districts as $district) {
            ?> 
                <option 
                <?php
                    if ($property['district_id'] == $district['id']) {
                        echo "selected ";
                    }
                ?> 
                value=<?= $district['id'];?>>
                    <?= $district['name'];?>
                </option>
        <?php } ?>
    </select>
    <br/>
    <br/>
    <button type= "submit">Envoyer</button>
</form>
</body>
</html>