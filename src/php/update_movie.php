<?php
session_start();
require_once('../../connect.php');

// Only allow access if user is admin
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) {
    http_response_code(403);
    echo "Unauthorized";
    exit;
}

// Get movie ID, new price, and stock from POST
$id = $_POST['id'] ?? '';
$price = $_POST['price'] ?? '';
$stock = $_POST['stock'] ?? '';

// Validate inputs
if (!is_numeric($id) || !is_numeric($price) || !is_numeric($stock)) {
    http_response_code(400);
    echo "Invalid input";
    exit;
}

// Update the database
$query = "UPDATE movies SET price = ?, stock = ? WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("dii", $price, $stock, $id);

if ($stmt->execute()) {
    echo "Update successful";
} else {
    http_response_code(500);
    echo "Database error";
}
?>
