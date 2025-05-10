<?php
include 'db_connect.php';  // Make sure you include your DB connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all found items
$sql = "SELECT * FROM items WHERE status = 'found' ORDER BY id DESC";
$result = $conn->query($sql);

echo "<h2>Found Items</h2>";

if ($result->num_rows > 0) {
    echo "<div class='item-container'>";  // Wrapper div for better layout
    while ($row = $result->fetch_assoc()) {
        $item_name = htmlspecialchars($row['item_name']);
        $description = htmlspecialchars($row['description']);
        $date_lost = htmlspecialchars($row['date_lost']);
        $image_path = htmlspecialchars($row['image_path']);

        echo "<div class='item-card'>";
        echo "<h3>{$item_name}</h3>";  // More prominent item name
        echo "<p class='description'>{$description}</p>";  // Description with some space

        // Show image if file exists
        if (!empty($row['image_path']) && file_exists($row['image_path'])) {
            echo "<img src='{$image_path}' alt='{$item_name}' class='item-image'>";
        } else {
            echo "<p class='no-image'>No image available.</p>";
        }

        echo "<p class='date-lost'><em>Found on: {$date_lost}</em></p>";  // Display the found date nicely
        echo "</div>"; // Close item-card
    }
    echo "</div>"; // Close item-container
} else {
    echo "<p>No found items at the moment.</p>";
}

$conn->close();
?>

<style>
/* Overall container for the items */
.item-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin: 20px;
}

/* Style for each item card */
.item-card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.item-card:hover {
    transform: translateY(-10px);  /* Add a slight hover effect */
}

/* Item name style */
.item-card h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #333;
}

/* Description style */
.description {
    font-size: 1em;
    color: #555;
    margin-bottom: 10px;
}

/* Style for the image */
.item-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 5px;
}

/* Style for missing image message */
.no-image {
    font-style: italic;
    color: #999;
    margin-bottom: 10px;
}

/* Date lost style */
.date-lost {
    font-size: 0.9em;
    color: #777;
}
</style>
