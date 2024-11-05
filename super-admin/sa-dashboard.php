<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Worker's Affairs Office</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
.navbar-nav .nav-item .nav-link {
    color: white;
}

.rectangle {
    background-color: white;
    border: 2.5px solid #146fca;
}

.rectangle h4 {
    font-family: sub-font-bold;
    color: #304da5;
}

.rectangle h1 {
    margin-bottom: 0;
    padding-right: 35%;
    color: #465da3;
}

/* 
    .container {
        overflow: hidden;
    }

    .sidebar {
        display: none;
         // Initially hide the sidebar
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
        // Show the sidebar when visible class is added 
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
    } */
</style>

<body>
    <!-- Sidebar -->
    <div class="sidebar mt-5" style="background-color: #FFE5E5; border: 1.8px grey solid">
        <div class="container my-5">
            <h3 class="fs-7 text-center" style="font-family: sub-font-bold; padding-top:35%; color: #304DA5;">Dashboard
            </h3>
            <hr style="background-color: black;">
            <a href="#" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                SENA Assistance Desk
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="sa-user-management.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                User Management
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="sa-rfa-status.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                RFA Status
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../super-admin/articles/article-dashboard.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Articles
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <!-- <a href="#" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Seminar
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a> -->
            <a href="../super-admin/sa-records.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Records Management
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
        </div>
    </div>

    <!-- Main content -->
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
                <a class="nav-link" href="../logout.php" onclick="showLogoutConfirmation()" style="color: white">
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

        <section class="welcome-sec">
            <div class="container">
                <h1 class="display-1 text-start" style="font-family: main-font;color: #304DA5;">HELLO!</h1>
                <h2 class="text-start" style="font-family: Arial, sans serif; font-weight: bold; color: #465DA3;">
                    SuperAdmin</h2>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2">RFA ENTRIES</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Flex container -->
                            <h1 class="display-1 fw-bold"
                                style="margin-bottom: 0;  padding-right: 30%; color: #465DA3; ">2</h1>
                            <!-- Remove margin bottom for alignment -->
                            <img src="../assets/undraw/sa_new_entries.svg" alt=""
                                style="max-width: 50%; padding-left: 10px; padding-top: 6%">
                            <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2">SENA CONFERENCE</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0; padding-right: 34%; color: #465DA3">2
                            </h1> <!-- Remove margin bottom for alignment -->
                            <img src="../assets/undraw/sa_conference.svg" alt=""
                                style="max-width: 150%; padding-left: 10px; padding-top: 8%">
                            <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2">ADVICE & COUNSELLING</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 32%">1</h1>
                            <!-- Remove margin bottom for alignment -->
                            <img src="../assets/undraw/sa_advice.svg" alt=""
                                style="max-width: 55%; padding-left: 10px; padding-top: 5px">
                            <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2">SETTLED CASES</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 34%">2</h1>
                            <!-- Remove margin bottom for alignment -->
                            <img src="../assets/undraw/sa_settled.svg" alt=""
                                style="max-width: 55%; padding-left: 10px; padding-top: 30px">
                            <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2">SETTLEMENT AGREEMENT</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0; padding-right: 38%">2</h1>
                            <!-- Remove margin bottom for alignment -->
                            <img src="../assets/undraw/sa_agreement.svg" alt=""
                                style="max-width: 160%; padding-left: 10px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2">REFERRALS</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 35%">0</h1>
                            <!-- Remove margin bottom for alignment -->
                            <img src="../assets/undraw/sa_referral.svg" alt=""
                                style="max-width: 100%; padding-left: 10px;"> <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom:20%">
            <div class="row">
                <div class="col-md-4">
                    <div class="rectangle">
                        <h4 class="fw-bold mt-2">WITHDRAWALS</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Flex container -->
                            <h1 class="display-1 fw-bold" style="margin-bottom: 0;  padding-right: 33%">1</h1>
                            <!-- Remove margin bottom for alignment -->
                            <img src="../assets/undraw/sa_withdrawals.svg" alt=""
                                style="max-width: 100%; padding-left: 10px; padding-top: 8%">
                            <!-- Add padding-left for spacing -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer" style="background-color: #C80000;">
            <div class="container-footer" style="color: white;">
                <p>Copyright 2024 © All Rights Reserved</br>
                    Worker’s Affairs Office</p>
            </div>
        </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="dashboard.js"></script>
<script>
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