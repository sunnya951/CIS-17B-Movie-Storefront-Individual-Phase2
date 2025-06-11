<?php
require_once 'connect.php';  // Connect to DB

$newuser = $_POST['newuser'] ?? '';
$newpass = $_POST['newpass'] ?? '';
$confirmpass = $_POST['confirmpass'] ?? '';

// Basic empty field check (you also have frontend JS validation)
if (empty($newuser) || empty($newpass) || empty($confirmpass)) {
    echo "<h2>Error: All fields are required.</h2>";
    echo "<p><a href='../../register.html'>Back to Register</a></p>";
    exit;
}

// Check if passwords match
if ($newpass !== $confirmpass) {
    echo "<h2>Error: Passwords do not match.</h2>";
    echo "<p><a href='../../register.html'>Back to Register</a></p>";
    exit;
}

// Hash the password
$hashedPassword = password_hash($newpass, PASSWORD_DEFAULT);

// Prepare and execute SQL insert
$stmt = $connection->prepare("INSERT INTO user (username, password, isAdmin) VALUES (?, ?, 0)");

if ($stmt) {
    $stmt->bind_param("ss", $newuser, $hashedPassword);

    if ($stmt->execute()) {
        echo "<h2>Account created successfully!</h2>";
        echo "<p><a href='../../login.html'>Go to Login</a></p>";
    } else {
        if ($connection->errno === 1062) { // Duplicate entry
            echo "<h2>Error: Username already exists.</h2>";
        } else {
            echo "<h2>Error: Could not register user.</h2>";
        }
        echo "<p><a href='../../register.html'>Back to Register</a></p>";
    }

    $stmt->close();
} else {
    echo "<h2>Database error: Unable to prepare statement.</h2>";
    echo "<p><a href='../../register.html'>Back to Register</a></p>";
}

$connection->close();
?>
