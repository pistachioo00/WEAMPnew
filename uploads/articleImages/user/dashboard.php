<!-- PREVENT FROM ACCCESS NA NAKALOG OUT KA NA -->
<?php
include 'auth.php';
checkLogin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }


        .text-center {
            text-align: center;
        }

        .nav-link {
            display: block;
            padding: 10px 0;
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
    <!-- Sidebar -->
    <div class="sidebar mt-5" style="background-color: white; border: 1.5px black solid">
        <div class="container my-5">
            <h3 class="fs-7 text-center" style="font-family: sub-font-bold; padding-top:35%">Dashboard</h3>
            <hr style="background-color: black;">
            <a href="../user/dashboard-status.php" class="nav-link mt-3" style="font-family: sub-font-bold; color: black">
                Status
                <img src="../assets/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../user/dashboard-history.php" class="nav-link" style="font-family: sub-font-bold; color: black">
                History
                <img src="../assets/Expand_right.svg" alt="expand_right">
            </a>
        </div>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="../user/home.php">
                    <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
                </a>
                <button style="width: 10%; height: 50%; background-color: #fff; border: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: #C80000;"></span>
                </button>
                <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../user/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/rfa.php">RFA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../user/dashboard.php" id="dashboardLink">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/contact-us.php">Contact</a>
                        </li>
                        <div class="mr-5"></div>
                    </ul>
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#collapseNotifications" aria-expanded="false" aria-controls="collapseNotifications">
                                    <img src="../assets/Bell_Pin.svg" alt="Notification" style="width: 20px; height: 20px; margin-right: 5px;">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="../user/my-account.php">
                                    <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                                    My Account
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#" onclick="showLogoutConfirmation()">
                                    <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>



        <!-- Add the logout confirmation modal markup -->
        <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collapsible content -->
        <div class="collapse position-fixed" style="width: 20%; left: 59%; top: 0; max-height: 400px; overflow-y: auto; font-family: Arial; padding-top: 5%; z-index: 9999;" id="collapseNotifications">
            <div class="card card-body">
                <ul class="notification-list">
                    <!-- Example notifications -->
                    <li>No notifications</li>
                </ul>
            </div>
        </div>

        <!-- RETRIEVE NG ACCOUNT INFORMATION -->
        <?php

        include '../public/config.php';

        $accountID = $_SESSION['accountID'];

        $sql = "SELECT * FROM account WHERE accountID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $accountID);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        ?>

        <section class="welcome-sec">
            <div class="container">
                <h3 class="display-3 text-start" style="font-family: main-font;">HELLO</h3>
                <h2 class="text-start" style="font-family: Arial, sans serif; font-weight: bold"><?php echo htmlspecialchars($user['fullName']); ?>!</h2>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">RFA ENTRIES</h4>
                        <div class="d-flex justify-content-center align-items-center"> <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 35%">0</h1> <!-- Remove margin bottom for alignment -->
                            <img src="../assets/Arhive_alt_add_list_light.svg" alt="" style="max-width: 100%; padding-left: 10px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">SENA CONFERENCE</h4>
                        <div class="d-flex justify-content-center align-items-center"> <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0; padding-right: 35%">0</h1> <!-- Remove margin bottom for alignment -->
                            <img src="../assets/Group.svg" alt="" style="max-width: 100%; padding-left: 10px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">ADVICE & COUNSELLING</h4>
                        <div class="d-flex justify-content-center align-items-center"> <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 35%">0</h1> <!-- Remove margin bottom for alignment -->
                            <img src="../assets/Vector_5.svg" alt="" style="max-width: 100%; padding-left: 10px; height: 75px; width: 75px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">SETTLED CASES</h4>
                        <div class="d-flex justify-content-center align-items-center"> <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 35%">0</h1> <!-- Remove margin bottom for alignment -->
                            <img src="../assets/settled-cases.svg" alt="" style="max-width: 100%; padding-left: 10px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">SETTLED AGREEMENT</h4>
                        <div class="d-flex justify-content-center align-items-center"> <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0; padding-right: 35%">0</h1> <!-- Remove margin bottom for alignment -->
                            <img src="../assets/settled-agreement.svg" alt="" style="max-width: 100%; padding-left: 10px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">REFERRALS</h4>
                        <div class="d-flex justify-content-center align-items-center"> <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 35%">0</h1> <!-- Remove margin bottom for alignment -->
                            <img src="../assets/Folder_send.svg" alt="" style="max-width: 100%; padding-left: 10px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom:20%">
            <div class="row">
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">WITHDRAWALS</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 35%">0</h1>
                            <img src="../assets/Arhive_load_light.svg" alt="" style="max-width: 100%; padding-left: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer fixed-bottom">
            <div class="container-footer">
                <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                    Worker’s Affairs Office</p>
            </div>
        </footer>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script>
    function showLogoutConfirmation() {
        $('#logoutConfirmationModal').modal('show');
    }

    function logout() {
        window.location.href = "../public/home.php";
    }

    $(document).ready(function() {
        var $collapseElement = $('#collapseNotifications');
        var bsCollapse = new bootstrap.Collapse($collapseElement[0], {
            toggle: false
        });

        $('#collapseNotifications').on('click', function(event) {
            event.preventDefault();
            if ($collapseElement.hasClass('show')) {
                bsCollapse.hide();
            } else {
                bsCollapse.show();
            }
        });
    });

    // SIDE MENU
</script>

</html>