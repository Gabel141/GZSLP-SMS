<?php

include("../../config.php");
include("../../crud.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Accounts</title>
</head>
<body>

<?php include('../mnavbar.php'); ?>
    <center>
        <h1>Accounts</h1>
        <h2><button onclick="location.href='../accounts.php'">Back</button></h2>
    </center>

<form>
    <table method="POST" style="margin: auto;">
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="lname" required></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="fname" required></td>
        </tr>
        <tr>
            <td>Salary</td>
            <td><input type="number" step="0.01" name="salary" required></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><input type="text" name="role" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><input type="text" name="number" required></td>
        </tr>
        <tr>
            <td>Building</td>
            <td><input type="text" name="building" required></td>
        </tr>
        <tr>
            <td>Street</td>
            <td><input type="text" name="street" required></td>
        </tr>
        <tr>
            <td>Province</td>
            <td><input type="text" name="province" required></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type="text" name="country" required></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2"><button name="submit" style="width: 100%">Submit</button></td>
        </tr>
    </table>
</form>
    
</body>
</html>