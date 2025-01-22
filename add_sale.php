<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check stock availability
    $stock_check = "SELECT stock FROM products WHERE id = $product_id";
    $stock_result = $conn->query($stock_check);
    $row = $stock_result->fetch_assoc();

    if ($row && $row['stock'] >= $quantity) {
        // Add sale record
        $add_sale = "INSERT INTO sales (product_id, quantity) VALUES ($product_id, $quantity)";
        $conn->query($add_sale);

        // Update stock
        $new_stock = $row['stock'] - $quantity;
        $update_stock = "UPDATE products SET stock = $new_stock WHERE id = $product_id";
        $conn->query($update_stock);

        echo "Sale recorded and stock updated!";
    } else {
        echo "Insufficient stock for this sale.";
    }
}

// Fetch products for dropdown
$sql = "SELECT id, name FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Sale</title>
</head>
<body>
    <h1>Record a Sale</h1>
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

        <label for="quantity">Quantity Sold:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <button type="submit">Record Sale</button>
    </form>
</body>
</html>
