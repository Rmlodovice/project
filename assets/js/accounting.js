document.addEventListener('DOMContentLoaded', function() {
    var loginButton = document.getElementById('loginButton');
    loginButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission

        var emailInput = document.getElementById('email');
        var passwordInput = document.getElementById('password');
        var email = emailInput.value.trim().toLowerCase();
        var password = passwordInput.value.trim();

        // Check if email and password are admin
        if (email === "admin@gmail.com" && password === "admin") {
            window.location.href = "../assets/pages/dashboard.php";
            alert('Welcome, Admin!');
            return;
        }

        // Check if email and password are accounting
        if (email === "accounting@gmail.com" && password === "accounting") {
            window.location.href = "../assets/pages/accounting.php";
            alert('Welcome, Accounting!');
            return;
        }

        // Make an AJAX request to login.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "login.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                if (response === "success") {
                    // Redirect user to dashboard upon successful login
                    window.location.href = "../assets/pages/dashboard.php";
                } else {
                    alert(response); // Show error message
                }
            }
        };
        xhr.send("email=" + email + "&password=" + password + "&login=true");

        // Clear input fields after login attempt
        emailInput.value = '';
        passwordInput.value = '';
    });
});
