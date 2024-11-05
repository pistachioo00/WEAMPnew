<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFA Entries - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <a class="navbar-brand" href="../user/dashboard.php">
                    <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
                </a>
                <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../user/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/rfa.php">RFA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/dashboard-rfa-entries.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/contact-us.php">Contact</a>
                        </li>
                        <div class="mr-5"></div>
                        <li>
                            <a class="nav-link" href="../user/my-account.php">
                                <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                                My Account
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#" onclick="showLogoutConfirmation()">
                                <img src="../assets/Sign_out_squre.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                                Log Out
                            </a>
                        </li>
                    </ul>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collapsible content -->
        <div class="collapse position-fixed" style="width: 20%; left: 70%; top: 0; max-height: 400px; overflow-y: auto; font-family: Arial; padding-top: 5%; z-index: 9999;" id="collapseNotifications">
            <div class="card card-body">
                <ul class="notification-list">
                    <!-- Example notifications -->
                    <li>Successfully created an Account</li>
                    <li>Successfully submitted RFA</li>
                    <li>Update: Status for RFA</li>
                </ul>
            </div>
        </div>




        <div class="container" style="padding-top: 10%;">
            <h2 style="font-family: sub-font-bold;">RFA ENTRIES</h2>
            <table class="table table-striped" style="border: 2px black solid">
                <thead style="border: 2px black solid">
                    <tr>
                        <th>Claims/Issues</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody style="border: 2px black solid">
                    <tr style="border: 2px black solid; ">
                        <td>Illegal Dismissal</td>
                        <td>Maria Clara Buenavista</td>
                        <td>2024-03-08</td>
                        <td>Settled<button class="btn col-md-2"><img src="../assets/visibility.svg" alt=""></button></td>
                    </tr>
                    <tr>
                        <td>Unfair Labor Practice</td>
                        <td>Padre Burgos</td>
                        <td>2024-03-02</td>
                        <td class="fw-bold">Acknowledged</td>
                    </tr>
                </tbody>
            </table>
        </div>






        <footer class="footer fixed-bottom"> <!-- Ensure navbar stays on bottom -->
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

    function resetCollapse() {
        // Check if the window width is greater than a certain threshold (e.g., 992 pixels for Bootstrap's desktop breakpoint)
        if (window.innerWidth >= 992) {
            var collapseElement = document.getElementById("collapseNotifications");
            if (collapseElement.classList.contains("show")) {
                collapseElement.classList.remove("show");
            } else {
                collapseElement.classList.add("show");
            }
        }
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