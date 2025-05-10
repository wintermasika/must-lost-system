
<!DOCTYPE html>
<html>
<head>
    <title>Report Lost/Found Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Report Item</h1>
    </header>
    <div class="container">
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <input type="text" name="item_name" placeholder="Item Name" required><br><br>
            <input type="text" name="location" placeholder="Where was it lost/found?" required><br><br>
            <textarea name="description" placeholder="Description..." required></textarea><br><br>
            <input type="file" name="image"><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
