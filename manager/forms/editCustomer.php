<?php

include("../../config.php");
include("../../crud.php");

$customers = new Customers($conn);

$cID = $_GET['customerID'];
$read = "SELECT * FROM customer_details WHERE customerID = $cID";
$fetch = mysqli_fetch_assoc(mysqli_query($conn, $read));

if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $customers->editCustomer($cID, $lname, $fname, $number, $email);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Customer</title>
</head>
<body>

<?php include('mnavbar.php'); ?>
    <center>
        <h1>Adding Customer</h1>
        <h2><button onclick="location.href='../customers.php'">Back</button></h2>
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
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $fetch['email'] ?>"></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><input type="text" name="number" required value="<?php echo $fetch['contactNo'] ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button name="submit" style="width: 100%">Submit</button></td>
        </tr>
    </table>
</form>
    
</body>
</html>