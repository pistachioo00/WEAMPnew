<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
    .navbar-nav .nav-item .nav-link {
        color: white;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="../user/index.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 65px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav nav-underline mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../super-admin/sa-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-dashboard.php">Dashboard</a>
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
                    <a class="nav-link" href="../super-admin/sa-account.php" style="color: white">
                        <img src="../assets/User/User.svg" alt="My-Account"
                            style="width: 20px; height: 20px; margin-right: 5px;">
                        My Account

                    </a>
                    <a class="nav-link" href="logout.php" onclick="showLogoutConfirmation()" style="color: white">
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
    <section class="welcome-sec">
        <div class="container">
            <h1 class="display-4 text-start" style="font-family: main-font; color: #1c05b3;">WEMP 1.0</h1>
            <h2 class="text-start" style="font-family: Arial, sans serif; font-weight: bold; font-size:2.5rem; color:  #465da3;">Welcome to Workers and Employers Management Platforms of Valenzuela City Worker’s Affairs Office</h2>
        </div>

        <div class="container">
            <div class="row justify-content-end">
                <div class="button">
                    <button type="button" class="btn btn-dark" style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: .2rem; --bs-btn-font-size: 1rem; --bs-btn-font-weight: bold; --bs-btn-border-radius: 30px; width: 15%; background-color: #465da3;">
                        <a class="nav-link" href="../user/home.php">Visit WAO Website</a>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <hr class="my-4" style="border-top: 2px solid black;">
    <section class="announcement-sec">
        <div class="container">
            <h1 class="display-2 text-center" style="font-family: main-font; font-size: 2.5rem; padding-top: 7%; padding-bottom: 6%;">ANNOUNCEMENTS</h1>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-sm mb-3 px-sm-3" style="border: 1px solid black; padding: 5%;">
                <p class="mb-0" style="font-size: 20px; font-weight: bold; font-family: sub-font-bold;">Valenzuela suspends business permit of NLEX operator over RFID mess</p>
                <p class="mb-0" style="font-family: sub-font">Valenzuela City Mayor Rex Gatchalian suspended the business permit of NLEX Corporation, the operator of the North Luzon Expressway (NLEX), after the company failed to address the heavy traffic caused by its cashless payment system. </p>
                <a href="https://www.rappler.com/nation/valenzuela-city-rejects-nlex-corporation-appeal-rfid-mess-december-2020/" style="text-decoration: underline; font-family: sub-font">Read More</a>
            </div>
            <div class="col-sm mb-3 px-sm-3 offset-sm-1" style="border: 1px solid black; padding: 5%;">
                <p class="mb-0" style="font-size: 20px; font-weight: bold; font-family: sub-font-bold;">Valenzuela City suspends permit of factory that paid worker in centavo coins</p>
                <p class="mb-0" style="font-family: sub-font">Valenzuela City Mayor Rex Gatchalian has suspended the business permit of Nexgreen Enterprise, a company that paid a worker's salary in centavo coins. The company was given 15 days to address employee concerns, employees received salary in coins wrapped in adhesive tape. <span> <a href="https://www.gmanetwork.com/news/topstories/metro/793485/valenzuela-city-suspends-permit-of-factory-that-paid-worker-in-centavo-coins/story/" style="text-decoration: underline; font-family: sub-font">Read More</a></span></p>
            </div>
            <div class="col-sm mb-3 px-sm-3 offset-sm-1" style="border: 1px solid black; padding: 5%;">
                <p class="mb-0" style="font-size: 20px; font-weight: bold; font-family: sub-font-bold;">Valenzuela fire death trap highlights sweatshop abuses</p>
                <p class="mb-0" style="font-family: sub-font;">The deaths of 72 people in a <span> <a href="https://www.rappler.com/nation/93352-valenzuela-fire-sweatshop-abuses/" style="text-decoration: underline; font-family: sub-font">footwear factory fire</a></span> in Valenzuela city have exposed abusive conditions for millions of poor and desperate workers across the Philippines. The alleged exploitation of workers at the factory, where lax safety standards caused the fire, is anything but unusual across the country, according to the government and unions.</p>
            </div>
        </div>
    </div>

    <section class="new-sec">
        <div class="container">
            <h1 class="display-2 text-center" style="font-family: main-font; font-size: 2.5rem; padding-top: 7%; padding-bottom: 6%;">WHAT'S NEW?</h1>
        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-sm mb-3 px-sm-3" style="border: 1px solid black; padding: 5%;">
                <p class="mb-0" style="font-size: 20px; font-weight: bold; font-family: sub-font-bold;">Valenzuela suspends business permit of NLEX operator over RFID mess</p>
                <p class="mb-0" style="font-family: sub-font">Valenzuela City Mayor Rex Gatchalian suspended the business permit of NLEX Corporation, the operator of the North Luzon Expressway (NLEX), after the company failed to address the heavy traffic caused by its cashless payment system. </p>
                <a href="https://www.rappler.com/nation/valenzuela-city-rejects-nlex-corporation-appeal-rfid-mess-december-2020/" style="text-decoration: underline; font-family: sub-font">Read More</a>
            </div>
            <div class="col-sm mb-3 px-sm-3 offset-sm-1" style="border: 1px solid black; padding: 5%;">
                <p class="mb-0" style="font-size: 20px; font-weight: bold; font-family: sub-font-bold;">Valenzuela City suspends permit of factory that paid worker in centavo coins</p>
                <p class="mb-0" style="font-family: sub-font">Valenzuela City Mayor Rex Gatchalian has suspended the business permit of Nexgreen Enterprise, a company that paid a worker's salary in centavo coins. The company was given 15 days to address employee concerns, employees received salary in coins wrapped in adhesive tape. <span> <a href="https://www.gmanetwork.com/news/topstories/metro/793485/valenzuela-city-suspends-permit-of-factory-that-paid-worker-in-centavo-coins/story/" style="text-decoration: underline; font-family: sub-font">Read More</a></span></p>
            </div>
            <div class="col-sm mb-3 px-sm-3 offset-sm-1" style="border: 1px solid black; padding: 5%;">
                <p class="mb-0" style="font-size: 20px; font-weight: bold; font-family: sub-font-bold;">Valenzuela fire death trap highlights sweatshop abuses</p>
                <p class="mb-0" style="font-family: sub-font;">The deaths of 72 people in a <span> <a href="https://www.rappler.com/nation/93352-valenzuela-fire-sweatshop-abuses/" style="text-decoration: underline; font-family: sub-font">footwear factory fire</a></span> in Valenzuela city have exposed abusive conditions for millions of poor and desperate workers across the Philippines. The alleged exploitation of workers at the factory, where lax safety standards caused the fire, is anything but unusual across the country, according to the government and unions.</p>
            </div>
        </div>
    </div>


    <section class="container-fluid" style="background-color: #E5EEFF; padding: 60px;">
        <div class="row justify-content-center text-center">
            <!-- First div -->
            <div class="col-md-3">
                <p class="mt-3" style="font-family: sub-font;">
                    <span style="font-weight: bold; font-family: sub-font-bold; font-size: 2em; display: block; margin: 0 auto;">MISSION</span> <br>
                    "To protect workers, promote their welfare, and maintain industrial peace"
                </p>
            </div>

            <!-- Second div -->
            <div class="col-md-3">
                <p class="mt-3" style="font-family: sub-font;">
                    <span style="font-weight: bold; font-family: sub-font-bold; font-size: 2em; display: block; margin: 0 auto;">VISION</span> <br>
                    "Every workers in Valenzuela attains full, decent and productive employment"
                </p>
            </div>
            <!-- Add more columns for additional divs if needed -->
        </div>
    </section>

    <footer class="footer" style="background-color: #C80000;">
        <div class="container-footer">
            <p style="color: white;">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>