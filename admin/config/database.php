<?php
require 'constants.php'; 

// Connect to the database
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_errno($connection)) {
    die(mysqli_error($connection));
}
