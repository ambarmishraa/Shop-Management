<?php
include 'db.php';

$sql = "SELECT sales.id, products.name AS product_name, sales.quantity, sales.date 
        FROM sales 
        JOIN products ON sales.product_id = products.id 
        ORDER BY sales.date DESC";
$result = $conn->query($sql);
?>

<head>
    <title>Sales History</title>
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


        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #e9e9e9;
        }


        .no-records {
            text-align: center;
            font-style: italic;
            color: #777;
        }
    </style>
</head>

<body>
    <h1>Sales History</h1>
    <table>
        <tr>
            <th>Sale ID</th>
            <th>Product Name</th>
            <th>Quantity Sold</th>
            <th>Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='no-records'>No sales recorded</td></tr>";
        }
        ?>
    </table>
</body>
