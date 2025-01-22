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

<head>
    <title>Add Product</title>
    <style>
        .body-wrapper {
            background-image: url('./assets/add_product.jpg');
            background-size: cover;
            height: 100vh;
        }

        .container-wrapper {
            width: 25%;
            height: 400px;
            margin: 0 auto;
            position: relative;
            top: 10vh;
            left: -105px;
            border-radius: 10px;
        }

        .container-heading {
            display: flex;
            justify-content: start;
            align-items: center;
            margin-bottom: 27px;
            padding-top: 25px;
            margin-left: 27px;
            color: white
        }

        .form-div {
            display: flex;
            width: 100%;
            margin-left: 25px
        }

        .form-div-input {
            border-radius: 10px;
            height: 30px;
            width: 250px
        }

        .btn-wrapper {
            display: flex;
            justify-content: center;
        }

        .btn-style {
            height: 35px;
            width: 115px;
            border-radius: 20px;
            background-color: #007bff;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
        }
    </style>
</head>

<body class="body-wrapper">
    <div class="container-wrapper">
        <h1 class="container-heading">Add New Product</h1>
        <div class="form-div">
            <form method="POST">
                <input class="form-div-input" type="text" placeholder="Product Name" id="name" name="name" required><br><br>

                <input class="form-div-input" placeholder="Price" type="number" id="price" name="price" step="0.01" required><br><br>

                <input class="form-div-input" placeholder="Stock Quantity" type="number" id="stock" name="stock" required><br><br>

                <div class="btn-wrapper"><button class="btn-style" type="submit">Add Product</button></div>

            </form>
        </div>

    </div>
</body>