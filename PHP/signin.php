<?php
require 'connectdb.php';

 $username = $POST['customer_name'];
 $email = $POST['customer_email'];
 $phonenumber = $POST['customer_phonenumber'];
 $password = $POST['password'];

 $hashed_password= password_hash($password, PASSWORD_DEFAULT);

 $query = "INSERT INTO customer (customer_name, customer_email, customer_phonenumber, password) VALUES (?, ?, ?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssi', $username,$email,$phonenumber,$hashed_password);

if ($stmt->execute()) {
    echo 'Registration successful';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>