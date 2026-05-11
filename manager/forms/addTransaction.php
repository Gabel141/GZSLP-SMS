<?php

include("../../config.php");
include("../../crud.php");

$transactions = new Transactions($conn);

if (isset($_POST['submit'])) {
    $product = $_POST['product'];
    $customer = $_POST['customer'];
    $employee = $_POST['employee'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];


    $transactions->addTransaction($product, $customer, $employee, $date, $quantity);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Transaction</title>
</head>
<body>

<?php include('mnavbar.php'); ?>
    <center>
        <h1>Adding Transaction</h1>
        <h2><button onclick="location.href='../transactions.php'">Back</button></h2>
    </center>

<form method="POST">
    <table style="margin: auto;">
        <tr>
            <th colspan="2" style="padding-top: 5%; padding-bottom: 5%">Transactions Details</th>
        </tr>
        <tr>
            <td>Product</td>
            <td><select name="product">
                <?php
                $read = "SELECT productID, productName FROM product_details";
                $read = mysqli_query($conn, $read);
                
                while ($row = mysqli_fetch_assoc($read)) {

                    ?>

                    <option value="<?php echo $row['productID']; ?>">
                        <?php echo $row['productName']; ?>
                    </option>

                    <?php

                }
                

                ?>
            </select></td>
        </tr>
        <tr>
            <td>Customer</td>
            <td><select name="customer">
                <option value="">

                </option>
                <?php
                $read = "SELECT customerID, lastName, firstName FROM customer_details";
                $read = mysqli_query($conn, $read);
                
                while ($row = mysqli_fetch_assoc($read)) {

                    ?>

                    <option value="<?php echo $row['customerID']; ?>">
                        <?php echo $row['lastName'] . ', ' . $row['firstName'] ?>
                    </option>

                    <?php

                }
                

                ?>
            </select></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="number" name="quantity" step="1" required></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="datetime-local" name="date" required></td>
        </tr>
        <tr>
            <td>Employee</td>            
            <td><select name="employee">
                <?php
                $read = "SELECT employeeID, lastName, firstName FROM employee_details";
                $read = mysqli_query($conn, $read);
                
                while ($row = mysqli_fetch_assoc($read)) {

                    ?>

                    <option value="<?php echo $row['employeeID']; ?>">
                        <?php echo $row['lastName'] . ', ' . $row['firstName']; ?>
                    </option>

                    <?php

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