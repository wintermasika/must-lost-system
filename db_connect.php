<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'sql103.infinityfree.com';       // Your InfinityFree database host
$user = 'if0_38917953';                  // Your database username (no tabs!)
$password = 'masika16072002';            // Your database password
$db = 'if0_38917953_lost_found';         // Your database name

$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
