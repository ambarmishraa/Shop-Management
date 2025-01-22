<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
        }
        nav {
            margin: 20px 0;
        }
        nav a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            margin: 5px;
            display: inline-block;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #45a049;
        }
        footer {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Shop Management System</h1>
    </header>

    <nav>
        <a href="add_product.php">Add Product</a>
        <a href="view_products.php">View Products</a>
        <a href="update_stock.php">Update Stock</a>
        <a href="add_sale.php">Add Sale</a>
        <a href="view_sales.php">View Sales</a>
    </nav>

    <footer>
        &copy; <?php echo date("Y"); ?> Shop Management System
    </footer>
</body>
</html>
