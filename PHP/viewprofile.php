<?php

session_start();
require 'connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <div>
        
        <div class= "wrapper">
        <?php 
        if (!isset($_SESSION['customer_name'])) {
            echo "Oops! No customer profile available. Please sign up or log in first.";
            exit;
        }
        
        $customer_email = $_SESSION['customer_email'];

         $query = "SELECT * FROM customer WHERE customer_email = ? ";
         $stmt = $mysqli->prepare($query);
         if (!$stmt) {
            echo "Error preparing statement: " . $mysqli->error;
            exit;
        }
        $stmt->bind_param("s", $customer_email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a row was returned
        if ($result->num_rows > 0) {
            // Fetch the row
            $row = $result->fetch_assoc();
        } else {
            echo "No customer data found.";
            exit;
        
        }
        ?>
        <h2>Welcome</h2>
        <h3>
            <?php
            echo $_SESSION['customer_name'];?>
        </h3>
        <?php 
        echo "<table>";
        echo "<tr>";
            echo "<td>";
                echo "<b>Name:</b>";
            echo "</td>";
        
            echo "<td>";
                echo $row['customer_name'];
            echo "</td>";
        echo "</tr>";
        echo "</table>";
        
     
        echo "<table>";
        echo "<tr>";
            echo "<td>";
                echo "<b>Email:</b>";
            echo "</td>";
        
            echo "<td>";
                echo $row['customer_email'];
            echo "</td>";
        echo "</tr>";
        echo "</table>";

        echo "<table>";
        echo "<tr>";
            echo "<td>";
                echo "<b>Phone Number:</b>";
            echo "</td>";
        
            echo "<td>";
                echo $row['customer_phonenumber'];
            echo "</td>";
        echo "</tr>";
        echo "</table>";

        ?>
        <a href ="../HTML/editprofile.html" ><button class="button">EDIT</button></a>
        <a href ="../PHP/deleteprofile.php" ><button class="button">DELETE</button></a>
        
        </div>
    </div>
</body>
</html>
