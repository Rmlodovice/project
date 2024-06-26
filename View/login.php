<?php
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "../assets/Database/database.php";

    // Check if email and password are admin
    if ($email === "admin@gmail.com" && $password === "admin") {
        session_start();
        $_SESSION["user"] = "yes";
        $_SESSION["userEmail"] = $email;  // Store the email in the session
        header("Location: ../View/adminView.php");
        exit();
    }

    // Check if email and password are accounting
    if ($email === "accounting@gmail.com" && $password === "accounting") {
        session_start();
        $_SESSION["user"] = "yes";
        $_SESSION["userEmail"] = $email;  // Store the email in the session
        header("Location: ../View/accounting.php");
        exit();
    }

    // Check email and password against database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["userEmail"] = $email;  // Store the email in the session
            header("Location: ../View/user.php");
            exit();
        } 
    } else {
        echo "Email does not exist or Password is Incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/accounting.css">
    <link rel="icon" href="../assets/image/iconTabLogo.png" type="image/png">
</head>
<body>
    <div class="container">
        <div id="form">
            <form action="login.php" method="post"> <!-- Added action attribute -->
                <label>Email:</label><br> <!-- Changed from Username to Email -->
                <input type="text" id="email" name="email" required><br> <!-- Changed id and name -->
                <label>Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit" name="login">Login</button> <!-- Added name attribute -->
            </form>
        </div>
    </div>
    <script src="../assets/js/accounting.js"></script>
</body>
</html>
