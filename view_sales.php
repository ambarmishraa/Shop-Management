<?php
include 'db.php';

$sql = "SELECT sales.id, products.name AS product_name, sales.quantity, sales.date 
        FROM sales 
        JOIN products ON sales.product_id = products.id 
        ORDER BY sales.date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales History</title>
</head>
<body>
    <h1>Sales History</h1>
    <table border="1">
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
            echo "<tr><td colspan='4'>No sales recorded</td></tr>";
        }
        ?>
    </table>
</body>
</html>
