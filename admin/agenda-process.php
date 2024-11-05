<?php
include('../public/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and prepare the agenda input and approveID
    $agenda = $_POST['agendaInput'];
    $approvedID = $_POST['approvedID']; // Get the approveID from the form

    // Prepare your SQL statement to update the approved table
    $stmt = $conn->prepare("UPDATE approved SET agenda = ? WHERE approvedID = ?");
    $stmt->bind_param("si", $agenda, $approvedID); // Binding parameters: string for agenda, integer for approveID

    if ($stmt->execute()) {
        // Redirect back to assignment-take-action.php
        header("Location: assignment-take-action.php");
        exit; // Ensure to exit after header redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
