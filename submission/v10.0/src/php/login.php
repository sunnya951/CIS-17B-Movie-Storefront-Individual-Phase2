<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Simulated admin check (username: admin, password: admin1)
if ($username === 'admin' && $password === 'admin1') {
    echo "<h2>Welcome, Admin!</h2>";
    echo "<p><a href='../../index.html'>Return to Home</a></p>";
} elseif (!empty($username) && !empty($password)) {
    echo "<h2>Welcome, $username!</h2>";
    echo "<p><a href='../../index.html'>Return to Home</a></p>";
} else {
    echo "<h2>Login failed. Please try again.</h2>";
    echo "<p><a href='../../login.html'>Back to Login</a></p>";
}
?>