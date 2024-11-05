<?php

function checkNoAssignment($adminID) {
    include '../public/config.php'; 

    // SQL query to check for assignment
    $sql = "SELECT 
                rfa.status,
                assign.adminID 
            FROM 
                rfa AS rfa
            JOIN  
                assignment AS assign 
            ON 
                rfa.accountID = assign.accountID
            WHERE 
                assign.adminID = ?
            AND
                rfa.status != 'PENDING';";
              
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $adminID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // Redirect to rfa-assignment page if record exists
            header('Location: rfa-no-assignment.php');
            exit;
        } 
        $stmt->close();
    } else {
        // Handle errors in preparing the statement
        echo "Error preparing statement: " . $conn->$error;
    }

    $conn->close(); // Close the database connection
}

?>
