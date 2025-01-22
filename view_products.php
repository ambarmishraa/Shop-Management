<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<head>
    <title>View Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;

            background-image: url('./assets/add_product.jpg');
            background-size: cover;
            height: 100vh;

            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            border: 1px solid #ddd;
        }


        h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Product List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['stock']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No products found</td></tr>";
        }
        ?>
    </table>
</body>
