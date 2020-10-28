<?php

$hostname = "localhost";
$username = "ixd1734_world";
$password = "uZPM[7vbqjk5";
$database = "ixd1734_airline";

// Create connection
$db = new mysqli($hostname, $username, $password, $database);
$db->set_charset("utf8");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
