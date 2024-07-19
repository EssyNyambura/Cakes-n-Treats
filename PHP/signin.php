<?php
session_start();
require 'connectdb.php';

if($_SERVER['REQUEST_METHOD']== 'POST'){
   
    $email = $_POST ['customer_email'];
    $password = $_POST ['password'];

    $query = "SELECT * FROM customer where customer_email = ?";
    $stmt=$mysqli->prepare($query);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result=$stmt->get_result();

    $user=$result->fetch_assoc();

    if($user && password_verify($password, $user['password'])){
        $_SESSION["customer_name"]=$user["customer_name"];
        $_SESSION["customer_email"]=$user["customer_email"];

    header("location:../HTML/Index.html");
    exit();
    }else{
  echo"Invalid email or password. Please enter the correct details";
    }
  $stmt->close();
} 

    
$mysqli->close();
?>