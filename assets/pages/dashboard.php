<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Tracker</title>
    <link rel="stylesheet" href="../css/accounting.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Click event handler for Manage Users link
        $(".delete").click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Check if search input and button already exist
            if ($("#searchContainer").length === 0) {
                // Create input field for searching email
                var searchInput = '<div id="searchContainer"><input type="text" id="emailSearch" placeholder="Search by email"><button id="searchBtn">Search</button></div>';
                $(".admin").append(searchInput);

                // Click event handler for search button
                $("#searchBtn").click(function() {
                    var email = $("#emailSearch").val(); // Get email input value

                    // AJAX request to check if email exists and delete if it does
                    $.ajax({
                        url: 'database.php',
                        type: 'POST',
                        data: { action: 'deleteUser', email: email },
                        success: function(response) {
                            // Display success message or handle response
                            alert(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }
                    });
                });
            }
        });
    });
</script>

</head>
<body>
    <header>
        <div class="headerR">
            <h1>Receipt Tracker</h1>
            <a href="#" class="delete">Manage Users</a>
        </div>
    </header>
    <div class="admin">
        <h2>Welcome, Admin!</h2>
    </div>
    <footer>
        <a href="../logout/logout.php" class="btn btn-danger">Logout</a>
    </footer>
</body>
</html>