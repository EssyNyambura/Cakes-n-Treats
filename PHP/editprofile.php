<?php
session_start();
require 'connectdb.php'; //require database connection

if(!isset($_SESSION['customer_name'])){
header("Location: Index.html");
exit();
}
$customer_email=$_SESSION['customer_email'];
//$customer_id=$_SESSION['customer_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $username = $_POST['customer_name'];
     $email = $_POST['customer_email'];
     $phonenumber = $_POST['customer_phonenumber'];
     $password = $_POST['password'];
    // $customer_id=$_POST['customer_id'];

    $hashed_password= password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE customer SET customer_name = ?, customer_email = ?, customer_phonenumber = ?, password = ? WHERE customer_email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sssss', $username,$email,$phonenumber,$hashed_password,$customer_email);
    if ($stmt->execute()) {
        echo "Profile updated";
        header("location:../HTML/Index.html"); // Redirect to the homepage after the user's profile is updated
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

