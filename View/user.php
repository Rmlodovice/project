<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'yes') {
    header("Location: login.php");
    exit();
}

// Database connection
require_once "../assets/Database/database.php";

// Check if email is set in session
if(isset($_SESSION['email'])) {
    // Fetch user's full name based on their email
    $email = $_SESSION['email']; // Assuming you have stored the user's email in the session
    $sql = "SELECT fullName FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Check if user exists and get their full name
    $fullName = $user['fullName'] ?? '';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt Tracker</title>
    <link rel="stylesheet" href="../assets/css/accounting.css">
    <link rel="icon" href="../assets/image/iconTabLogo.png" type="image/png">
</head>
<body>
    <header class="headerClass">
        <div class="headerR">
            <h1>Receipt Tracker</h1>
            <a href="viewReceipt.php" class="View">View Receipt</a>
        </div>
    </header>
    <div class="accounting">
        <h2>Welcome, Student!</h2>
        <div><p>View History now! <a href="viewReceipt.php">Click Here.</a></p></div>
        <footer>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </footer>
    </div>
    <script src="../js/accounting.js"></script>
</body>
</html>
