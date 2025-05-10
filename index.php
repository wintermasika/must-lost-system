<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2em;
        }

        .search-box {
            margin: 30px auto;
            text-align: center;
        }

        .search-box input,
        .search-box select {
            padding: 10px;
            font-size: 1em;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-box button {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-box button:hover {
            background-color: #0056b3;
        }

        .buttons {
            text-align: center;
            margin: 20px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .buttons a {
            display: inline-block;
            margin: 10px;
            padding: 12px 25px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .buttons a:hover {
            background-color: #0056b3;
        }

        .item-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .item {
            background: white;
            width: 250px;
            margin: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }

        .item:hover {
            transform: scale(1.03);
        }

        .item img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: contain;
        }

        .item-details {
            padding: 15px;
        }

        .item-details h3 {
            margin-top: 0;
        }

        .info-section {
            padding: 40px 20px;
            text-align: center;
            background: linear-gradient(to bottom right, #f0f8ff, #e6f0ff);
        }

        .info-section h2 {
            font-size: 2em;
            color: #007BFF;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .info-section h2:hover {
            transform: translateY(-5px);
        }

        .info-section p {
            font-size: 1.1em;
            margin-bottom: 25px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .info-section span {
            color: #007BFF;
        }

        @media (max-width: 768px) {
            .buttons {
                flex-direction: column;
                align-items: center;
            }

            .buttons a {
                width: 80%;
                text-align: center;
            }

            .item {
                width: 90%;
            }

            .item img {
                max-height: 160px;
            }
        }
    </style>
</head>
<body>

    <header>Lost & Found Items System</header>

    <div class="search-box">
        <form method="GET" action="search.php">
            <input type="text" name="query" placeholder="Search lost items by name, location..." required>
            <select name="status">
                <option value="all">All</option>
                <option value="lost">Lost</option>
                <option value="found">Found</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="buttons">
        <a href="submit.php">Submit Lost Item</a>
        <a href="items.php">View Lost Items</a>
        <a href="found.php">View Found Items</a>
    </div>

    <!-- How It Works -->
    <section class="info-section">
        <h2>How It Works</h2>
        <p>This platform helps you reconnect with lost items in your community. Here's what you can do:</p>
        <p><span>Submit a Lost Item:</span> Use the <span>“Submit Lost Item”</span> button above to report what you've lost.</p>
        <p><span>Search Items:</span> Use the search box above to filter by item name, location, or type (lost or found).</p>
        <p><span>Browse Reports:</span> Check out <span>“View Lost Items”</span> or <span>“View Found Items”</span> to see current entries.</p>
        <p>Our system makes it easy to report, find, and return valuable items.</p>
    </section>

    <!-- Sample Item -->
    <div class="item-list">
        <div class="item">
            <img src="uploads/sample.jpg" alt="Sample Item">
            <div class="item-details">
                <h3>USB Drive</h3>
                <p>Lost near Library on May 2.</p>
                <p>Please contact me if found.</p>
                <p>+255714457166</p>
            </div>
        </div>
    </div>

</body>
</html>
