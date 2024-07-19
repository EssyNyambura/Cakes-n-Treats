<?php
session_start();
require 'connectdb.php';

if(!isset($_SESSION['customer_name']))
header("Location: Index.html");
exit();

$customer_email=$_SESSION['customer_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $username = $_POST['customer_name'];
     $email = $_POST['customer_email'];
     $phonenumber = $_POST['customer_phonenumber'];
     $password = $_POST['password'];

    $hashed_password= password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE customer SET customer_name = ?, customer_email = ?, customer_phonenumber = ?, password = ? WHERE customer_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssi', $username,$email,$phonenumber,$hashed_password,$customer_id);
    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

