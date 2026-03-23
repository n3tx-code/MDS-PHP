<?php
$path = "properties.csv";
?>

<!DOCTYPE html>
<html lang="fr">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catalog</title>
</head>
 
<body style="margin:0px;">
    <header>
        <a href="add_property.php">ajouter un bien</a>
    </header>
    <?php if (file_exists($path)) {?>
    <ul>
        <?php
        $file = fopen($path, "r");
        while (($property = fgetcsv($file)) !== false) {
        ?>
            <li><?= $property[0]; ?></li>
        <?php
        }
        fclose($file);
    } else {
        echo "Le fichier properties.csv n'existe pas";
    }
    ?>
    
</body>
 
</html>