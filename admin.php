<?php
session_start();

// Redirect if not logged in or not admin
if (!isset($_SESSION['username']) || !$_SESSION['isAdmin']) {
    echo "<h2>Access Denied</h2>";
    echo "<p>This page is only accessible to administrators.</p>";
    echo "<p><a href='index.html'>Return to Home</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Sunny's Movie Emporium</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="movies.html">Browse Movies</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Welcome, Admin <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
        <p>This is where you’ll manage inventory, stock, and pricing.</p>
    </main>

    <footer>
        <p>&copy; 2025 Sunny's Movie Emporium</p>
    </footer>
</body>
</html>
