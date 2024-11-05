<?php
// Include the database configuration file
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['selfie']) && isset($_FILES['governmentID'])) {
    // Validate and sanitize inputs
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
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
    $username = htmlspecialchars($_POST['username']);
    $contact = htmlspecialchars($_POST['contact']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $termsCheck = isset($_POST['termsCheck']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Handle image uploads
    $allowed_exs = array("jpg", "jpeg", "png");

    // Selfie upload
    $selfie_name = $_FILES['selfie']['name'];
    $selfie_tmp_name = $_FILES['selfie']['tmp_name'];
    $selfie_error = $_FILES['selfie']['error'];
    if ($selfie_error === 0) {
        $selfie_ext = strtolower(pathinfo($selfie_name, PATHINFO_EXTENSION));
        if (in_array($selfie_ext, $allowed_exs)) {
            $new_selfie_name = uniqid("SELFIE-", true) . '.' . $selfie_ext;
            $selfie_upload_path = '../uploads/selfieWithID/' . $new_selfie_name;
            move_uploaded_file($selfie_tmp_name, $selfie_upload_path);
        } else {
            echo "Invalid file type for selfie.";
            exit;
        }
    } else {
        echo "Error uploading selfie.";
        exit;
    }

    // Government ID upload
    $id_name = $_FILES['governmentID']['name'];
    $id_tmp_name = $_FILES['governmentID']['tmp_name'];
    $id_error = $_FILES['governmentID']['error'];
    if ($id_error === 0) {
        $id_ext = strtolower(pathinfo($id_name, PATHINFO_EXTENSION));
        if (in_array($id_ext, $allowed_exs)) {
            $new_id_name = uniqid("ID-", true) . '.' . $id_ext;
            $id_upload_path = '../uploads/governmentID/' . $new_id_name;
            move_uploaded_file($id_tmp_name, $id_upload_path);
        } else {
            echo "Invalid file type for government ID.";
            exit;
        }
    } else {
        echo "Error uploading government ID.";
        exit;
    }

    // Prepare SQL statement to insert account and image data
    $sql = "INSERT INTO account (fullName, email, region, province, city, barangay, addressLine1, workPosition, category, natureOfWork, yearsOfService, employmentDate, username, contact, password, selfieWithID, governmentID) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssississs", $fullName, $email, $region, $province, $city, $barangay, $addressLine1, $workPosition, $category, $natureOfWork, $yearsOfService, $employmentDate, $username, $contact, $hashedPassword, $new_selfie_name, $new_id_name);

    if ($stmt->execute()) {
        // Registration successful, redirect to home page or OTP page
        header("Location: ../user/home.php");
        exit();
    } else {
        // Registration failed
        header("Location: signup.php?error=registration_failed");
        exit();
    }
} else {
    // Redirect back to registration page if accessed directly
    header("Location: signup.php");
    exit();
}
