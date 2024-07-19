<?php
require 'connectdb.php';

 $item = $_POST['item'];
 $quantity = $_POST['quantity'];


 $query = "INSERT INTO orders (order_item, order_quantity) VALUES (?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ss', $item,$quantity);

if ($stmt->execute()) {
    echo 'Order received! Thank you for your order';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>