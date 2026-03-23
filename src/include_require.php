<?php
echo "<h3>Test Include</h3>";
include 'missing_file.php';
echo "<p>Le script continue !</p>";

echo "<h3>Test Require Once</h3>";
require_once 'database.php';
require_once 'database.php';
echo "<p>Connexion établie, aucune erreur de redéclaration.</p>";

echo "<h3>Test Require</h3>";
require 'missing_file.php';
echo "<p>Cette ligne ne s'affichera jamais.</p>";
?>