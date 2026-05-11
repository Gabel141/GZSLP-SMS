<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
    
    <nav class="navigation">
        <button class="sidebar-toggle" id="sidebarToggle">☰ Menu</button>
        <div class="menu-bar">
        <div><a href="../mdash.php">Home</a></div>

        </div>
        <div class="nonnav" style="margin-left: auto;"><a href="../index.php"><div class="nav">Logout</div></a></div>
    </nav>
    <!-- <nav class="navigation">
        <div class="nonnav"><a href="mdash.php"><div class="nav">Home</div></a></div>
        <div class="nonnav"><a href="transactions.php"><div class="nav">Transactions</div></a></div>
        <div class="nonnav"><a href="inventory.php"><div class="nav">Inventory</div></a></div>
        <div class="nonnav"><a href="customers.php"><div class="nav">Customers</div></a></div>
        <div class="nonnav"><a href="accounts.php"><div class="nav">Accounts</div></a></div>
        <div class="nonnav" style="margin-left: auto;"><a href="../index.php"><div class="nav">Logout</div></a></div>
    </nav> -->
    <div class="sidebar" id="sidebar">
        <a href="../mdash.php">Home</a>
        <a href="../accounts.php">Accounts</a>
        <a href="../transactions.php">Transactions</a>
        <a href="../inventory.php">Inventory</a>
        <a href="../customers.php">Customers</a>
        <a href="../suppliers.php">Suppliers</a>
    </div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

</body>
</html>
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('sidebarToggle');

        function openSidebar() {
            sidebar.classList.add('sidebar-open');
            overlay.classList.add('overlay-visible');
        }

        function closeSidebar() {
            sidebar.classList.remove('sidebar-open');
            overlay.classList.remove('overlay-visible');
        }

        toggle.addEventListener('click', openSidebar);
        overlay.addEventListener('click', closeSidebar);
    </script>