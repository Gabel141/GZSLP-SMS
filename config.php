<?php

$server = "localhost:3307";
$username = "root";
$password = "";
$dbname = "graphiczone_db";

    $conn = new mysqli($server, $username, $password, $dbname);
    echo "<script>console.log('Connection Success!');</script>";



?>