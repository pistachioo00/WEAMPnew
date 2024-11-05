<!-- PREVENT FROM ACCCESS NA NAKALOG OUT KA NA -->
<?php
include 'auth-admin.php';
checkAdminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }

        .nav-link:hover {
            text-decoration: underline;
            text-underline-offset: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="../admin/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%; background-color: #fff; border: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #C80000;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="../admin/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA" data-bs-content='<div><a class="nav-link text-black" href="rfa-entries.php">New Entries</a><br><a class="nav-link text-black" href="rfa-assignment.php">Assignment</a></div>' data-bs-placement="bottom">
                            RFA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="recordsLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="Records" data-bs-content='<div><a class="nav-link text-black" href="sena-records.php">SENA Conferences</a><br><a class="nav-link text-black" href="#">Advice Counselling</a></div>' data-bs-placement="bottom">
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


    <section class="welcome-sec" style="padding-top: 10%;">
        <div class="container">
            <h1 class="display-4 text-start" style="font-family: main-font;">WEMP 1.0</h1>
            <h2 class="text-start" style="font-family: Arial, sans serif; font-weight: bold; font-size:2.5rem">
                Welcome to Workers and Employers Management Platforms of Valenzuela City Worker’s Affairs Office
            </h2>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="button">
                    <button type="button" class="btn btn-dark" style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: .2rem; --bs-btn-font-size: 1rem; --bs-btn-font-weight: bold; --bs-btn-border-radius: 30px; width: 15%;">
                        <a class="nav-link" href="../public/home.php" target="_blank">Visit WAO Website
                    </button></a>
                </div>
            </div>
        </div>
    </section>

    <hr class="my-4" style="border-top: 2px solid black;">

    <div class="container">
        <section>
            <div class="announcements">
                <h2 style="font-weight: bold; font-family: sub-font-bold; margin-top: 4%; margin-bottom: 2%">
                    Announcements</h2>
                <p style="font-size: 1.5rem; margin-bottom: 4%">
                    • Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. sed do eiusmod tempor.<br>
                    • Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. sed do eiusmod tempor. <br>
                    • Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. sed do eiusmod tempor.</p>
            </div>
        </section>
    </div>

    <hr class="my-4" style="border-top: 2px solid black;">

    <div class="container">

        <section>
            <div class="announcements">
                <h2 style="font-weight: bold; font-family: sub-font-bold; margin-top: 4%; margin-bottom: 2%">What’s
                    New?</h2>
                <p style="font-size: 1.5rem; margin-bottom: 4%">
                    • Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. sed do eiusmod tempor.<br>
                    • Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. sed do eiusmod tempor. <br>
                    • Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. sed do eiusmod tempor.</p>
            </div>
        </section>
    </div>

    <section class="container-fluid" style="background-color: #E5EEFF; padding: 60px;">
        <div class="row justify-content-center text-center">
            <!-- First div -->
            <div class="col-md-3">
                <p class="mt-3" style="font-family: sub-font;">
                    <span style="font-weight: bold; font-family: sub-font-bold; font-size: 2em; display: block; margin: 0 auto;">MISSION</span>
                    <br>
                    "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                </p>
            </div>

            <!-- Second div -->
            <div class="col-md-3">
                <p class="mt-3" style="font-family: sub-font;">
                    <span style="font-weight: bold; font-family: sub-font-bold; font-size: 2em; display: block; margin: 0 auto;">VISION</span>
                    <br>
                    "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                </p>
            </div>
            <!-- Add more columns for additional divs if needed -->
        </div>
    </section>


    <footer class="footer">
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