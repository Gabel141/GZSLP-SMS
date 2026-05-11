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
    <title>Suppliers</title>
    <style>
        th {
            color: white;
            background-color: black;
        }
    </style>

</head>
<body>

<?php include('mnavbar.php'); ?>

<center>
    <h1>Suppliers</h1>
    <h2><button class="btn-1" onclick="location.href='forms/addSupplier.php'">Add Suppliers</button></h2>
</center>    

<table class="list" style="width: 100%; text-align: center;">
    <tr>
        <th>Supplier ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    
        $read = "SELECT * FROM supplier_details";
        $read = mysqli_query($conn, $read);

        while ($row = mysqli_fetch_assoc($read)) {
        
        ?>
        <tr>
            <td><?php echo $row['supplierID'] ?></td>
            <td><?php echo $row['supplierName'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['contactNo'] ?></td>
            <td><a href="forms/editSupplier.php?supplierID=<?php echo $row['supplierID'] ?>">Edit</a></td>
            <td><a href="forms/deleteSupplier.php?supplierID=<?php echo $row['supplierID'] ?>">Delete</a></td>
        </tr>
        
    
        <?php
        }
    

    ?>




</table>

    
</body>
</html>