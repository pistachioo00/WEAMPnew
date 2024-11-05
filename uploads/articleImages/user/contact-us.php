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
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="../css/styles.css">

    <style>
        .container {
            overflow: hidden;
        }

        .notification-panel {
            width: 100%;
            max-width: 300px;
            position: fixed;
            right: 0;
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
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color:#C80000; font-family: sub-font-bold;">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../user/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../user/rfa.php">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../user/dashboard-status.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../user/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../user/contact-us.php">Contact</a>
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
    <div class="collapse notification-panel" id="collapseNotifications" style="width: 20%; left: 59%; top: 0; max-height: 400px; overflow-y: auto; font-family: Arial; padding-top: 5%; z-index: 9999;">
        <div class="card card-body">
            <ul class="notification-list">
                <!-- Example notifications -->
                <li>No notifications</li>
            </ul>
        </div>
    </div>

    <div class="container mt-3 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="text-center" style="font-family: sub-font-bold; color: #1C05B3">Contact us</h1>
                <p class="text-center" style="font-weight: 300; font-family: 'inter-med'">Email us with any questions or inquiries or call <span class="fw-bold">8352-1000</span> (local <span class="fw-bold">1316</span> or <span class="fw-bold">2974</span>). We would be
                    happy to answer your questions and set up a meeting with you. Worker’s Affairs Office can help
                    set you apart from the SENA!.</p>
            </div>
            <div class="text-center mb-4">
                <img src="../assets/contact-us.svg" alt="Descriptive Alt Text" style="max-width: 100%; height: auto;">
            </div>
            <form action="process_form.php" method="POST" class="col-md-7">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control form-control-lg" style="background-color: #F0F2F5; border: none; font-family: 'inter-med'; color: #898989; font-size: 15px" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control form-control-lg" style="background-color: #F0F2F5; border: none; font-family: 'inter-med'; color: #898989; font-size: 15px" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control form-control-lg" style="background-color: #F0F2F5; border: none; font-family: 'inter-med'; color: #898989; font-size: 15px" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control form-control-lg" style="background-color: #F0F2F5; border: none;  font-family: 'inter-med'; color: #898989; font-size: 15px" id="subject" name="subject" placeholder="Subject Inquiry" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <textarea class="form-control form-control-lg" style="background-color: #F0F2F5; border: none; font-family: 'inter-med'; color: #898989; font-size: 15px" id="note" name="note" rows="4" placeholder="Write to us about how we can help you..."></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="subscribe" name="subscribe">
                        <label class="form-check-label text-secondary ms-2" for="subscribe">Send me a copied email</label>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" style="width: 150px; height: 35px; color: white; background-color: #007BFF; border: none;" class="btn btn-dark btn-sm text-white fw-bold">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container text-center">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        function showLogoutConfirmation() {
            $('#logoutConfirmationModal').modal('show');
        }

        function logout() {
            window.location.href = "logout.php";
        }

        function toggleCollapse() {
            var notificationCollapse = document.getElementById("collapseNotifications");
            if (notificationCollapse.classList.contains("show")) {
                notificationCollapse.classList.remove("show");
            }
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
    </script>
</body>

</html>