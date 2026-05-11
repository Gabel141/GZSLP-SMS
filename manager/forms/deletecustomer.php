<?php

include("../../config.php");
include("../../crud.php");

$customers = new Customers($conn);

$cID = $_GET['customerID'];

if (isset($_POST['confirm'])){
    $customers->deleteCustomer($cID);
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
        <h1>Deleting Customer</h1>
        <h2><button onclick="location.href='../customers.php'">Back</button></h2>
    </center>

<form method="POST">

    <div style="text-align:center;">
        <h1>Are You Sure?</h1>
        <h2>Deleting Account: <?php echo $cID ?></h2>

        <button name="confirm">Confirm Delete!</button>

    </div>

</form>

</body>
</html>