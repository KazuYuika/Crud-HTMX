<?php
// create.php

// Database configuration
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $description = $_POST['description'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, address, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $email, $phone, $address, $description);

    // Execute the statement
    if ($stmt->execute()) {
        header("hx-Refresh: true");
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>