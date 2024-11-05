<?php
session_start();

include('../public/config.php');

// Get the current admin ID from the session
$adminID = $_SESSION['adminID'];

// Query to get the details including the accountID
$sql = "SELECT 
         rfa.*,
         acc.accountID,
         acc.fullName AS accFullName,
         acc.email AS accEmail,
         assign.*, 
         admin.adminID,
         admin.fullName AS adminFullName,
         app.adminID AS appAdminID,
         app.date,
         app.time,
         app.duration
     FROM 
         rfa AS rfa
     JOIN 
         account AS acc ON rfa.accountID = acc.accountID
     JOIN 
         assignment AS assign ON rfa.accountID = assign.accountID
     JOIN 
         admin AS admin ON assign.adminID = admin.adminID
     JOIN 
         approved AS app ON assign.adminID = app.adminID
     WHERE 
         rfa.status = 'APPROVED' AND assign.adminID = ?;";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $adminID);
$stmt->execute();
$result = $stmt->get_result();
$assigned = $result->fetch_assoc();

if ($assigned) {
    // Change status from PENDING to IN PROGRESS
    $referenceID = $assigned['referenceID'];
    $sqlUpdate = "UPDATE rfa SET status = 'COMPLETED' WHERE referenceID = ?;";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("i", $referenceID);

    if ($stmtUpdate->execute()) {
        // Redirect to dashboard history if update was successful
        header("Location: ../admin/sena-records.php");
        exit(); // Ensure no further code is executed after redirect
    } else {
        // Handle update failure if needed
        echo "Failed to update the status.";
    }
} else {
    header("Location: ../admin/sena-records.php");
    exit(); // Ensure no further code is executed after redirect
}
