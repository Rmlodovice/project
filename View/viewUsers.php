<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Users</title>
    <link rel="stylesheet" href="../assets/css/accounting.css">
    <link rel="icon" href="../assets/image/iconTabLogo.png" type="image/png">
</head>
<body>
    <header>
        <div class="headerR">
            <h1>Receipt Tracker</h1>
            <a style='text-decoration: none; font-size: 30px; margin-right: 12rem;' href="viewUsers.php">View Users</a>
        </div>
    </header>
    <div class="table-container">
        <?php
            $mysqli = new mysqli("localhost", "root", "", "login_register");

            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                exit();
            }

            $sql = "SELECT fullName, email FROM users ORDER BY id";

            if ($result = $mysqli->query($sql)) {
                echo "<div>";
                echo "<table style='width: 100%; color: green;'>";
                echo "<tr><th style='text-align: left;'><h1>Name</h1></th><th style='text-align: left;'><h1>Email Address</h1></th></tr>";

                while ($obj = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td style='text-align: left;'>" . $obj->fullName . "</td>";
                    echo "<td style='text-align: left;'>" . $obj->email . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";

                $result->free();
            }

            $mysqli->close();
            ?>
        </div>
        <footer>
            <a href="dashboard.php" > Back</a>
        </footer>   
    </body>
</html>