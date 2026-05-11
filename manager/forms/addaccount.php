<?php

include("../../config.php");
include("../../crud.php");

$account = new Accounts($conn);

if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $account->addAccount($lname, $fname, $salary, $role, $email, $number, $username, $password);
}

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

<?php include('mnavbar.php'); ?>
    <center>
        <h1>Accounts</h1>
        <h2><button onclick="location.href='../accounts.php'">Back</button></h2>
    </center>

<form method="POST">
    <table style="margin: auto;">
        <tr>
            <th colspan="2" style="padding-top: 5%; padding-bottom: 5%">Personal Details</th>
        </tr>
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
            <td><select name="role">
                <option value="Employee">
                    Employee
                </option>
                <option value="Manager">
                    Manager
                </option>
                <option value="Executive">
                    Executive
                </option>
            </select></td>
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
            <th colspan="2" style="padding-top: 5%; padding-bottom: 5%">Account Credentials</th>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2"><button name="submit" style="width: 100%">Submit</button></td>
        </tr>
    </table>
</form>
    
</body>
</html>