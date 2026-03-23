<?php
// Set the timezone so dates are formatted correctly (Paris time)
date_default_timezone_set('Europe/Paris');

// Create a formatted "now" date string
$createdAt = date('d/m/Y H:i:s');
echo $createdAt;

// Display a specific date using DateTime
$date = new DateTime('2024-03-16 15:30:00');
echo "<br/>";
// Format the DateTime object (without seconds)
echo $date->format('d/m/Y H:i');
