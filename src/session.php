<?php
// Load this file at the top of all pages that require the user to be logged in to access the page.
session_start();

// With this condition, if the user is not logged in, they are redirected to the login page
// and the script is stopped. 
if (!isset($_SESSION['agent_id'])) {
    header('Location: login.php');
    die();
}