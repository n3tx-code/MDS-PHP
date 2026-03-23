<?php
// include: if the file is missing, PHP usually continues (with a warning)
echo "<h3>Test Include</h3>";
include 'missing_file.php';
echo "<p>Le script continue !</p>";

// require_once: loads a file only once and create a fatal error if the file is missing.
echo "<h3>Test Require Once</h3>";
require_once 'database.php';
require_once 'database.php';
echo "<p>Connexion établie, aucune erreur de redéclaration.</p>";

// require: if the file is missing, execution stops (fatal error)
echo "<h3>Test Require</h3>";
require 'missing_file.php';
echo "<p>Cette ligne ne s'affichera jamais.</p>";
?>