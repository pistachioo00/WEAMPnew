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
    <title>My Account - Worker's Affairs Office</title>
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

    <?php
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("updAccount").onclick = function(event) {
                event.preventDefault(); // Prevent the default link behavior
                alert("Updated Account successfully!");
            }
        });
    </script>';
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color:  #C80000;">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%; background-color:  #C80000; border: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color:#C80000;"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/rfa.php">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/dashboard-status.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/contact-us.php">Contact</a>
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

    <section class="my-account-sec">
        <div class="container">
            <h3 class="display-5 text-start mt-5" style="font-family: sub-font-bold;"> Manage your
                Account</h3>
            <div class="mb-3 row">
                <div class="col-sm-2 mt-2">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-decoration: none; color: white;">
                        Change Password
                    </button>
                </div>
            </div>

            <!--Modal Change Password-->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container text-align-left">
                                <form action="change-password-process.php" method="POST">
                                    <div class="col">
                                        <h2>IMPORTANT REMINDER</h2>
                                        <p style="font-size: .8"><b>Password must be at least 8 characters long and must
                                                contain the following:</b>
                                            uppercase
                                            letters (A through Z), lowercase letters (a through z), numeric characters
                                            (0-9),
                                            and non-alphanumeric characters (special characters e.g. 1. $, #, %)</p>
                                    </div>
                                    <div class="mb-2">
                                        <label for="currentPassword" class="form-label">Current Password</label>
                                        <input type="password" id="currentPassword" name="currentPassword" class="form-control" aria-describedby="passwordHelpBlock">
                                    </div>
                                    <div class="mb-2">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <input type="password" id="newPassword" name="newPassword" class="form-control" aria-describedby="passwordHelpBlock">
                                    </div>
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" aria-describedby="passwordHelpBlock">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Your password must be 8-20 characters long, contain letters and numbers, and
                                        must not contain spaces, or emoji.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Change Password</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    <hr class="my-4" style="background-color: black; border-width: 0.2rem; width: 65%">

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

    <form class="container col-md-5 align-items-left" style="font-family: 'form-font'; padding-top: 2rem; align-items: left; " action="my-account-update-process.php" method="POST">
        <div class="form-group row">
            <label for="fullname" class="col-sm-4 col-form-label">Full Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo htmlspecialchars($user['fullName']); ?>">

            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email Address</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-sm-4 col-form-label">Username</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="contact" class="col-sm-4 col-form-label">Contact No.</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="contact" pattern="\d{10,11}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="11" name="contact" value="<?php echo htmlspecialchars($user['contact']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="country" class="col-sm-4 col-form-label">Region</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="region" name="region" value="<?php echo htmlspecialchars($user['region']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="country" class="col-sm-4 col-form-label">Province</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="province" name="province" value="<?php echo htmlspecialchars($user['province']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="city" class="col-sm-4 col-form-label">City</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="barangay" class="col-sm-4 col-form-label">Barangay</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="barangay" name="barangay" value="<?php echo htmlspecialchars($user['barangay']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="unit" class="col-sm-4 col-form-label">Unit/No./Lot/Blk</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="addressLine1" name="addressLine1" value="<?php echo htmlspecialchars($user['addressLine1']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="workpos" class="col-sm-4 col-form-label">Category</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="category" style="background-color: #d6d6d6;" name="category" value="<?php echo htmlspecialchars($user['category']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="workpos" class="col-sm-4 col-form-label">Work Position</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="workPosition" style="background-color: #d6d6d6;" name="workPosition" value="<?php echo htmlspecialchars($user['workPosition']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nature-of-work" class="col-sm-4 col-form-label">Nature of Work</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="natureOfWork" style="background-color: #d6d6d6;" name="natureOfWork" value="<?php echo htmlspecialchars($user['natureOfWork']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="inlineFormCustomSelectPref" class="col-sm-4 col-form-label">Years of Service</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="yearsOfService" name="yearsOfService" value="<?php echo htmlspecialchars($user['yearsOfService']); ?>">

            </div>
        </div>

        <div class="form-group row">
            <label for="employment-date" class="col-sm-4 col-form-label">Employment Date</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="employmentDate" style="background-color: #d6d6d6;" name="employmentDate" value="<?php echo htmlspecialchars($user['employmentDate']); ?>">
            </div>
        </div>

        <div class="mb-3 row" style="padding-bottom: 5%">
            <div class="col-sm-4 mt-4">
                <button type="submit" class="btn btn-secondary" style="text-decoration: none; color: white;">
                    Update
                </button>
            </div>
        </div>
    </form>

    <!-- Update Confirmation Modal
        <div class="modal fade" id="updateConfirmationModal" tabindex="-1" 
                aria-labelledby="updateConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateConfirmationLabel">Confirm Update</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to update your Account Information?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmUpdateButton">Yes, Update</button>
            </div>
            </div>
        </div>
        </div> -->

    <!-- Success Modal
        <div class="modal fade" id="updateSuccessModal" tabindex="-1" aria-labelledby="updateSuccessLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSuccessLabel">Update Successful</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Your account has been updated successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->


    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker's Affairs Office</p>
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

        $('#collapseNotifications').on('click', function(event) {
            event.preventDefault();
            if ($collapseElement.hasClass('show')) {
                bsCollapse.hide();
            } else {
                bsCollapse.show();
            }
        });
    });

    // function updateAccount() {
    //     $('#showConfirmationModal').modal('show');
    //     window.location.href = "my-account-update-process.php";
    // }
</script>

</html>