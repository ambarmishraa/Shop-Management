<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if (!empty($name) && $price >= 0 && $stock >= 0) {
        $sql = "INSERT INTO products (name, price, stock) VALUES ('$name', $price, $stock)";
        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill out all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form method="POST">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="stock">Stock Quantity:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
