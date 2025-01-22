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
            background-image:url('./assets/index.webp');
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: transparent;
            color: black;
            font-size:20px;
            padding: 15px;
        }
        nav {
            margin: 20px 0;
        }
        div a {
            text-decoration: none;
            color: white;
            background-color: transparent;
            padding: 10px 20px;
            margin: 5px;
            display: inline-block;
            border-radius: 5px;
            width:10%;
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

        div a img{
            width:50px;
            height:50px;
            margin:0 auto;

        }
        .icon-styling{
            display:flex; 
            flex-direction:column;
        }
        .span-styling{
            color:black;
            margin-top:10px
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Shop Management System</h1>
    </header>

    <div style="display:flex; flex-direction:column;">
    <a class="icon-styling" href="add_product.php"><img src="./assets/add-product.png" alt="add-product"/><span class="span-styling">Add Product</span></a>
        <a class="icon-styling" href="view_products.php"><img src="./assets/view-product.png" alt="View-Products"/><span class="span-styling">View Product</span></a>
        <a class="icon-styling" href="update_stock.php"><img src="./assets/update-product.png" alt="Update Stock"/><span class="span-styling">Update Stock</span></a>
        <a class="icon-styling" href="add_sale.php"><img src="./assets/add-sale.png" alt="Add Sale"/><span class="span-styling">Sell Item</span></a>
        <a class="icon-styling" href="view_sales.php"><img src="./assets/view-sale.png" alt="View Sales"/><span class="span-styling">View Sale</span></a>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Shop Management System
    </footer>
</body>
</html>
