<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="../dash.css">
    <style>
        a {
            text-decoration: none;
            color: inherit;
        }
        .container div:hover {
            background-color: #0a75da66;
            transition-duration: 0.25s;
        }
    </style>
</head>
<body>
    
<?php include("mnavbar.php"); ?>
    <center><h1>Dashboard</h1></center>    

<div class="container">
    <div><a href="accounts.php"><h1>Staff Accounts</h1></a></div>
    <div><a href="transactions.php"><h1>Transactions</h1></a></div>
    <div><a href="inventory.php"><h1>Inventory</h1></a></div>
    <div><a href="customers.php"><h1>Customers</h1></a></div>
    <div><a href="suppliers.php"><h1>Suppliers</h1></a></div>
</div>

</body>
</html>