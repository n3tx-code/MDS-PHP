<?php

// Checking that city and agent are sent in a GET request.
if (isset($_GET['city']) && isset($_GET['agent'])) {
    // Clean the content comming from the GET HTTP request. 
    $city = htmlspecialchars($_GET['city']);
    $agent = htmlspecialchars($_GET['agent']);
    echo "<h1>Agence de : " . $city . "</h1>";
    echo "<p>Agent en charge : " . $agent . "</p>";
} else {
    echo "Agence inconnue";
}

?>