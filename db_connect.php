<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Direct PostgreSQL connection string
$connection_string = "postgresql://lostfound_db_user:YO6QeIeDr8NLr8wSko7FwP1Se8CH7UOD@dpg-d0fn3o3e5dus73f3f9b0-a.frankfurt-postgres.render.com/lostfound_db";

// Create PostgreSQL connection
$conn = pg_connect($connection_string);

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
