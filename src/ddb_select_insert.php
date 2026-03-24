<?php
require_once 'database.php';

// INSERT INTO DDB
$title = "T3 Confluence";
$area = 80;
$agentId = 1;
$districtId = 2;

$sqlInsert = "INSERT INTO properties (title, area, agent_id, district_id) 
VALUES ('". $title . "'," . $area . ", ". $agentId . ", " . $districtId . ")";

$pdo->exec($sqlInsert);

// SELECT
$area = 80;
$sqlSelect = "SELECT * from properties WHERE area >= ". $area ;
$query = $pdo->query($sqlSelect);
$properties = $query->fetchAll();
?>

<ul>
    <?php foreach($properties as $property) {
        ?>
        <li>
            <?= $property["title"]; ?>
        </li>
        <?php
    } ?>
</ul>