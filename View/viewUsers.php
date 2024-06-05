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
    echo "<a style='text-decoration: none;' href='dashboard.php'>Back</a>";
    echo "</table>";
    echo "</div>";

    $result->free();
}

$mysqli->close();
?>
