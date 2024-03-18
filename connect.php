<?php

// Error reporting for development (comment out for production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input to prevent SQL injection
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);

    // Database connection
    $conn = new mysqli('mysql-mrx3011-mrxdatabase-dfe6.a.aivencloud.com', 'avnadmin', 'AVNS_NrMfXS0QkXf8GE1KTQF', 'defaultdb');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Prepared statement for secure insertion
        $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
        $execval = $stmt->execute();

        if ($execval) {
            echo "Registration successful!";
        } else {
            echo "Registration failed.";
        }

        $stmt->close();
        $conn->close();
    }
}

?>
