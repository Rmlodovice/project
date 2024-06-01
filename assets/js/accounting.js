document.addEventListener('DOMContentLoaded', function() {
    var loginButton = document.getElementById('loginButton');
    loginButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission

        var usernameInput = document.getElementById('username');
        var passwordInput = document.getElementById('password');
        var username = usernameInput.value.trim().toLowerCase();
        var password = passwordInput.value.trim().toLowerCase();

        if (username === "admin@gmail.com" && password === "admin") {
            window.location.href = "../assets/pages/dashboard.php"
            alert('Welcome, Admin!');
        } else if (username === "accounting@gmail.com" && password === "accounting") {
            window.location.href = "../assets/pages/accounting.php"
            alert('Welcome, Accounting!');
        } else {
            alert('Incorrect username or password!');
        }



        // Clear input fields after login attempt
        usernameInput.value = '';
        passwordInput.value = '';
    });
});
