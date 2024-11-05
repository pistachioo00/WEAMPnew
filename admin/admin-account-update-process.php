<?php
session_start(); // Ensure session has started

include '../public/config.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminID = $_SESSION['adminID'];

    // Escape user inputs to prevent SQL injection
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $username = htmlspecialchars($_POST['username']);

    // Prepare SQL statement with placeholders
    $sql = "UPDATE admin SET fullName = ?, email = ?, username = ? WHERE adminID = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $fullName, $email, $username, $adminID);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: admin-account.php");
        exit;
        // header('Location: my-account.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
