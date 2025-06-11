<?php
session_start();
require_once('connect.php');

// Redirect if not admin
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) {
    header("Location: index.html");
    exit;
}

// Handle update submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $update = $connection->prepare("UPDATE movies SET price = ?, stock = ? WHERE id = ?");
    $update->bind_param("dii", $price, $stock, $id);
    $update->execute();
}

// Fetch movie data
$result = $connection->query("SELECT * FROM movies");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Inventory - Sunny's Movie Emporium</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Inventory Panel</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="movies.html">Browse Movies</a></li>
                <li><a href="login.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Manage Inventory</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Price ($)</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
            <?php while ($movie = $result->fetch_assoc()): ?>
            <tr>
                <form method="POST" action="admin.php">
                    <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                    <td><?= htmlspecialchars($movie['title']) ?></td>
                    <td><?= htmlspecialchars($movie['genre']) ?></td>
                    <td><input type="number" step="0.01" name="price" value="<?= $movie['price'] ?>"></td>
                    <td><input type="number" name="stock" value="<?= $movie['stock'] ?>"></td>
                    <td><button type="submit">Update</button></td>
                </form>
            </tr>
            <?php endwhile; ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2025 Sunny's Movie Emporium</p>
    </footer>
</body>
</html>

