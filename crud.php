<?php

class Transactions {

    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function addTransaction($pID, $cID, $eID, $date, $quantity) {

        $insert = "INSERT INTO transaction_details (date, quantity) VALUES ('$date', $quantity)";

        if (mysqli_query($this->conn, $insert)) {
            
            $getID = "SELECT * FROM transaction_details WHERE quantity = $quantity AND `date` = '$date'";
            $get = mysqli_query($this->conn, $getID);

            $fetch = mysqli_fetch_assoc($get);
            $tID = $fetch['transactionID'];

            $bind = "INSERT INTO transactions (transactionID, productID, customerID, employeeID) VALUES ($tID, $pID, $cID, $eID)";

            mysqli_query($this->conn, $bind);

            echo "
            <script>
                alert('Transaction Created!');
                window.location.replace('../transactions.php');
            </script>
            ";
        }             
        else {
            echo "
                <script>
                    alert('Insert Failed!');
                </script>";
            }



    }

    function editTransaction($tID, $pID, $cID, $eID, $date, $quantity) {
        $updateDeets = "UPDATE transactions SET productID = $pID, customerID = $cID, employeeID = $eID WHERE transactionID = $tID";
        $updateTrans = "UPDATE transaction_details SET date='$date', quantity = $quantity WHERE transactionID = $tID";

        if (mysqli_query($this->conn, $updateDeets) AND mysqli_query($this->conn, $updateTrans)) {
            echo "
            <script>
                alert('Transaction Updated!');
                window.location.replace('../transactions.php');
            </script>
            ";

        }
    }

}

class Customers {

    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function addCustomer($lname, $fname, $phone, $email) {
        
        $checkExist = "SELECT * FROM customer_details WHERE lastName = '$lname' AND firstName = '$fname' AND contactNo = '$email' AND contactNo = '$phone'";
        $check = mysqli_query($this->conn, $checkExist);

        if (mysqli_num_rows($check) == 0) {

            $insert = "INSERT INTO customer_details (lastName, firstName, email, contactNo) VALUES ('$lname', '$fname', '$email', '$phone')";

            if (mysqli_query($this->conn, $insert)) {
                echo "
                <script>
                    alert('Customer Created!');
                    window.location.replace('../customers.php');
                </script>
                ";

            }
            else {
                echo "
                    <script>
                        alert('Insert Failed!');
                    </script>";
            }

        }
        
    }

    function deleteCustomer($id) {

    
    try {
        $delete = "DELETE FROM customer_details WHERE customerID = $id";

        if (mysqli_query($this->conn, $delete)) {
            echo "
                <script>
                    alert('Customer Deleted!!');
                    window.location.replace('../customers.php');
                </script>
            ";
        } else {
                echo "
                    <script>
                        alert('Delete Failed!!');
                        window.location.replace('../customers.php');
                    </script>
                ";

        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) {
            error_log($e->getMessage());
            echo "<script>alert('Cannot delete customer while they are selected as a customer on the transactions table.');</script>";
        } else {
            error_log($e->getMessage());
        }
    }
    }

    function editCustomer($id, $lname, $fname, $phone, $email) {

        $update = "UPDATE customer_details SET lastName = '$lname', firstName = '$fname', contactNo = '$phone', email = '$email' WHERE customerID = $id";

        if (mysqli_query($this->conn, $update)) {
            echo "
                <script>
                    alert('Customer Updated!!');
                    window.location.replace('../customers.php');
                </script>
            ";

        }

    }
}


class Inventory {

    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function addProduct($name, $price, $stock, $dateReceived, $supplierID) {

        $checkExisting = "SELECT * FROM product_details WHERE productName = '$name'";
        $check = mysqli_query($this->conn, $checkExisting);

        if (mysqli_num_rows($check) == 0 ) {

            $addProduct = "INSERT INTO product_details (productName, unitPrice, stock, dateReceived) VALUES ('$name', $price, $stock, '$dateReceived')";

            if (mysqli_query($this->conn, $addProduct)) {

                $getID = "SELECT productID FROM product_details WHERE productName = '$name' AND dateReceived = '$dateReceived'";
                $get = mysqli_query($this->conn, $getID);

                $fetch = mysqli_fetch_assoc($get);
                $pID = $fetch['productID'];

                $bind = "INSERT INTO prodsupp (productID, supplierID) VALUES ($pID, $supplierID)";
                mysqli_query($this->conn, $bind);

                echo "
                    <script>
                        alert('Product Created!');
                        window.location.replace('../inventory.php');
                    </script>
                ";


            }

        }

        else {

            echo "<script>alert('Account already exists!');</script>";

        }

    }

    function deleteProduct($pID, $sID) {
        try {
            $delete = "DELETE FROM prodsupp WHERE productID = $pID AND supplierID = $sID";

            if (mysqli_query($this->conn, $delete)) {
                $deleteProduct = "DELETE FROM product_details WHERE productID = $pID";

                mysqli_query($this->conn, $deleteProduct);
                echo "
                    <script>
                        alert('Product Deleted!!');
                        window.location.replace('../inventory.php');
                    </script>
                ";
            } else {
                    echo "
                        <script>
                            alert('Delete Failed!!');
                            window.location.replace('../inventory.php');
                        </script>
                    ";

            }   
            
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1451) {
                error_log($e->getMessage());
                echo "<script>alert('Cannot delete a supplier while it is marked as supplying a product. Please check the inventory table.');</script>";
            } else {
                error_log($e->getMessage());
            }
        }   
    }

    function editProduct($id, $name, $price, $stock, $date, $supplier) {

        $update = "UPDATE product_details SET productName = '$name', unitPrice = $price, stock = $stock, dateReceived = '$date' WHERE productID = $id";

        if (mysqli_query($this->conn, $update)) {
            $rebind = "UPDATE prodsupp SET supplierID = $supplier WHERE productID = $id";
            mysqli_query($this->conn, $rebind); 
                echo "
                    <script>
                        alert('Product Updated!!');
                        window.location.replace('../inventory.php');
                    </script>
                ";

        }

    }
}

