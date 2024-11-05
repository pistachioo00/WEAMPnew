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
    <title>About</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%; background-color: #fff; border: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #C80000;"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mr-5">
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
    <div class="collapse position-fixed" style="width: 20%; left: 65%; top: 0; max-height: 400px; overflow-y: auto; font-family: Arial; padding-top: 5%; z-index: 9999;" id="collapseNotifications">
        <div class="card card-body">
            <ul class="notification-list">
                <!-- Example notifications -->
                <li>No notifications</li>
            </ul>
        </div>
    </div>





    <div class="container">
        <div class="row justify-content-center" style="padding-top: 10%">
            <div class="col-md-10 mt-5">
                <h1 class="mt-3" style="font-family: sub-font-bold">About us</h1>
                <p>Worker's Affairs Office (WAO)
                    - As the city’s labor administration and relations department, the Worker’s Affairs Office facilitates and settles the city’s labor-management disputes. </p>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../assets/about.svg" class="d-block w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/about2.jpg" class="d-block w-100" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src=../assets/about3.jpg class="d-block w-100" alt="Slide 3">
                        </div>
                        <div class="carousel-item">
                            <img src=../assets/about4.jpg class="d-block w-100" alt="Slide 3">
                        </div>
                        <div class="carousel-item">
                            <img src=../assets/about5.jpg class="d-block w-100" alt="Slide 3">
                        </div>
                        <div class="carousel-item">
                            <img src=../assets/about6.jpg class="d-block w-100" alt="Slide 3">
                        </div>
                        <div class="carousel-item">
                            <img src=../assets/about7.jpg class="d-block w-100" alt="Slide 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-3 centered-content">
                <div>
                    <p class="text-start">
                        On the chosen day, the Valenzuela Virtual Traffic Investigation and Prosecution Center (VTIPC) was bustling with activity, marked by the exchange of ideas and collaboration during various seminars conducted. Participants engaged in discussions aimed at enhancing traffic management strategies and fostering safer road conditions within the community. </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-3 mb-4 centered-content">
                <div>
                    <p class="text-start">Additionally, the day witnessed significant progress in resolving cases, with updated reports highlighting successful resolutions to various legal matters. Among these achievements was the closure of several cases related to labor disputes, demonstrating the commitment of authorities to uphold workers' rights and ensure fair treatment in the workplace. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4">
                <img src="../assets/men-suit.svg" alt="Placeholder Image" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <p>Furthermore, the Valenzuela Anti-Illegal Recruitment Task Force (VAIRTF) addressed a myriad of issues, including money claims concerning wage, overtime pay, night shift differential pay, service incentive leave, holiday pay, as well as contributions to SSS, PhilHealth, and Pag-Ibig. These efforts underscored the government's dedication to safeguarding the welfare of workers and promoting equitable labor practices across industries.</p>
                <p>Additionally, cases pertaining to unfair labor practices (ULP) and illegal dismissal were thoroughly investigated and resolved, reflecting the city's staunch stance against any form of exploitation or unjust treatment of employees. Through decisive action, perpetrators of such violations were held accountable, thereby fostering a more conducive and respectful work environment for all.</p>
                <p>Moreover, non-compliance with occupational health and safety standards was addressed promptly, ensuring that workplaces adhere to regulations aimed at safeguarding employees' well-being. By enforcing these standards, Valenzuela continues to prioritize the health and safety of its workforce, reducing risks and promoting sustainable development.</p>
                <p>Lastly, the resolution of certification union disputes underscored the city's commitment to fostering harmonious labor relations and protecting workers' rights to organize. Through mediation and dialogue, conflicts were resolved amicably, paving the way for constructive engagement between employers and labor organizations. This collaborative approach reflects Valenzuela's dedication to creating an inclusive and equitable work environment for all stakeholders involved.</p>
            </div>
        </div>
    </div>



    <footer class="footer">
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

    // CAROUSEL SCRIPT
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 4000
        });
    });
</script>

</html>