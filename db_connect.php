<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// MySQL connection details
$servername = "sql103.infinityfree.com";  // Hostname
$username = "if0_38917953";              // MySQL Username
$password = "masika16072002";            // Your vPanel Password (use this in the script)
$dbname = "if0_38917953_lost_found";     // Database name

// Create connection using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to MySQL database!";
?>
