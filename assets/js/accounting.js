document.addEventListener('DOMContentLoaded', function() {
    var loginButton = document.getElementById('loginButton');
    loginButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission

        var usernameInput = document.getElementById('username');
        var passwordInput = document.getElementById('password');
        var username = usernameInput.value.trim().toLowerCase();
        var password = passwordInput.value.trim().toLowerCase();

        if (username === "admin" && password === "admin") {
            window.location.href = "dashboard.php";
            alert('Welcome, admin!');
        } else {
            alert('Incorrect username or password!');
        }

        // Clear input fields after login attempt
        usernameInput.value = '';
        passwordInput.value = '';
    });
});
