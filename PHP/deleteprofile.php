<?php
require 'connectdb.php'; //require database connection
session_start();

if(!isset($_SESSION['customer_name'])) {//if user is not logged in, redirect to homepage
header("Location: Index.html");
exit();
}

if (isset($_GET['customer_email'])) {
    $customer_email=$_GET['customer_email'];
    
    $query = "DELETE FROM customer WHERE customer_email = ?";
    $stmt = $mysqli->prepare($query);

    $stmt->bind_param('s', $customer_email);
    if ($stmt->execute()) {
        echo "User deleted";
        header("location:../HTML/Index.html"); // Redirect to the homepage after the user's profile is deleted
        exit();
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
}