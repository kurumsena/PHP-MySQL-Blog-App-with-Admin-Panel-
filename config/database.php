<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'config/constants.php';

// Connect to the database
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($connection->connect_errno) {
    die("Database connection failed: " . $connection->connect_error);
}
?>
