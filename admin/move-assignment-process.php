<?php
session_start(); // Ensure the session is started

function changeAdminAssignment($oldAdminID, $newAdminID) {
    include '../public/config.php';

    // SQL query to update the adminID
    $sql = "UPDATE 
                assignment 
            SET 
                adminID = ?
            WHERE
                adminID = ?;";
              
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $newAdminID, $oldAdminID);
        $stmt->execute();
        
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // Redirect to rfa-assignment page if record exists
            header('Location: rfa-assignment.php');
            exit;
        } else {
            // Handle the case where no rows were updated
            echo "No assignments were updated.";
        }
        
        $stmt->close();
    } else {
        // Handle errors in preparing the statement
        echo "Error preparing statement: " . $conn->error;
    }   
    $conn->close(); // Close the database connection
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldAdminID = $_SESSION['adminID'];
    $newAdminID = $_POST['newAdminID'];

    changeAdminAssignment($oldAdminID, $newAdminID);
}
?>
