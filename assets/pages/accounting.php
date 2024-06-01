<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Receipt Tracker</title>
    <link rel="stylesheet" href="../css/accounting.css">
</head>
<body>
    <header class="headerClass">
        <div class="headerR">
            <h1> Receipt Tracker <h1>
            <a href="newAccount.php" class="addUser">Add User</a>
            <a href="addReceipt.php" class="addReceipt">Add Receipt</a>
        </div>
    </header>
    <div class="accounting">
        <h2>Welcome, Accounting!</h2>
        <div><p>Add account now! <a href="newAccount.php">Click Here.</a></p></div>
        <footer>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </footer>
    </div>
    <script src="../js/accounting.js"></script>
</body>
</html>