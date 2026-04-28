<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "graphiczone_db";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "<script>console.log('Connection Success!');</script>";
} catch (PDOException $e) {
    die("Could not connect. " . $e->getMessage());
}


?>