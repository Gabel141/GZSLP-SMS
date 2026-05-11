<?php

include("../../config.php");
include("../../crud.php");

$supplier = new Supplier($conn);


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['number'];
    $email = $_POST['email'];

    $supplier->addSupplier($name, $phone, $email);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Suppliers</title>
</head>
<body>

<?php include('mnavbar.php'); ?>
    <center>
        <h1>Adding Supplier</h1>
        <h2><button onclick="location.href='../suppliers.php'">Back</button></h2>
    </center>

<form method="POST">
    <table style="margin: auto;">
        <tr>
            <th colspan="2" style="padding-top: 5%; padding-bottom: 5%">Personal Details</th>
        </tr>
        <tr>
            <td>Supplier Name</td>
            <td><input type="text" name="name" required></td>
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
            <td colspan="2"><button name="submit" style="width: 100%">Submit</button></td>
        </tr>
    </table>
</form>
    
</body>
</html>