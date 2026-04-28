<?php

include("../config.php");
include("../crud.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="../table.css">
</head>
<body>

<?php include('enavbar.php'); ?>

<center>
    <h1>Inventory</h1>
    <h2><button onclick="location.href='forms/addaccount.php'">Add Account</button></h2>
</center>    

<table class="list">
    <tr>
        <th><p>ID</p></th>
        <th>Product</th>
        <th>Unit Price</th>
        <th>Stock</th>
        <th>Supplier</th>
        <th>Date Received</th>
        <th colspan="2">Actions</th>
    </tr>
</table>

</body>
</html>