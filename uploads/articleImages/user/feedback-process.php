<?php
session_start(); // Ensure session is started to access accountID
include '../public/config.php'; // Include database configuration

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve accountID from session
    $accountID = $_SESSION['accountID'];

    // Retrieve form data
    $fullName = htmlspecialchars($_POST['fullName']); // Name should be passed in the form
    $feedback = htmlspecialchars($_POST['feedback']);
    $rating = intval($_POST['rating']);

    // Select adminID, referenceID, and email from the assignment and account tables based on accountID
    $adminSql = "SELECT a.adminID, a.referenceID, ac.email 
                 FROM assignment a 
                 JOIN account ac ON a.accountID = ac.accountID 
                 WHERE a.accountID = ?";
                 
    $adminStmt = $conn->prepare($adminSql);
    $adminStmt->bind_param("i", $accountID);
    $adminStmt->execute();
    $adminResult = $adminStmt->get_result();

    if ($adminResult->num_rows > 0) {
        $adminRow = $adminResult->fetch_assoc();
        $adminID = $adminRow['adminID']; // Retrieve adminID
        $referenceID = $adminRow['referenceID']; // Retrieve referenceID
        $email = $adminRow['email']; // Retrieve email from account table

        // Prepare SQL statement for insertion
        $sql = "INSERT INTO feedback (fullName, email, feedback, rating, accountID, adminID, referenceID) VALUES (?, ?, ?, ?, ?, ?, ?)"; // Include referenceID
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("sssiiss", $fullName, $email, $feedback, $rating, $accountID, $adminID, $referenceID); // Include referenceID
            
            // Execute statement
            if ($stmt->execute()) {
                // Redirect to feedback-email.php after successful submission
                header("Location: feedback-email.php");
                exit(); // Make sure to exit after redirection
            } else {
                // Handle execution error
                echo "Error: " . $stmt->error;
            }
        } else {
            // Handle preparation error
            echo "Error: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error: No admin found for the provided account ID.";
    }

    // Close the admin statement
    $adminStmt->close();
}

// Close database connection
$conn->close();
?>
