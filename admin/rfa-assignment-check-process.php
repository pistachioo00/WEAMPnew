<?php

function checkAssignedRFA($adminID) {
    include '../public/config.php'; 

    // SQL query to check for assigned RFAs
    $sql = "SELECT 
                rfa.businessName,
                rfa.claimsAndIssues,
                rfa.claimsRemarks,
                rfa.reliefPrayedFor,
                rfa.reliefsRemarks,
                rfa.date AS dateCreated,
                rfa.status AS status,
                acc.*, 
                assign.*, 
                admin.adminID,
                admin.fullName AS adminFullName,
                admin.username AS adminUsername
            FROM 
                rfa AS rfa
            JOIN 
                account AS acc ON rfa.accountID = acc.accountID
            JOIN 
                assignment AS assign ON acc.accountID = assign.accountID
            JOIN 
                admin AS admin ON assign.adminID = admin.adminID  
            WHERE 
                rfa.status != 'PENDING'
            AND 
                admin.adminID = ?;"; // Placeholder for adminID
              
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $adminID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Redirect to rfa-assignment page if record exists
            header('Location: rfa-yes-assignment.php');
            exit;
        }
        $stmt->close();


    } else {
        // Handle errors in preparing the statement
        echo "Error preparing statement: " . $conn->$error;
    }

    $conn->close(); // Close the database connection
}

// Display the form
?>
