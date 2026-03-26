<?php
// Load session handling
require_once 'session.php';

// Destroy the current session (log out)
session_destroy();
// Redirect user to login page with a logout flag
header('Location: login.php?logout=true');