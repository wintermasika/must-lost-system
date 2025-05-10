<?php
include 'db_connect.php';  // Make sure you include your DB connection

?>

<?php
$result = $conn->query("SELECT * FROM items WHERE status = 'found' ORDER BY id DESC");
echo "<h2>Found Items</h2>";

while($row = $result->fetch_assoc()) {
    echo "<div><strong>" . htmlspecialchars($row['item_name']) . "</strong><br>";
    echo htmlspecialchars($row['description']) . "<br>";

    $image = !empty($row['image_path']) && file_exists($row['image_path'])
        ? "<img src='" . htmlspecialchars($row['image_path']) . "' width='100'><br>"
        : "<em>No image provided.</em><br>";

    echo $image;
    echo "<em>Found on: " . htmlspecialchars($row['date_lost']) . "</em></div><hr>";
}
?>
