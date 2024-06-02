<?php
include '../assets/Database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $receiptNumber = $_POST['receiptNumber'];
    $receiptValue = $_POST['receiptValue'];

    // Check if the email exists in the users table
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, insert the receipt
        $insertSql = "INSERT INTO receipt (email, receiptNumber, receiptValue) VALUES (?, ?, ?)";
        $insertStmt = mysqli_prepare($conn, $insertSql);
        mysqli_stmt_bind_param($insertStmt, "sss", $email, $receiptNumber, $receiptValue);
        mysqli_stmt_execute($insertStmt);

        if (mysqli_stmt_affected_rows($insertStmt) > 0) {
            echo "Receipt added successfully.";
        } else {
            echo "Failed to add receipt.";
        }
    } else {
        echo "No user found with that email.";
    }
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
    <form method="post" action="" class="newrecord">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email: " required><br>
        <input type="text" class="form-control" id="receiptNumber" name="receiptNumber" placeholder="Enter Receipt number: " required><br>
        <input type="text" class="form-control" id="receiptValue" name="receiptValue" placeholder="Enter Value: " required><br>
        <button type="submit">Add Receipt</button>
        <div>
        <footer>
            <p>Back to menu <a href="accounting.php" > Prev</a></p>
        </footer>
    </div>
    </form>
</body>
</html>

    