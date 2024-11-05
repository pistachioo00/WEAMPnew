<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $accountID = $_SESSION['accountID'];

    // Get the form data
    $othersClaims = isset($_POST['othersClaims'])? 1 : 0;
    $othersClaimsText = $_POST['othersClaimsText'];

    $othersReliefs = isset($_POST['othersReliefs'])? 1 : 0;
    $othersReliefsText = $_POST['othersReliefsText'];

    // Get the checkbox values
    $selectedClaimsAndIssues = isset($_POST['claimsAndIssues']) ? $_POST['claimsAndIssues'] : [];
    $selectedReliefPrayedFor = isset($_POST['reliefPrayedFor']) ? $_POST['reliefPrayedFor'] : [];

    // Ensure the required POST fields are set
    if (isset($_POST['businessName']) && isset($_SESSION['accountID'])) {
        // Sanitize input values
        $businessName = htmlspecialchars($_POST['businessName']);
        $today = date('Y-m-d');

        $claimsRemarks = htmlspecialchars($_POST['claimsRemarks']);
        $reliefsRemarks = htmlspecialchars($_POST['reliefsRemarks']);

        // Combine selected checkbox values into a single string
        $combinedClaimsAndIssues = implode(", ", $selectedClaimsAndIssues);
        $combinedReliefPrayedFor = implode(", ", $selectedReliefPrayedFor);

        // If "Others" is selected, append the text field data to the selected checkboxes
        if ($othersClaims) {
            $combinedClaimsAndIssues.= ',Others: '. $othersClaimsText;
        }

        if ($othersReliefs) {
            $combinedReliefPrayedFor.= ',Others: '. $othersReliefsText;
        }

        // Include database configuration
        include '../public/config.php';

        // SQL query
        $sql = "INSERT INTO rfa (businessName, claimsAndIssues, claimsRemarks, reliefPrayedFor, reliefsRemarks, accountID, date) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssis", $businessName, $combinedClaimsAndIssues, $claimsRemarks, $combinedReliefPrayedFor, $reliefsRemarks, $accountID, $today);

        if ($stmt->execute()) {
            // Successful submission of RFA
            header("Location: ../user/emailBuilder.php");
            exit();
        } else {
            // Display error if query execution fails
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Required form fields are missing.";
        echo "Here's the account id: ".$accountID;
    }
}
?>