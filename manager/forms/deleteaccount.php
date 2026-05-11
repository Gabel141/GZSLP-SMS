<?php

include("../../config.php");
include("../../crud.php");

$accounts = new Accounts($conn);

$aID = $_GET['accountID'];
$eID = $_GET['employeeID'];
$user = $_GET['username'];

if (isset($_POST['confirm'])){
    $accounts->deleteAccount($aID, $eID);
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
        <h1>Deleting Account</h1>
        <h2><button onclick="location.href='../accounts.php'">Back</button></h2>
    </center>

<form method="POST">

    <div style="text-align:center;">
        <h1>Are You Sure?</h1>
        <h2>Deleting Account: <?php echo $user ?></h2>

        <button name="confirm">Confirm Delete!</button>

    </div>

</form>

</body>
</html>