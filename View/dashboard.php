<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Tracker</title>
    <link rel="stylesheet" href="../assets/css/accounting.css">
    <link rel="icon" href="../assets/image/iconTabLogo.png" type="image/png">
</head>
<body>
    <header>
        <div class="headerR">
            <h1>Receipt Tracker</h1>
            <a href="#" class="delete">Delete User</a>
            <a style='text-decoration: none; font-size: 30px; margin-right: 12rem;' href="viewUsers.php">View Users</a>
        </div>
    </header>
    <div class="admin">
        <h2>Welcome, Admin!</h2>
        <footer>
            <a href="../index.php" class="btn btn-danger">Logout</a>
        </footer>
    </div>
 
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteLink = document.querySelector(".delete");

            deleteLink.addEventListener("click", function(e) {
                e.preventDefault();

                var searchContainer = document.getElementById("searchContainer");

                if (!searchContainer) {
                    var searchContainerHTML = '<div id="searchContainer"><input type="text" id="emailSearch" placeholder="Search by email"><button id="searchBtn">Delete Account</button></div>';
                    document.querySelector(".admin").insertAdjacentHTML('beforeend', searchContainerHTML);

                    document.getElementById("searchBtn").addEventListener("click", function() {
                        var email = document.getElementById("emailSearch").value;

                        // Confirm deletion
                        var confirmed = confirm("Are you sure you want to delete the user with the email: " + email + "?");

                        if (confirmed) {
                            fetch('../assets/Database/database.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: 'action=deleteUser&email=' + email
                            })
                            .then(function(response) {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.text();
                            })
                            .then(function(data) {
                                if (data === "User deleted successfully.") {
                                    alert("Deleted Successfully!");
                                    location.reload();
                                } else {
                                    alert("No user found with that email.");
                                }
                            })
                            .catch(function(error) {
                                console.error('There was a problem with the fetch operation:', error);
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
