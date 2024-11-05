<?php
// Include the database connection
require_once '../public/config.php';

session_start();

$alertType = ''; 

// Check if form is submitted and the required POST data is available
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and validate input data
    $adminID = filter_input(INPUT_POST, 'adminID', FILTER_VALIDATE_INT);
    $fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (!$adminID || !$fullName || !$username || !$email || !$password) {
        $alertType = 'warning';
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the update query
    $updateQuery = $conn->prepare("UPDATE `admin` SET fullName = ?, username = ?, email = ?, password = ? WHERE adminID = ?");
    $updateQuery->bind_param("ssssi", $fullName, $username, $email, $hashedPassword, $adminID);

    // Execute the query and check if it was successful
    if ($updateQuery->execute()) {
        $alertType = 'success';
    } else {
        $alertType = 'error'; 
    }

    // Close the prepared statement
    $updateQuery->close();
}

$adminID = 10;  // Replace this with the actual adminID, potentially from session data
$currentUsername = '';
$currentfullName = '';
$currentemail = '';

$query = $conn->prepare("SELECT fullName, username, email FROM `admin` WHERE adminID = ?");
$query->bind_param("i", $adminID);
$query->execute();
$query->bind_result($fullName, $username, $email);
if ($query->fetch()) {
    $currentUsername = htmlspecialchars($username);
    $currentfullName = htmlspecialchars($fullName);
    $currentemail = htmlspecialchars($email);
}
$query->close();

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
.navbar .nav .nav-item .nav-link {
    color: white;
}

.container .row {
    color: #465DA3;
}

.modal-body .mb-2 .form-control {
    background-color: #e5eeff;
}

/* Alert styling */
.alert-box {
    padding: 15px;
    margin: 20px;
    border-radius: 5px;
    color: #fff;
    font-family: Arial, sans-serif;
    display: none;
    text-align: center;
}

.alert-success {
    background-color: #28a745;
}

.alert-error {
    background-color: #dc3545;
}

.alert-warning {
    background-color: #ffc107;
}

.close-btn {
    margin-left: 15px;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}
</style>


<body>
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #C80000;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 70px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                    <ul class="nav nav-underline navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="../super-admin/sa-home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="../super-admin/sa-dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../super-admin/sa-rfa-entries.php">RFA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../super-admin/sa-sena-records.php">Records</a>
                        </li>
                    </ul>
                </div>
                <a href="#">
                    <ul class="navbar-nav ml-auto">
                </a>
                <a class="nav-link" href="../super-admin/sa-account.php" style="color: white">
                    <img src="../assets/User/User.svg" alt="My-Account"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    My Account
                </a>
                <a class="nav-link" href="logout.php" onclick="showLogoutConfirmation()" style="color: white">
                    <img src="../assets/User/Line1.svg" alt="Line"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    <img src="../assets/User/Sign_out_squre.svg" alt="Sign-out"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    Log Out
                </a>
                </ul>
                </a>
            </div>
        </nav>

        <section class="my-account-sec">
            <div class="container">
                <h3 class="display-5 text-start mt-5" style="font-family: sub-font-bold; color:#465DA3; ">
                    <a href="../super-admin/sa-account.php" class="fw-bold mt-5"
                        style="font-family: sub-font-bold; font-size: 3rem; text-decoration: none; color:#232525;">
                        <img src="../assets/user/Expand_left.svg" alt="expand_left">
                    </a>Manage your Account
                </h3>
        </section>

        <!-- Alert boxes -->
        <div id="alertSuccess" class="alert-box alert-success">
            Account updated successfully.
            <span class="close-btn" onclick="closeAlert('alertSuccess')">&times;</span>
        </div>

        <div id="alertError" class="alert-box alert-error">
            Error updating account.
            <span class="close-btn" onclick="closeAlert('alertError')">&times;</span>
        </div>

        <div id="alertWarning" class="alert-box alert-warning">
            Invalid input data. Please check your entries.
            <span class="close-btn" onclick="closeAlert('alertWarning')">&times;</span>
        </div>

        <hr class="my-3" style="background-color: black; border-width: 0.1rem; width: 60%"><br>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="sa-update-account.php" method="POST">
                        <input type="hidden" name="adminID" value="10">
                        <div class="mb-3 row">
                            <label for="username" style="font-family: sub-font;"
                                class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"
                                    style="font-family: sub-font; background-color: transparent; border: #304DA5 1.5px solid; color: grey;"
                                    id="username" name="username" value="<?= $currentUsername; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" style="font-family: sub-font;"
                                class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"
                                    style="font-family: sub-font; background-color: transparent; border: #304DA5 1.5px solid; color: grey;"
                                    id="fullName" name="fullName" value="<?= $currentfullName; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" style="font-family: sub-font;"
                                class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control"
                                    style="font-family: sub-font; background-color: transparent; border: #304DA5 1.5px solid; color: grey;"
                                    id="email" name="email" value="<?= $currentemail; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" style="font-family: sub-font;"
                                class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control"
                                    style="font-family: sub-font; background-color: transparent; border: #304DA5 1.5px solid;"
                                    id="password" name="password" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4 mt-4">
                                <button type="submit"
                                    style="font-family: sub-font-bold; width: 100%; background-color: #465DA3;"
                                    class="btn btn-secondary btn-sm rounded-pill text-white"
                                    value="Update Account">Update
                                    Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <footer class="footer fixed-bottom" style="background-color: #C80000;">
            <div class="container-footer" style="color: white;">
                <p>Copyright 2024 © All Rights Reserved</br>
                    Worker’s Affairs Office</p>
            </div>
        </footer>

        <script>
        window.alertType = "<?= $alertType ?>";
        </script>
        <script>
        function showAlert(alertId) {
            document.getElementById(alertId).style.display = "block";
        }

        function closeAlert(alertId) {
            document.getElementById(alertId).style.display = "none";
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Check PHP-set alert type and display corresponding alert
            if (window.alertType === 'success') {
                showAlert('alertSuccess');
            } else if (window.alertType === 'error') {
                showAlert('alertError');
            } else if (window.alertType === 'warning') {
                showAlert('alertWarning');
            }
        });
        </script>
</body>

</html>