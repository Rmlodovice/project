<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/accounting.css">
    <link rel="icon" href="assets/image/iconTabLogo.png" type="image/png">
    
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "../assets/css/pages/database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: ../assets/css/pages/dashboard.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
    <div id="form" method="post">
        <form action="" >
            <label>Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label>Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button id="loginButton">Login</button>
        </form>
    </div>
    <script src="../assets/js/accounting.js"></script>
</body>
</html>
