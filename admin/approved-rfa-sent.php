<?php
include 'auth-admin.php';
checkAdminLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPROVED RFA Sent</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }

        .notification-panel {
            width: 20%;
            position: absolute;
            left: 72%;
            top: 5%;
            max-height: 400px;
            overflow-y: auto;
            font-family: Arial;
            z-index: 9999;
        }

        /* PUSH NOTIFICATIONS */
        .notification-list {
            list-style-type: none;
            padding: 0;
        }

        .notification-list li {
            background-color: #f5f5f5;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .notification-list li:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }

        /* Ensure collapsible content is fixed when collapsed */
        #collapseNotifications:not(.show) {
            position: fixed;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../user/index.php">
                <img src="../assets/Valenzuela-Seal-Outline.svg" alt="Valenzuela-Seal-Outline"
                    style="width: 80px; height: 80px;">
                <img src="../assets/Header-Title.svg" alt="Header-Title" style="width: 200px; height: 65px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav nav-underline mx-auto mb-2 mb-lg-0">
                    <li class="nav-items">
                        <a class="nav-link" href="../admin/home.php">Home</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="rfaLink" data-bs-toggle="popover"
                            data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA"
                            data-bs-content='<div><a class="nav-link" href="rfa-entries.php" class="btn btn-link">New Entries</a><br><a class="nav-link" href="rfa-assignment.php" class="btn btn-link">Assignment</a></div>' data-bs-placement="bottom">
                            RFA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="recordsLink" data-bs-toggle="popover"
                            data-bs-html="true" data-bs-trigger="click" data-bs-title-center="Records"
                            data-bs-content='<div><a class="nav-link" href="sena-records.php" class="btn btn-link">SENA Conferences</a><br><a class="nav-link" href="#" class="btn btn-link">Advice Counselling</a></div>' data-bs-placement="bottom">
                            Records
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Popover Content -->
            <div id="popoverContent" style="display: none;">
                <div class="popover-body">
                    Assignment
                </div>
            </div>

            <a href="#">
                <ul class="navbar-nav ml-auto">
                    <a class="nav-link" href="../admin/admin-account.php">
                        <img src="../assets/User.svg" alt="My-Account"
                            style="width: 20px; height: 20px; margin-right: 5px;">
                        My Account
                    </a>
                    <a class="nav-link" href="logout.php" onclick="showLogoutConfirmation()">
                        <img src="../assets/Sign_out_square.svg" alt="Sign-out"
                            style="width: 20px; height: 20px; margin-right: 5px;">
                        Log Out
                    </a>
                </ul>
            </a>
        </div>
    </nav>

    <!-- Add the logout confirmation modal markup -->
    <div class="modal fade" id="logoutConfirmationModal" tabindex="-1"
        aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-center" id="logoutConfirmationModalLabel">Logout Confirmation</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="logout()">Logout</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div><br>


    <!-- Collapsible content -->
    <div class="collapse position-fixed" style="width: 20%; left: 59%; top: 0; max-height: 400px; overflow-y: auto; font-family: Arial; padding-top: 5%; z-index: 9999;" id="collapseNotifications">
        <div class="card card-body">
            <ul class="notification-list">
                <!-- Example notifications -->
                <li>No notifications</li>
            </ul>
        </div>
    </div>

    <?php

    include '../public/config.php';

    // Get the current admin ID from the session
    $adminID = $_SESSION['adminID'];

    // Query to get the details including the accountID
    $sql = "SELECT 
         rfa.*,
         acc.*, 
         assign.*, 
         admin.*
     FROM 
         rfa AS rfa
     JOIN 
         account AS acc ON rfa.accountID = acc.accountID
     JOIN 
         assignment AS assign ON acc.accountID = assign.accountID
     JOIN 
         admin AS admin ON assign.adminID = admin.adminID  
     WHERE 
        assign.adminID = ?;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $adminID);
    $stmt->execute();
    $result = $stmt->get_result();
    $assigned = $result->fetch_assoc();
    ?>

    <div class="container d-flex justify-content-center align-items-center mt-4" style="padding-top: 12%">
        <div class="text-center">
            <img src="../assets/Folder-check.svg" alt="Folder Check">
            <h4 style="font-family: sub-font">
                You are now <span style="font-weight:bold">scheduled</span> for an initial interview with a Reference Number</h4>
            <?php if ($assigned !== null) : ?>
                <h3 style="font-family: sub-font-bold;" class="mt-4">
                    SEAD RCMD NCR-VAL-<?php echo htmlspecialchars($assigned['referenceID']); ?>-<?php echo date_format(date_create(htmlspecialchars($assigned['date'])), 'm-Y'); ?>
                </h3>
                <p class="mt-4" style="font-family: sub-font">
                    Please check your email for a scheduled meeting.
                </p>
            <?php else : ?>
                <h3 style="font-family: sub-font-bold;" class="mt-4">
                    Reference Number Not Found
                </h3>
                <p class="mt-4" style="font-family: sub-font">There was an error retrieving your reference number. Please contact WAO Front Desk for assistance at waovalcity@gmail.com.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer fixed-bottom">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="../user/index.js"></script>
<script>
    function showLogoutConfirmation() {
        $('#logoutConfirmationModal').modal('show');
    }

    function logout() {
        window.location.href = "logout.php";
    }

    $(document).ready(function() {
        var $collapseElement = $('#collapseNotifications');
        var bsCollapse = new bootstrap.Collapse($collapseElement[0], {
            toggle: false
        });

        $('#toggleNotifications').on('click', function(event) {
            event.preventDefault();
            if ($collapseElement.hasClass('show')) {
                bsCollapse.hide();
            } else {
                bsCollapse.show();
            }
        });
    });
</script>

</html>