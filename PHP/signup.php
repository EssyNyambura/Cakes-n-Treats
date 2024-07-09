<?php
require 'connectdb.php';
//to get users credentials
 $username = $_POST['customer_name'];
 $email = $_POST['customer_email'];
 $phonenumber = $_POST['customer_phonenumber'];
 $password = $_POST['password'];

 $hashed_password= password_hash($password, PASSWORD_DEFAULT);

 $query = "INSERT INTO customer (customer_name, customer_email, customer_phonenumber, password) VALUES (?, ?, ?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss', $username,$email,$phonenumber,$hashed_password);

if ($stmt->execute()) {
    echo 'Registration successful';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>