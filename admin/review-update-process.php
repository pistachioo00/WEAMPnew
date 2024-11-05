<?php
session_start();
include '../public/config.php';

// Check if the referenceID is set in the POST request
if (isset($_POST['referenceID'])) {
    $referenceID = $_POST['referenceID'];

    // Get the adminID from the session
    $adminID = $_SESSION['adminID'];
    // Change status from PENDING to REVIEWED
    $sql = "UPDATE rfa SET status = 'REVIEWED' WHERE referenceID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $referenceID);
    $stmt->execute();

    

    // After the update, redirect to the page that displays the updated status
    header("Location: ../admin/review-update.php");
    exit();
} else {
    // Redirect back to the entries.php page with an error message
    header("Location: ../admin/review-update.php");
    exit();
}
?>