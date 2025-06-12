<?php
session_start();
require_once '../../connect.php'; // make sure this path is correct

$newuser = $_POST['newuser'] ?? '';
$newpass = $_POST['newpass'] ?? '';
$confirmpass = $_POST['confirmpass'] ?? '';

// Basic check
if (empty($newuser) || empty($newpass) || empty($confirmpass)) {
    echo "<h2>Error: All fields are required.</h2>";
    echo "<p><a href='../../register.html'>Back to Register</a></p>";
    exit;
}

// Password match
if ($newpass !== $confirmpass) {
    echo "<h2>Error: Passwords do not match.</h2>";
    echo "<p><a href='../../register.html'>Back to Register</a></p>";
    exit;
}

// Hash password
$hashedPassword = password_hash($newpass, PASSWORD_DEFAULT);

// Insert into database
$stmt = $connection->prepare("INSERT INTO user (username, password, isAdmin) VALUES (?, ?, 0)");

if ($stmt) {
    $stmt->bind_param("ss", $newuser, $hashedPassword);

    if ($stmt->execute()) {
        // Set session
        $_SESSION['username'] = $newuser;
        $_SESSION['isAdmin'] = 0;

        // ✅ Redirect user
        header("Location: ../../movies.html");
        exit;
    } else {
        if ($connection->errno === 1062) {
            echo "<h2>Error: Username already exists.</h2>";
        } else {
            echo "<h2>Registration failed. Try again later.</h2>";
        }
        echo "<p><a href='../../register.html'>Back to Register</a></p>";
    }

    $stmt->close();
} else {
    echo "<h2>Database error. Please contact admin.</h2>";
    echo "<p><a href='../../register.html'>Back to Register</a></p>";
}

$connection->close();
?>

