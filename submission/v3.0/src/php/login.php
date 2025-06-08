<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === 'admin' && $password === 'admin') {
    echo "<h2>Welcome, Admin!</h2>";
} else {
    echo "<h2>Login failed. Please try again.</h2>";
}
?>