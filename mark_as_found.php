<?php
include 'db_connect.php';  // Make sure you include your DB connection

?>

<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_id = $_POST['item_id'];

    // Update the status of the item to 'found'
    $sql = "UPDATE items SET status = 'found' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id);

    if ($stmt->execute()) {
        // Redirect to the items page after updating the status
        header("Location: items.php");
        exit(); // Always call exit after header to prevent further code execution
    } else {
        // Output an error message if something goes wrong
        echo "Error updating item: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
