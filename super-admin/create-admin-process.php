<?php
// Include the database configuration file
require_once '../public/config.php';

session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = htmlspecialchars($_POST['role']);


    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO admin (fullName, email, username, password, role) 
        VALUES (?, ?, ?, ?, ?)";


    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fullName, $email, $username, $hashedPassword, $role);

    if ($stmt->execute()) { 
        // Registration successful, redirect to home page or OTP page
        header("Location: ../admin/home.php");
        exit();
    } else {
        // Registration failed, redirect back to registration page with error message
        header("Location: create-admin.php?error=registration_failed");
        exit();
    }
} else {
    // Redirect back to registration page if accessed directly
    header("Location: create-admin.php");
    exit();
}

?>