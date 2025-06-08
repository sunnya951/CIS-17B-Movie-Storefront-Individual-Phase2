<?php
// Get submitted data
$newuser = $_POST['newuser'] ?? '';
$newpass = $_POST['newpass'] ?? '';
$confirmpass = $_POST['confirmpass'] ?? '';

// Validate input
if (!empty($newuser) || !empty($newpass) || empty($confirmpass)) {
    echo "<h2>Error: All fields are required.</h2>";
} elseif ($newpass !== $confirmpass) {
    echo "<h2>Error: Passwords do not match.</h2>";
} else {
    // Simulate registration success
    echo "<h2>User: '$newuser' registered successfully (simulated)</h2>";
}
?>