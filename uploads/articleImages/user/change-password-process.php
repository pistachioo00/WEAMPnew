<?php
session_start(); // Ensure session has started

include '../public/config.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Check if session variable 'accountID' is set
    if (!isset($_SESSION['accountID'])) {
        echo "Session variable 'accountID' is not set.";
        exit;
    }

    $accountID = $_SESSION['accountID'];

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
    // Prepare and execute a query to retrieve the hashed password for the user
    
    $sql_password = "SELECT password FROM account WHERE accountID = ?";
    
    $stmt_password = $conn->prepare($sql_password);
    $stmt_password->bind_param("i", $accountID);
    $stmt_password->execute();
    $stmt_password->bind_result($storedHashedPassword);
    $stmt_password->fetch();
    $stmt_password->close();

    if (!password_verify($currentPassword, $storedHashedPassword)) {
        echo "Current password is incorrect.";
        exit;
    }

    // Prepare SQL statement with placeholders
    $sql_update = "UPDATE account SET password = ? WHERE accountID = ?";
    
    // Prepare and bind parameters
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $hashedNewPassword, $accountID);

    // Execute the statement
    if ($stmt_update->execute()) {
        header("Location: my-account.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }

}

?>
