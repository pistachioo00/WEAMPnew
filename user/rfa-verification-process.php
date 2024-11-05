<?php
function checkRFA($accountID) {

    include '../public/config.php'; // Include config.php only once
    // Check if a record with the same accountID already exists
    $sql = "SELECT COUNT(*) FROM rfa WHERE accountID =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $accountID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_row();
    $recordExists = $row[0] > 0;

    if ($recordExists) {
        // Redirect to rfa-sent page
        header('Location: rfa-sent.php');
        exit;
    }
}

// Call the checkRFA function before displaying the form
if (isset($_SESSION['accountID'])) {
    checkRFA($_SESSION['accountID']);
}

// Display the form
//...