class Supplier {


    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function addSupplier($name, $phone, $email) {
        
        $checkExist = "SELECT * FROM supplier_details WHERE supplierName = '$name'  AND contactNo = '$email' AND contactNo = '$phone'";
        $check = mysqli_query($this->conn, $checkExist);

        if (mysqli_num_rows($check) == 0) {

            $insert = "INSERT INTO supplier_details (supplierName, email, contactNo) VALUES ('$name', '$email', '$phone')";

            if (mysqli_query($this->conn, $insert)) {
                echo "
                <script>
                    alert('Supplier Created!');
                    window.location.replace('../suppliers.php');
                </script>
                ";

            }
            else {
                echo "
                    <script>
                        alert('Insert Failed!');
                    </script>";
            }

        }
        
    }

    
    function deleteSupplier($id) {

    try {
        $delete = "DELETE FROM supplier_details WHERE supplierID = $id";

        if (mysqli_query($this->conn, $delete)) {
            echo "
                <script>
                    alert('Supplier Deleted!!');
                    window.location.replace('../suppliers.php');
                </script>
            ";
        } else {
                echo "
                    <script>
                        alert('Delete Failed!!');
                        window.location.replace('../suppliers.php');
                    </script>
                ";

        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) {
            error_log($e->getMessage());
            echo "<script>alert('Cannot delete a supplier while it is marked as supplying a product. Please check the inventory table.');</script>";
        } else {
            error_log($e->getMessage());
        }
    }
    }

    function updateSupplier($id, $name, $phone, $email) {

        $update = "UPDATE supplier_details SET supplierID = $id, supplierName = '$name', contactNo = '$phone', email = '$email'";

        if (mysqli_query($this->conn, $update)) {
                echo "
                    <script>
                        alert('Supplier Updated!');
                        window.location.replace('../suppliers.php');
                    </script>
                ";

        }
    }

}

class Accounts {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function addAccount($lname, $fname, $salary, $role, $email, $contactNo, $user, $pass) {

        $checkExisting = "SELECT * FROM accounts WHERE username = '$user'";
        $check = mysqli_query($this->conn, $checkExisting);

        if (mysqli_num_rows($check) == 0 ) {

            $addDetail = "INSERT INTO employee_details (lastName, firstName, salary, `role`, email, contactNo) VALUES ('$lname', '$fname', $salary, '$role', '$email', '$contactNo')";
            $addAccount = "INSERT INTO accounts (username, `password`) VALUES ('$user', '$pass')";

            if (mysqli_query($this->conn, $addDetail) AND mysqli_query($this->conn, $addAccount)) {
                $getID = "SELECT employeeID FROM employee_details WHERE lastName = '$lname' AND firstName = '$fname' AND contactNo = '$contactNo' ";
                $get = mysqli_query($this->conn,$getID);

                $fetch = mysqli_fetch_assoc($get);
                $eID = $fetch['employeeID'];
                
                $getID = "SELECT accountID FROM accounts WHERE username = '$user' AND `password` = '$pass' ";
                $get = mysqli_query($this->conn,$getID);

                $fetch = mysqli_fetch_assoc($get);
                $aID = $fetch['accountID'];

                $bind = "INSERT INTO emplacc (employeeID, accountID) VALUES ($eID, $aID)";
                mysqli_query($this->conn, $bind);

                echo "
                    <script>
                        alert('Account Created!');
                        window.location.replace('../accounts.php');
                    </script>
                ";


            }

        }

        else {

            echo "<script>alert('Account already exists!');</script>";

        }

    }

    function deleteAccount($aID, $eID) {

        try {
            $delete = "DELETE FROM emplacc WHERE employeeID = $eID AND accountID = $aID";
            if (mysqli_query($this->conn, $delete)) {
                $accDelete = "DELETE FROM accounts WHERE accountID = $aID";
                mysqli_query($this->conn, $accDelete);

                $empDelete = "DELETE FROM employee_details WHERE employeeID = $eID";
                mysqli_query($this->conn, $empDelete);

                echo "
                <script>
                    alert('Delete Success!');
                    window.location.replace('../accounts.php');
                </script>";
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1451) {
                error_log($e->getMessage());
                echo "<script>alert('Cannot delete an employee acount while it is used in the transaction table.');</script>";
            } else {
                error_log($e->getMessage());
            }
        }
    }

    function updateAccount($lname, $fname, $salary, $role, $email, $phone, $user, $pass, $eID, $aID) {
        
        $updateDeets = "UPDATE employee_details SET lastName = '$lname', firstName = '$fname', salary = $salary, `role` = '$role', email = '$email', contactNo = '$phone' WHERE employeeID = $eID";
        $updateAcc = "UPDATE accounts SET username = '$user', `password` = '$pass' WHERE accountID = $aID";

        try {
            if (mysqli_query($this->conn, $updateDeets) AND mysqli_query($this->conn, $updateAcc)) {
                echo "
                    <script>
                        alert('Update Success!');
                        window.location.replace('../accounts.php');
                    </script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }
    }

}

class Employees {
    
}
?>
