<?php
include '../public/config.php';

session_start();

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
         admin.fullName AS adminFullName
     FROM 
         rfa AS rfa
     JOIN 
         account AS acc ON rfa.accountID = acc.accountID
     JOIN 
         assignment AS assign ON rfa.accountID = assign.accountID
     JOIN 
         admin AS admin ON assign.adminID = admin.adminID
     WHERE 
         rfa.status = 'REVIEWED' AND assign.adminID = ?;";  

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $adminID);  // Bind the adminID parameter to the query
$stmt->execute();
$result = $stmt->get_result();
$assigned = $result->fetch_assoc(); // Fetch the result into an associative array

if ($assigned) {
    // Now proceed to the update if the data is found
    $referenceID = $assigned['referenceID'];

    $sqlUpdate = "UPDATE rfa SET status = 'APPROVED' WHERE referenceID = ?;";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("i", $referenceID);  // Bind the referenceID for the update
    $stmtUpdate->execute();
    
    // Optionally check if the update was successful
    if ($stmtUpdate->affected_rows > 0) {
        // Set a success message in the session
        $_SESSION['success_message'] = "RFA has been approved successfully!";
        
        // Redirect to schedule-rfa page changed name into schedule-rfa-form.php
        header("Location: approve-rfa-email.php"); // Redirect to email sender first before proceeding here 
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Failed to update status.";
    }
} else {
    header("Location: rfa-assignment.php");
    // echo "No assignment found with the 'REVIEWED' status.";
}
