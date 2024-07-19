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
    <title>Profile</title>
</head>
<body>
    <div>
        
        <div class= "wrapper">
        <?php 
        if (!isset($_SESSION['customer_name'])) {
            echo "No customer found in session.";
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
        <li><a href ="../HTML/edituser.html" >EDIT</a></li>
        
        </div>
    </div>
</body>
</html>
