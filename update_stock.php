<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $new_stock = $_POST['new_stock'];

    if (!empty($product_id) && $new_stock >= 0) {
        $sql = "UPDATE products SET stock = $new_stock WHERE id = $product_id";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Stock updated successfully!</p>";
        } else {
            echo "<p class='error'>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error'>Please select a valid product and enter a valid stock quantity.</p>";
    }
}

// Fetch products for dropdown
$sql = "SELECT id, name FROM products";
$result = $conn->query($sql);
?>

<head>
    <title>Update Stock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('./assets/add_product.jpg');
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }


        h1 {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }


        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }


        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Update Product Stock</h1>
    <form method="POST">
        <label for="product_id">Select Product:</label>
        <select id="product_id" name="product_id" required>
            <option value="">-- Select Product --</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
            }
            ?>
        </select>

        <label for="new_stock">New Stock Quantity:</label>
        <input type="number" id="new_stock" name="new_stock" required>

        <button type="submit">Update Stock</button>
    </form>
</body>