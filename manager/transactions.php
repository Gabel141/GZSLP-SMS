<?php

include("../config.php");
include("../crud.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
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
    <h1>Transactions</h1>
    <h2><button class="btn-1" onclick="location.href='forms/addTransaction.php'">Add Transaction</button></h2>
</center>    
 
<table class="list" style="width: 100%; text-align: center;">
    <tr>
        <th><p>ID</p></th>
        <th>Product</th>
        <th>Customer</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Employee</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php
    
    $read = "
        SELECT t.transactionID, p.productName, CONCAT(c.lastName, ' ', c.firstName) as CustomerName, td.quantity, td.date, e.lastName FROM transactions t
        JOIN employee_details e ON e.employeeID = t.employeeID
        JOIN customer_details c ON c.customerID = t.customerID
        JOIN product_details p ON p.productID = t.productID
        JOIN transaction_details td ON td.transactionID = t.transactionID";

    $read = mysqli_query($conn, $read);
    while ($row = mysqli_fetch_assoc($read)) {

        ?>

            <td><?php echo $row['transactionID'] ?></td>
            <td><?php echo $row['productName'] ?></td>
            <td><?php echo $row['CustomerName'] ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['lastName'] ?></td>
            <td><a href="forms/editTransactions.php?transactionID=<?php echo $row['transactionID'] ?>">Edit</a></td>
            <td><a href="forms/deleteTransaction.php?transactionID=<?php echo $row['transactionID'] ?>">Delete</a></td>

        <?php

    }

    ?>

</table>


</body>
</html>