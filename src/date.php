<?php
date_default_timezone_set('Europe/Paris');
$createdAt = date('d/m/Y H:i:s');
echo $createdAt;

$date = new DateTime('2024-03-16 15:30:00');
echo "<br/>";
echo $date->format('d/m/Y H:i');
