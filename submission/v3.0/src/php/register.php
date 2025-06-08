<?php
$newuser = $_POST['newuser'] ?? '';
$newpass = $_POST['newpass'] ?? '';

if (!empty($newuser) && !empty($newpass)) {
    echo "<h2>User '$newuser' registered successfully (simulated)</h2>";
} else {
    echo "<h2>Error: Please fill in all fields.</h2>";
}
?>