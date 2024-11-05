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
            rfa.status = 'SCHEDULED' AND assign.adminID = ?;";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}

$stmt->bind_param("i", $adminID);
$stmt->execute();
$result = $stmt->get_result();
$assigned = $result->fetch_assoc();

// Check if any rows were returned
if ($assigned === null) {
    echo "No scheduled RFAs found for this admin.";
    exit(); // Terminate the script if no results found
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $referenceID = $_POST['referenceID'];
    $accountID = $assigned['accountID']; // Get accountID from the fetched data
    $remarks = $_POST['remarks'];

    // Concatenate checkbox labels into a single string for the settlement column
    $settlementArray = [];
    if (isset($_POST['adviceCounseling'])) {
        $settlementArray[] = 'Advice Counseling';
    }
    if (isset($_POST['jointConference'])) {
        $settlementArray[] = 'Joint Conference';
    }
    if (isset($_POST['settlementAgreement'])) {
        $settlementArray[] = 'Settlement Agreement';
    }
    if (isset($_POST['withdrawal'])) {
        $settlementArray[] = 'Withdrawal';
    }
    if (isset($_POST['referral'])) {
        $settlementArray[] = 'Referral';
    }
    
    // Join the array into a single string with a delimiter (e.g., comma)
    $settlement = implode(', ', $settlementArray);

    // Query to insert data into completed_case
    $sqlInsert = "INSERT INTO completed_case (referenceID, accountID, adminID, settlement, remarks)
                  VALUES (?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmtInsert = $conn->prepare($sqlInsert);
    if ($stmtInsert === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmtInsert->bind_param("iiiss", $referenceID, $accountID, $adminID, $settlement, $remarks);

    // Execute and check if successful
    if ($stmtInsert->execute()) {
        // Change status from SCHEDULED to COMPLETED
        $sqlUpdate = "UPDATE rfa SET status = 'COMPLETED' WHERE referenceID = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        if ($stmtUpdate === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error));
        }

        $stmtUpdate->bind_param("i", $referenceID);
        $stmtUpdate->execute();

        // Redirect to dashboard history if update was successful
        header("Location: ../admin/closed-case-email.php");
        exit(); // Ensure no further code is executed after redirect
    } else {
        // Handle insert failure if needed
        echo "Failed to insert completed case.";
    }
} else {
    // If not a POST request, redirect to the dashboard
    header("Location: ../admin/dashboard.php");
    exit();
}
?>
