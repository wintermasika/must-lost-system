<?php
include 'db_connect.php';  // Make sure you include your DB connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            gap: 10px;
        }

        form input[type="text"], form select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
            transition: 0.3s;
        }

        form input[type="text"]:focus, form select:focus {
            border-color: #007BFF;
            outline: none;
        }

        form button {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007BFF;
            border: none;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .search-result {
            background-color: #f9f9f9;
            border-left: 5px solid #007BFF;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .search-result h3 {
            margin: 0 0 5px 0;
        }

        .search-result p {
            margin: 3px 0;
        }

        .item-image {
            width: 150px;
            height: auto;
            margin-top: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<form method="GET" action="search.php">
    <input type="text" name="query" placeholder="Search for items..." required>
    <select name="status">
        <option value="all">All</option>
        <option value="lost">Lost</option>
        <option value="found">Found</option>
    </select>
    <button type="submit">Search</button>
</form>

<?php
if (isset($_GET['query'])) {
    // Sanitize user input
    $search = $conn->real_escape_string($_GET['query']);
    $status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : 'all';

    // Base SQL query
    $sql = "SELECT * FROM items WHERE 
            (item_name LIKE '%$search%' OR 
            description LIKE '%$search%' OR 
            location LIKE '%$search%')";

    // Apply status filter
    if ($status === 'lost' || $status === 'found') {
        $sql .= " AND status = '$status'";
    }

    // Execute query
    $result = $conn->query($sql);

    echo "<h2>Search Results for \"" . htmlspecialchars($search) . "\"";
    if ($status !== 'all') {
        echo " (" . htmlspecialchars(ucfirst($status)) . " items)";
    }
    echo ":</h2>";

    // Show results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='search-result'>";
            echo "<h3>" . htmlspecialchars($row['item_name']) . "</h3>";

            // Location check
            $location = isset($row['location']) ? $row['location'] : 'N/A';
            echo "<p><strong>Location:</strong> " . htmlspecialchars($location) . "</p>";

            echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";

            // Status check
            $itemStatus = !empty($row['status']) ? $row['status'] : 'lost';
            echo "<p><strong>Status:</strong> " . htmlspecialchars($itemStatus) . "</p>";

            // Image check
            $imagePath = isset($row['image_path']) ? $row['image_path'] : '';
            if (!empty($imagePath) && file_exists($imagePath)) {
                echo "<p><strong>Image:</strong><br><img class='item-image' src='" . htmlspecialchars($imagePath) . "' alt='" . htmlspecialchars($row['item_name']) . "'></p>";
            } else {
                echo "<p><em>No image provided.</em></p>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>No items found.</p>";
    }
}
?>

</body>
</html>
