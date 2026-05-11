<?php

include("../config.php");
include("../crud.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
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
    <h1>Accounts</h1>
    <h2><button class="btn-1" onclick="location.href='forms/addaccount.php'">Add Account</button></h2>
</center>    

<table class="list" style="width: 100%; text-align: center;">
    <tr>
        <th>EmployeeID</th>
        <th>AccountID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Salary</th>
        <th>Role</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Username</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    
        $read = "SELECT ed.employeeID, a.accountID, ed.lastName, ed.firstName, ed.salary, ed.role, ed.email, ed.contactNo, a.username FROM employee_details as ed JOIN emplacc as ea ON ed.employeeID = ea.employeeID JOIN accounts as a ON ea.accountID = a.accountID";
        $read = mysqli_query($conn, $read);

        while ($row = mysqli_fetch_assoc($read)) {
        
        ?>
        <tr>
            <td><?php echo $row['accountID'] ?></td>
            <td><?php echo $row['employeeID'] ?></td>
            <td><?php echo $row['lastName'] ?></td>
            <td><?php echo $row['firstName'] ?></td>
            <td><?php echo $row['salary'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['contactNo'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><a href="forms/editAccount.php?accountID=<?php echo $row['accountID'] ?>&employeeID=<?php echo $row['employeeID']?>&username=<?php echo $row['username'] ?>">Edit</a></td>
            <td><a href="forms/deleteaccount.php?accountID=<?php echo $row['accountID'] ?>&employeeID=<?php echo $row['employeeID']?>&username=<?php echo $row['username'] ?>">Delete</a></td>
        </tr>
        
    
        <?php
        }
    

    ?>

</table>

</body>
</html>