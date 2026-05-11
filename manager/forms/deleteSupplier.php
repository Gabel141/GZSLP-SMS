<?php

include("../../config.php");
include("../../crud.php");

$supplier = new Supplier($conn);

$sID = $_GET['supplierID'];
if (isset($_POST['confirm'])){
    $supplier->deleteSupplier($sID);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Supplier</title>
</head>
<body>
    


<?php include('mnavbar.php'); ?>
    <center>
        <h1>Deleting Supplier</h1>
        <h2><button onclick="location.href='../suppliers.php'">Back</button></h2>
    </center>

<form method="POST">

    <div style="text-align:center;">
        <h1>Are You Sure?</h1>
        <h2>Deleting Supplier: <?php echo $sID ?></h2>

        <button name="confirm">Confirm Delete!</button>

    </div>

</form>

</body>
</html>