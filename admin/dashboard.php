    <?php
    include 'auth-admin.php';
    checkAdminLogin();
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../css/dashboard.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS Style -->
        <link rel="stylesheet" href="../css/styles.css">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <style>
            .container {
                overflow: hidden;
            }

            .sidebar {
                display: none;
                /* Initially hide the sidebar */
                background-color: white;
                border: 1.8px black solid;
                width: 250px;
                position: fixed;
                top: 0;
                right: 0;
                height: 100%;
                z-index: 1000;
                transition: right 0.3s ease;
            }

            .sidebar.visible {
                display: block;
                /* Show the sidebar when visible class is added */
            }


            .mt-5 {
                margin-top: 5rem;
            }

            .my-5 {
                margin-top: 5rem;
                margin-bottom: 5rem;
            }

            .text-center {
                text-align: center;
            }

            .nav-link {
                display: block;
                padding: 10px 0;
                text-decoration: none;

            }

            .nav-link:hover {
                text-underline-offset: 10px;
            }
        </style>
    </head>

    <body>
        <!-- Sidebar -->
        <div class="sidebar mt-5" id="sidebar">
            <div class="container my-5">
                <h3 class="fs-7 text-center" style="font-family: sub-font-bold; padding-top:15%">Dashboard</h3>
                <hr style="background-color: black;">
                <a href="#" class="nav-link mt-3" style="font-size: 1rem; font-family: sub-font; color: black;">
                    SENA Assistance Desk
                    <img src="../assets/Expand_right.svg" alt="expand_right">
                </a>
            </div>
        </div>

        <!-- Main content -->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #C80000;">
            <div class="container">
                <a class="navbar-brand" href="../admin/home.php">
                    <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
                </a>
                <button style="width: 10%; height: 50%; background-color: #fff; border: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: #C80000;"></span>
                </button>
                <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-underline mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../admin/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="../admin/dashboard.php" id="dashboardLink">Dashboard</a>
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
        <section class="welcome-sec">
            <div class="container">
                <h1 class="display-3 text-start" style="font-family: main-font;">HELLO</h1>
                <h2 class="text-start" style="font-family: Arial, sans serif; font-weight: bold">SEADO #1
                </h2>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="rectangle p-3 text-center">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">RFA ENTRIES</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold mb-0">2</h1>
                            <img src="../assets/Arhive_alt_add_list_light.svg" alt="" class="img-fluid ms-3" style="height: 75px; width: 75px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="rectangle p-3 text-center">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">SENA CONFERENCE</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold mb-0">2</h1>
                            <img src="../assets/Group.svg" alt="" class="img-fluid ms-3" style="height: 75px; width: 75px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="rectangle p-3 text-center">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">ADVICE & COUNSELLING</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold mb-0">1</h1>
                            <img src="../assets/Vector_5.svg" alt="" class="img-fluid ms-3" style="height: 75px; width: 75px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="rectangle p-3 text-center">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">SETTLED CASES</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold mb-0">2</h1>
                            <img src="../assets/settled-cases.svg" alt="" class="img-fluid ms-3" style="height: 75px; width: 75px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="rectangle p-3 text-center">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">SETTLEMENT AGREEMENT</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold mb-0">2</h1>
                            <img src="../assets/settled-agreement.svg" alt="" class="img-fluid ms-3" style="height: 75px; width: 75px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="rectangle p-3 text-center">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">REFERRALS</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold mb-0">0</h1>
                            <img src="../assets/Folder_send.svg" alt="" class="img-fluid ms-3" style="height: 75px; width: 75px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="rectangle p-3 text-center">
                        <h4 class="fw-bold mt-2" style="font-family: sub-font-bold">WITHDRAWALS</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-1 fw-bold mb-0">1</h1>
                            <img src="../assets/Arhive_load_light.svg" alt="" class="img-fluid ms-3" style="height: 75px; width: 75px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5" style="padding-bottom:5%"></div>

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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="dashboard.js"></script>
    <script>
        //Initialize popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });


        function showLogoutConfirmation() {
            $('#logoutConfirmationModal').modal('show');
        }

        function logout() {
            window.location.href = "logout.php";
        }

        document.addEventListener('DOMContentLoaded', function() {
            var dashboardLink = document.getElementById('dashboardLink');
            var sidebar = document.getElementById('sidebar');
            var clickCount = 0;

            dashboardLink.addEventListener('click', function(event) {
                clickCount++;
                if (clickCount % 2 === 1) {
                    sidebar.classList.add('visible');
                } else {
                    sidebar.classList.remove('visible');
                }
                event.preventDefault(); // Prevent default link behavior
            });
        });
    </script>

    </html>