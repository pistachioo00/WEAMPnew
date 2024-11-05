<?php
session_start(); // Ensure session has started

include '../public/config.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Check if session variable 'adminID' is set
    if (!isset($_SESSION['adminID'])) {
        echo "Session variable 'adminID' is not set.";
        exit;
    }

    $adminID = $_SESSION['adminID'];

    // Escape user inputs to prevent SQL injection
    $currentPassword = htmlspecialchars($_POST['currentPassword']);
    $newPassword = htmlspecialchars($_POST['newPassword']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

    // Check if new password matches confirm password
    if ($newPassword !== $confirmPassword) {
        echo "New password and confirm password do not match.";
        exit;
    }

    // Hash the new password
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Check if the current password matches the one stored in the database 
    // Prepare and execute a query to retrieve the hashed password for the admin
    
    $sql_password = "SELECT password FROM admin WHERE adminID = ?";
    $stmt_password = $conn->prepare($sql_password);
    if ($stmt_password === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
    
    $stmt_password->bind_param("i", $adminID);
    $stmt_password->execute();
    $stmt_password->bind_result($storedHashedPassword);
    $stmt_password->fetch();
    $stmt_password->close();

    if (!password_verify($currentPassword, $storedHashedPassword)) {
        echo "Current password is incorrect.<br>";
        // echo "$storedHashedPassword<br>";
        // echo "$currentPassword<br>";
        // echo "$adminID";
        exit;
    }

    // Prepare SQL statement with placeholders
    $sql_update = "UPDATE admin SET password = ? WHERE adminID = ?";
    
    // Prepare and bind parameters
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $hashedNewPassword, $adminID);

    // Execute the statement
    if ($stmt_update->execute()) {
        header("Location: admin-account.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }

}

?>
