<?php
    // Database credentials for local development
    define("DB_IP", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DB", "moviestore_db");  // your local database name

    try {
        $connection = new mysqli(DB_IP, DB_USER, DB_PASS, DB_DB);

        // If there's a connection error
        if ($connection->connect_errno > 0) {
            echo "Error connecting to the database.";
        }
    } catch (Exception $e) {
        debug($e);
    }

    function debug(...$args) {
        echo "<pre>";
        print_r($args);
        echo "</pre>";
    }
?>

