<?php
include 'db_connect.php';  // Make sure you include your DB connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all lost items
$sql = "SELECT * FROM items WHERE status = 'lost' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Items</title>

    <!-- Internal CSS -->
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .items-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .item {
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .item h3 {
            color: #333;
            font-size: 22px;
            margin: 10px 0;
        }

        .item p {
            font-size: 16px;
            color: #666;
        }

        .item em {
            color: #888;
            font-style: italic;
        }

        .mark-found-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .mark-found-btn:hover {
            background-color: #45a049;
        }

        hr {
            margin-top: 20px;
            border-top: 1px solid #ddd;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 24px;
            }

            .items-list {
                grid-template-columns: 1fr;  /* Stacks items in a single column on small screens */
            }

            .item {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lost Items</h2>
    <div class="items-list">

        <?php
        while($row = $result->fetch_assoc()) {
            echo "<div class='item'>";
            echo "<img src='{$row['image_path']}' alt='Item Image'>";
            echo "<h3>{$row['item_name']}</h3>";
            echo "<p>{$row['description']}</p>";
            echo "<em>Lost on: {$row['date_lost']}</em><br>";

            // Form to mark as found
            echo "<form method='post' action='mark_as_found.php'>";
            echo "<input type='hidden' name='item_id' value='{$row['id']}'>";
            echo "<button type='submit' class='mark-found-btn'>Mark as Found</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>

    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>
