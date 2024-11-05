<?php
include '../public/config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['adminID'])) {
        $adminID = $_SESSION['adminID'];

        $query = "
            SELECT 
                acc.accountID, 
                rfa.referenceID 
            FROM 
                rfa 
            JOIN 
                assignment AS assign ON rfa.accountID = assign.accountID 
            JOIN 
                account AS acc ON rfa.accountID = acc.accountID 
            JOIN 
                admin AS admin ON assign.adminID = admin.adminID 
            WHERE 
                admin.adminID = ?
        ";

        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die("MySQL prepare error: " . $conn->error);
        }

        $stmt->bind_param("i", $adminID);
        $stmt->execute();
        $stmt->bind_result($accountID, $referenceID);
        $stmt->fetch();
        $stmt->close();

        $date = date('Y-m-d');
        $time = htmlspecialchars($_POST['time']);
        $location = htmlspecialchars($_POST['location']);
        $purpose = htmlspecialchars($_POST['purpose']); 

        if (empty($time) || empty($location) || empty($purpose) || empty($adminID)) {
            echo "Error: All fields are required.";
        } else {
            // Update the SQL INSERT statement to exclude the duration column
            $stmt = $conn->prepare("INSERT INTO approved (date, time, location, purpose, adminID, accountID, referenceID) VALUES (?, ?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                die("MySQL prepare error: " . $conn->error);
            }

            $stmt->bind_param("sssssss", $date, $time, $location, $purpose, $adminID, $accountID, $referenceID);

            if ($stmt->execute()) {
                header("Location: ../admin/schedule-rfa-email.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Error: adminID not set in session. Please log in.";
    }
}
?>
