<?php
include '../assets/Database/database.php';
session_start();

// Assuming the user's email is stored in the session upon login
$userEmail = $_SESSION['userEmail'];

if (!$userEmail) {
    echo "You must be logged in to view receipts.";
    exit;
}

// Fetch receipts for the logged-in user
$sql = "SELECT * FROM receipt WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $userEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Receipt</title>
    <link rel="stylesheet" href="../assets/css/accounting.css">
    <link rel="icon" href="../assets/image/iconTabLogo.png" type="image/png">
</head>
<body>
    <header class="headerClass">
        <div class="headerR">
            <h1> Receipt Tracker </h1>
        </div>
    </header>
    <div class="table-container">
        <h1>Receipts for <?php echo htmlspecialchars($userEmail); ?></h1>   
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="tablee">
                <tr>
                    <th>Receipt Number</th>
                    <th>Receipt Value</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['receiptNumber']); ?></td>
                        <td><?php echo htmlspecialchars($row['receiptValue']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No receipts found for your account.</p>
        <?php endif; ?>
        <a href="user.php">Back</a>
    </div>
</body>
</html>
