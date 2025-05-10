<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db_connect.php';

// Ensure it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize inputs
    $item = $_POST['item_name'] ?? '';
    $desc = $_POST['description'] ?? '';
    $location = $_POST['location'] ?? '';
    $date = $_POST['date_lost'] ?? '';
    $img = '';

    // Validate required fields
    if (empty($item) || empty($desc) || empty($location) || empty($date)) {
        die("Please fill in all required fields.");
    }

    // Handle image upload
    if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = 'uploads/';
        $img_name = basename($_FILES["item_image"]["name"]);
        $target_file = $target_dir . $img_name;

        // Move uploaded file
        if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
            $img = $target_file;
        } else {
            die("Image upload failed.");
        }
    }

    // Insert into database using prepared statement (safe from SQL injection)
    $stmt = $conn->prepare("INSERT INTO items (item_name, description, location, date_lost, image_path) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $item, $desc, $location, $date, $img);

    if ($stmt->execute()) {
        echo "Item submitted successfully! <a href='index.php'>Back to Home</a>";
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
