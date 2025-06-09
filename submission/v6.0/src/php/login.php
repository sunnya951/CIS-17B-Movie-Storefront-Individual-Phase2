<?php
// Get submitted data safely
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Simple hardcoded admin login
if ($username === 'admin' && $password === 'admin') {
    echo "<h2>Welcome, Admin!</h2>";
} else if (!empty($username) && !empty($password)) {
    // Simulated non-admin user login
    echo "<h2>Welcome, $username!</h2>";
} else {
    echo "<h2>Login failed. Please try again.</h2>";
}
?>