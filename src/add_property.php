<?php
$allowedDistricts = ["Lyon Centre", "Confluence", "Bellecour", "Dauphiné Lacassagne", "Croix-Rousse", "Villeurbanne"];
?>

<!DOCTYPE HTML>
<html>
    <body>
    
        <h1>Ajouter un bien immobilier</h1>
    
        <form action="process_property.php" method="POST">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title"><br><br>
    
            <label for="price">Prix :</label>
            <input type="number" id="price" name="price"><br><br>
    
            <label for="surface">Surface :</label>
            <input type="number" id="surface" name="surface"><br><br>
    
            <label for="district">Quartier :</label>
            <select id="district" name="district">
                <?php foreach($allowedDistricts as $district) { ?>
                    <option value="<?= $district; ?>"><?= $district; ?></option>
                <?php } ?>
                <option value="St étienne">St Étienne</option>
            </select>
            <br><br>
    
            <button type="submit">Envoyer</button>
        </form>
 
    </body>
</html>