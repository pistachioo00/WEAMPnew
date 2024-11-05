<?php
include 'auth-admin.php';
checkAdminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account</title>
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

        .nav-link {
            display: block;
            padding: 10px 0;
            text-decoration: none;
            color: white;
        }

        .nav-link:hover {
            text-underline-offset: 10px;
            text-decoration: underline;
            color: #FFD700;
        }

        .no-hover:hover {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #C80000; position: fixed; width: 100%; z-index: 999;">
        <div class="container">
            <a class="navbar-brand" href="../admin/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 80px;">
            </a>
            <button class="navbar-toggler" style="background-color: #fff;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #C80000;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA" data-bs-content='<div><a class="nav-link text-black" href="rfa-entries.php" class="btn btn-link">New Entries</a><br><a class="nav-link text-black" href="rfa-assignment.php" class="btn btn-link">Assignment</a></div>' data-bs-placement="bottom">
                            RFA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="recordsLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="Records" data-bs-content='<div><a class="nav-link text-black" href="sena-records.php" class="btn btn-link">SENA Conferences</a><br><a class="nav-link text-black" href="#" class="btn btn-link">Advice Counselling</a></div>' data-bs-placement="bottom">
                            Records
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../admin/admin-account.php">
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
    </nav>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                    <h5 class="modal-title text-center" id="logoutConfirmationModalLabel" style="font-weight: bold; font-family: Arial;">
                        Confirm Logout
                    </h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary" onclick="logout()" style="background-color: #140c3e; color: #eee203; border-radius: 30px;">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="my-account-sec" style="margin-top: 8%;">
        <div class="container">
            <h3 class="display-5 text-start mt-5" style="font-family: sub-font-bold;">Admin Account</h3>
            <div class="mb-3 row">
                <div class="col-sm-2 mt-2">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-decoration: none; color: white;">
                        Change Password
                    </button>
                </div>
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
                            <form action="admin-change-password-process.php" method="POST">
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

    <hr class="my-4" style="background-color: black; border-width: 0.1rem; width: 65%">

    <!-- RETRIEVE NG ACCOUNT INFORMATION -->
    <?php

    include '../public/config.php';

    $adminID = $_SESSION['adminID'];

    $sql = "SELECT * FROM admin WHERE adminID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $adminID);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    ?>

    <form class="container col-md-5 align-items-left" style="font-family: 'form-font'; padding-top: 2rem; align-items: left; " action="admin-account-update-process.php" method="POST">
        <div class="form-group row">
            <label for="fullname" class="col-sm-4 col-form-label">Full Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo htmlspecialchars($admin['fullName']); ?>">

            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email Address</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-sm-4 col-form-label">Username</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($admin['username']); ?>">
            </div>
        </div>

        <div class="mb-3 row" style="padding-bottom: 20%">
            <div class="col-sm-4 mt-4">
                <button type="submit" class="btn btn-secondary" style="text-decoration: none; color: white;">
                    Update
                </button>
            </div>
        </div>
    </form>


    <footer class="footer fixed-bottom">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    //Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    function showLogoutConfirmation() {
        $('#logoutConfirmationModal').modal('show');
    }

    function logout() {
        window.location.href = "logout.php";
    }
</script>

</html>