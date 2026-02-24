<?php
// config/database.php - Database configuration for Awardspace

// Database credentials - Weka hizi kutoka kwa Awardspace cPanel
define('DB_HOST', 'fdb1032.awardspace.net'); // Usually localhost or sql123.awardspace.net
define('DB_USER', '4737455_jack'); // Replace with your Awardspace username
define('DB_PASS', '1q2w3e4r5t6'); // Replace with your Awardspace password
define('DB_NAME', '4737455_jack'); // Replace with your database name

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8mb4");

// Start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Optional: Set timezone
date_default_timezone_set('Africa/Dar_es_Salaam');

// Function to get database connection
function getDB() {
    global $conn;
    return $conn;
}

// Function to close connection
function closeDB() {
    global $conn;
    if ($conn) {
        mysqli_close($conn);
    }
}
?>