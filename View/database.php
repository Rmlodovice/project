<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die
    ("Something went wrong;");
}
// Check if action is to delete a user
if (isset($_POST['action']) && $_POST['action'] == 'deleteUser') {
    // Get email from POST data
    $email = $_POST['email'];

    // Prepare and execute delete query
    $sql = "DELETE FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Check if any rows were affected
    if (mysqli_affected_rows($conn) > 0) {
        echo "User deleted successfully.";
    } else {
        echo "No user found with that email.";
    }
}

?>
