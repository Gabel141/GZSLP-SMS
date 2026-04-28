<?php

include("../config.php");
include("../crud.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../table.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
</head>
<body>

<?php include('mnavbar.php'); ?>

<center>
    <h1>Customers</h1>
    <h2><button onclick="location.href='forms/addaccount.php'">Add Account</button></h2>
</center>    

<table class="list">
    <tr>
        <th><p>Last Name</p></th>
        <th>First Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th colspan="2">Actions</th>
    </tr>
</table>

    
</body>
</html>