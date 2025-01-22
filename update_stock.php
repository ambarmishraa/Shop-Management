<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $new_stock = $_POST['new_stock'];

    if (!empty($product_id) && $new_stock >= 0) {
        $sql = "UPDATE products SET stock = $new_stock WHERE id = $product_id";
        if ($conn->query($sql) === TRUE) {
            echo "Stock updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please select a valid product and enter a valid stock quantity.";
    }
}

// Fetch products for dropdown
$sql = "SELECT id, name FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Stock</title>
</head>
<body>
    <h1>Update Product Stock</h1>
    <form method="POST">
        <label for="product_id">Select Product:</label><br>
        <select id="product_id" name="product_id" required>
            <option value="">-- Select Product --</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
            }
            ?>
        </select><br><br>

        <label for="new_stock">New Stock Quantity:</label><br>
        <input type="number" id="new_stock" name="new_stock" required><br><br>

        <button type="submit">Update Stock</button>
    </form>
</body>
</html>
