<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Lost Item</title>

    <!-- Internal CSS -->
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        input[type="file"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .container {
                padding: 20px;
            }
            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Report a Lost Item</h2>
    <form action="submit_action.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="location">Lost Location:</label>
            <input type="text" id="location" name="location" required>
        </div>

        <div class="form-group">
            <label for="date_lost">Date Lost:</label>
            <input type="date" id="date_lost" name="date_lost" required>
        </div>

        <div class="form-group">
            <label for="item_image">Upload Image:</label>
            <input type="file" id="item_image" name="item_image" accept="image/*">
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
