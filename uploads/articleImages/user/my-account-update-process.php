<?php
session_start(); // Ensure session has started

include '../public/config.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accountID = $_SESSION['accountID'];

    // Escape user inputs to prevent SQL injection
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $username = htmlspecialchars($_POST['username']);
    $contact = htmlspecialchars($_POST['contact']);

    $region = htmlspecialchars($_POST['region']);
    $province = htmlspecialchars($_POST['province']);
    $city = htmlspecialchars($_POST['city']);
    $barangay = htmlspecialchars($_POST['barangay']);
    $addressLine1 = htmlspecialchars($_POST['addressLine1']);
    
    $workPosition = htmlspecialchars($_POST['workPosition']);
    $category = htmlspecialchars($_POST['category']);
    $natureOfWork = htmlspecialchars($_POST['natureOfWork']);
    $yearsOfService = intval($_POST['yearsOfService']);
    $employmentDate = htmlspecialchars($_POST['employmentDate']);
    
    

    // Prepare SQL statement with placeholders
    $sql = "UPDATE account SET fullName = ?, email = ?, username = ?, contact = ?, region = ?, province = ?, city = ?, barangay = ?, addressLine1 = ?, workPosition = ?, category = ?, natureOfWork = ?, yearsOfService = ?, employmentDate = ? WHERE accountID = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssisi", $fullName, $email, $username, $contact, $region, $province, $city, $barangay, $addressLine1, $workPosition, $category, $natureOfWork, $yearsOfService, $employmentDate, $accountID);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: my-account.php");
        exit;
        // header('Location: my-account.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
