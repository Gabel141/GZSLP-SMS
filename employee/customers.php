<?php

include("../config.php");
include("../crud.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="../table.css">
</head>
<body>

<?php include('enavbar.php'); ?>

<center>
    <h1>Customers</h1>
    <h2><button class="btn" onclick="location.href='forms/addaccount.php'">Add Account</button></h2>
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