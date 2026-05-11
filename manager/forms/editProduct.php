<?php

include("../../config.php");
include("../../crud.php");

$inventory = new Inventory($conn);

$pID = $_GET['productID'];

$read = "SELECT * FROM product_details pd JOIN prodsupp ps ON ps.productID = pd.productID WHERE pd.productID = $pID";
$fetch = mysqli_fetch_assoc(mysqli_query($conn, $read));


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $date = $_POST['date'];
    $supplier = $_POST['supplier'];

    $inventory->editProduct($pID, $name, $price, $stock, $date, $supplier);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Product</title>
</head>
<body>

<?php include('mnavbar.php'); ?>
    <center>
        <h1>Editing Product</h1>
        <h2><button onclick="location.href='../suppliers.php'">Back</button></h2>
    </center>

<form method="POST">
    <table style="margin: auto;">
        <tr>
            <th colspan="2" style="padding-top: 5%; padding-bottom: 5%">Product Details</th>
        </tr>
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="name" required value="<?php echo $fetch['productName'] ?>"></td>
        </tr>
        <tr>
            <td>Unit Price</td>
            <td><input type="number" name="price" step="0.01" required value="<?php echo $fetch['unitPrice'] ?>"></td>
        </tr>
        <tr>
            <td>Stock</td>
            <td><input type="number" name="stock" step="1" required value="<?php echo $fetch['stock'] ?>"></td>
        </tr>
        <tr>
            <td>Date Recceived</td>
            <td><input type="date" name="date" required value="<?php echo $fetch['dateReceived'] ?>"></td>
        </tr>
        <tr>
            <td>Supplier</td>
            <td><select name="supplier">
                <?php
                $read = "SELECT * FROM supplier_details";
                $read = mysqli_query($conn, $read);

                while ($row = mysqli_fetch_assoc($read)) {
                    ?>

                    <?php 

                    if ($fetch['supplierID'] == $row['supplierID']) {
                        ?>
                            <option selected value="<?php echo $row['supplierID']; ?>">
                                <?php echo $row['supplierName']; ?>
                            </option>
                        <?php
                    }
                    
                    else {
                        ?>
                    <option value="<?php echo $row['supplierID']; ?>">
                        <?php echo $row['supplierName']; ?>
                    </option>

                        <?php
                    }
                }
                ?>
            </select></td>
        </tr>
        <tr>
            <td colspan="2"><button name="submit" style="width: 100%">Submit</button></td>
        </tr>
    </table>
</form>
    
</body>
</html>