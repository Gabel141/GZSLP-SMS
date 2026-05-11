<?php

include("../../config.php");
include("../../crud.php");

$account = new Accounts($conn);

$aID = $_GET['accountID'];
$eID = $_GET['employeeID'];
$user = $_GET['username'];

$read = "SELECT ed.employeeID, a.accountID, ed.lastName, ed.firstName, ed.salary, ed.role, ed.email, ed.contactNo, a.username FROM employee_details as ed JOIN emplacc as ea ON ed.employeeID = ea.employeeID JOIN accounts as a ON ea.accountID = a.accountID WHERE ed.employeeID = $eID";
$read = mysqli_query($conn, $read);

$fetch = mysqli_fetch_assoc($read);

if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $account->updateAccount($lname, $fname, $salary, $role, $email, $number, $username, $password, $eID, $aID);
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
        <h1>Editing Account</h1>
        <h2><button onclick="location.href='../accounts.php'">Back</button></h2>
    </center>

<form method="POST">
    <table style="margin: auto;">
        <tr>
            <th colspan="2" style="padding-top: 5%; padding-bottom: 5%">Personal Details</th>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="lname" required value="<?php echo $fetch['lastName'] ?>"></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="fname" required value="<?php echo $fetch['firstName'] ?>"></td>
        </tr>
        <tr>
            <td>Salary</td>
            <td><input type="number" step="0.01" name="salary" required value="<?php echo $fetch['salary'] ?>"></td>
        </tr>

        <?php
        
        if ($fetch['role'] == "Employee") {
            ?>
        <tr>
            <td>Role</td>
            <td><select name="role" value="<?php echo $fetch['role'] ?>"> <!--FIX THIS-->
                <option selected value="Employee">
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
            <?php
        }
        else if ($fetch['role'] == "Manager") {
        ?>

        <tr>
            <td>Role</td>
            <td><select name="role" value="<?php echo $fetch['role'] ?>"> <!--FIX THIS-->
                <option value="Employee">
                    Employee
                </option>
                <option selected value="Manager">
                    Manager
                </option>
                <option value="Executive">
                    Executive
                </option>
            </select></td>
        </tr>


        <?php
        }
        else if ($fetch['role' == "Executive"]) {
            ?>
            
        <tr>
            <td>Role</td>
            <td><select name="role" value="<?php echo $fetch['role'] ?>"> <!--FIX THIS-->
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


            <?php
        }
        
        ?>

        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $fetch['email'] ?>"></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><input type="text" name="number" required value="<?php echo $fetch['contactNo'] ?>"></td>
        </tr>
        <tr>
            <th colspan="2" style="padding-top: 5%; padding-bottom: 5%">Account Credentials</th>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required value="<?php echo $fetch['username'] ?>"></td>
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