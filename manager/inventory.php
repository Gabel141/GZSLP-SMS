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
    <h1>Inventory</h1>
    <h2><button class="btn-1" onclick="location.href='forms/addProduct.php'">Add Inventory Item</button></h2>
</center>    
  
<table class="list" style="width: 100%; text-align: center;">
    <tr>
        <th>Product ID</th>
        <th>Product</th>
        <th>Unit Price</th>
        <th>Stock</th>
        <th>Supplier</th>
        <th>Date Received</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php

    $read = "SELECT * FROM product_details as p JOIN prodsupp as ps ON p.productID = ps.productID JOIN supplier_details as sd ON sd.supplierID = ps.supplierID";
    $read = mysqli_query($conn, $read);

    while ($row = mysqli_fetch_assoc($read)) {
        ?>

        <tr>
            <td><?php echo $row['productID']; ?></td>
            <td><?php echo $row['productName']; ?></td>
            <td><?php echo $row['unitPrice']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><?php echo $row['supplierName']; ?></td>
            <td><?php echo $row['dateReceived']; ?></td>
            <td><a href="forms/editProduct.php?productID=<?php echo $row['productID'] ?>&supplierID=<?php echo $row['supplierID']; ?>">Edit</a></td>
            <td><a href="forms/deleteProduct.php?productID=<?php echo $row['productID'] ?>&supplierID=<?php echo $row['supplierID']; ?>">Delete</a></td>
        </tr>

        <?php
    }

    ?>
</table>

</body>
</html>