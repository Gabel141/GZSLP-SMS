<?php

include('config.php');

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $login = "SELECT * FROM accounts WHERE username = '$user'";
    $read = mysqli_query($conn, $login);
    if (mysqli_num_rows($read) != 0) {
        $fetch = mysqli_fetch_assoc($read);
        $id = $fetch['accountID'];
        if ($fetch['password'] == $pass) {
            $account = "SELECT ed.role FROM employee_details ed JOIN emplacc e ON e.employeeID = ed.employeeID JOIN accounts a ON e.accountID = a.accountID WHERE a.accountID = $id";
            $getAcc = mysqli_fetch_assoc(mysqli_query($conn, $account));
            if ($getAcc['role'] == "Employee") {
                echo "<script>window.location.replace('employee/edash.php');</script>";
            } else {
                echo "<script>window.location.replace('manager/mdash.php');</script>";
            }
        } else {
            echo "
            <script>
                alert('Wrong username or password');
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Wrong username or password');
        </script>
        ";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic Zone</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <nav class="navigation">
        <div class="nonnav"><a href="employee/edash.php"><div class="nav">Employee</div></a></div>
        <div class="nonnav"><a href="manager/mdash.php"><div class="nav">Manager</div></a></div>

    </nav>

<center>
    <h1>LOGIN</h1>
</center>

<form method="POST">
    <table style="margin: auto;">
        <tr>
            <th>Username</th>
        </tr>
        <tr>
            <td>
                <input type="text" name="username" required>
            </td>
        </tr>
        <tr>
            <th>Password</th>
        </tr>
        <tr>
            <td>
                <input type="password" name="password" required>
            </td>
        </tr>
        <tr>
            <td><button style="width: 100%" name="submit">Submit</button></td>
        </tr>
    </table>
</form>

</body>
</html>