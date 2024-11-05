<?php
session_start();
include '../public/config.php';

// Check if the referenceID is set in the GET request
if (isset($_POST['referenceID'])) {
    $referenceID = $_POST['referenceID'];

    // Get the adminID from the session
    $adminID = $_SESSION['adminID'];

    //Change status from PENDING to IN PROGRESS
    $sql = "UPDATE rfa SET status = 'IN PROGRESS' WHERE referenceID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $referenceID);
    $stmt->execute();

    // Retrieve the relevant data from the rfa table
    $sql = "SELECT rfa.referenceID, rfa.accountID, rfa.status, acc.accountID 
            FROM rfa rfa 
            INNER JOIN account acc ON rfa.accountID = acc.accountID 
            WHERE rfa.referenceID = ?;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $referenceID);
    $stmt->execute();
    $result = $stmt->get_result();
    $assign = $result->fetch_assoc();


    if ($assign) {
        // Insert the data into the assignment table
        $sql = "INSERT INTO assignment (referenceID, accountID, adminID, datetime) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $assign['referenceID'], $assign['accountID'], $adminID);

        if ($stmt->execute()) {
            // Redirect back to the entries.php page with a success message
            header("Location: rfa-entries.php");
            exit();
        } else {
            // Redirect back to the entries.php page with an error message
            header("Location: rfa-entries.php?status=error");
            exit();
        }
    } else {
        // Redirect back to the entries.php page with an error message
        header("Location: rfa-entries.php?status=notfound");
        exit();
    }
} else {
    // Redirect back to the entries.php page with an error message
    header("Location: rfa-entries.php?status=invalid");
    exit();
}
