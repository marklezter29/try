<?php
// Database connection details (same as login_process.php)

// Get user input
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password (use password_hash for security)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL query
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful. You can now login.";
    // Optionally, redirect to login page
    header("Location: login.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>