<?php
session_start();
require_once('../../connect.php');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Query user by username
$query = "SELECT * FROM user WHERE username = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['isAdmin'] = $row['isAdmin'];

        if ($row['isAdmin']) {
            // Redirect admin to admin panel
            header("Location: ../../admin.php");
            exit;
        } else {
            // Redirect user to browse movies
            header("Location: ../../movies.html");
            exit;
        }
    } else {
        echo "<h2>Incorrect password.</h2>";
        echo "<p><a href='../../login.html'>Back to Login</a></p>";
    }
} else {
    echo "<h2>User not found.</h2>";
    echo "<p><a href='../../login.html'>Back to Login</a></p>";
}
?>

