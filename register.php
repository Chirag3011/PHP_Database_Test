<?php

// Replace with your actual database credentials (not recommended in HTML)
$host = '40.80.92.98';
$username = 'root';
$password = 'admin';
$dbname = 'signup';

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
}

// Extract user input
$username = $_POST['username'];
$password = $_POST['password'];

// **Sanitize and validate user input (omitted for brevity)**

// Prepare SQL statement (omitted for brevity - use prepared statements)
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

// Execute query (omitted for brevity - handle errors)
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
