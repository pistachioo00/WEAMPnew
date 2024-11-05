<?php

include 'signin-check.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

        .rec-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
            gap: 20px;
        }

        #rec {
            border: 1.5px solid black;
            padding: 20px;
            margin-bottom: 50px;
            background-color: transparent;
            height: 400px;
            width: 360px;
        }



        /* Adjust h1 size for smaller screens */
        @media (max-width: 768px) {
            h1.display-2 {
                font-size: 2.5rem;
                padding-top: 5%;
                padding-bottom: 4%;
            }

            .services-sec img {
                width: 80px;
                /* Adjust width as needed */
                height: 50px;
                /* Adjust height as needed */
            }

            .services-sec p {
                font-size: 14px;
                /* Adjust font size as needed */
            }
        }

        @media (max-width: 480px) {
            h1.display-2 {
                font-size: 2rem;
                padding-top: 3%;
                padding-bottom: 3%;
            }

            .services-sec img {
                width: 60px;
                /* Adjust width as needed */
                height: 40px;
                /* Adjust height as needed */
            }

            .services-sec p {
                font-size: 12px;
                /* Adjust font size as needed */
            }

            body {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#C80000;">
        <div class="container">
            <a class="navbar-brand" href="../public/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/signup.php" id="rfaLink">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/contact-us.php">Contact</a>
                    </li>
                    <div class="mr-5"></div>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/signup.php">
                            <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                            Register
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/login.php" onclick="showLogoutConfirmation()">
                            <img src="../assets/Sign_in_squre.svg" alt="Sign-in" style="width: 20px; height: 20px; margin-right: 5px;">
                            Sign in
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-5" style="padding-top:4%; margin-bottom: 20px;">
        <img src="../assets/home-bg.svg" alt="" style="width: 100%; ">
    </div>


    <div class="container">
        <section class="container text-center">
            <div class="clock">
                <div id="Date" style="font-family: 'Arial', sans-serif; color: #465DA3;">Sunday, 28 February</div>
            </div>
        </section>


        <?php
        // Define variables
        $solved_cases = 525;

        // Output the number of solved cases and display text with font face
        echo "<div style='text-align: center; color: #465DA3'>";
        echo "<h3 style='margin: 0; font-family: main-font; padding-top: 3%;'>$solved_cases</h3><p style='margin: 0; font-family: 'Arial', sans serif'>Solved Cases</p>";
        echo "</div>";
        ?>

        <section class="services-sec">
            <div class="container">
                <h1 class="display-2 text-center" style="font-family: main-font; font-size: 2.5em; padding-top: 7%; padding-bottom: 3%; color:#465DA3">SERVICES</h1>
            </div>
        </section>

        <div class="container">
            <ul class="list-unstyled d-flex justify-content-center">
                <li class="text-center mx-2" style="padding-right: 3rem">
                    <a href="../public/signup.php">
                        <img src="../assets/Form.svg" alt="Form" class="img-fluid" style="width: 100px; height: 70px;">
                        <p style="color: black">Request for</br> Assistance</p>
                    </a>
                </li>
                <li class="text-center mx-2">
                    <a href="#">
                        <img src="../assets/seminar.svg" alt="Seminar" class="img-fluid" style="width: 100px; height: 70px;">
                        <p style="color: black">Seminar</p>
                    </a>
                </li>
                <li class="text-center mx-2" style="padding-left: 3rem">
                    <a href="#">
                        <img src="../assets/note.svg" alt="Quit Claim" class="img-fluid" style="width: 100px; height: 70px;">
                        <p style="color: black">Quit Claim</p>
                    </a>
                </li>
            </ul>
        </div>

        <section class="assist-sec">
            <div class="container">
                <h1 class="display-2 text-center" style="font-family: main-font; font-size: 2.5rem; padding-top: 7%; padding-bottom: 6%; color: #465DA3">HOW CAN WE ASSIST YOU?</h1>
            </div>
        </section>

        <div class="centered-button">
            <a href="#" style="font-family: sub-font; color: #465DA3">For Requesting Party</a>
        </div>
        <section class="container">
            <div class="row">
                <!-- First div -->
                <div class="col-md-4">
                    <div class="image-div">
                        <img src="../assets/Online.svg" alt="Online" class="img-fluid">
                        <p class="mt-3" style="font-family: sub-font;">
                            <span style=" font-family: sub-font-bold;">1. REGISTER </span><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sed do eiusmod tempor.
                        </p>
                    </div>
                </div>

                <!-- Second div -->
                <div class="col-md-4">
                    <div class="image-div">
                        <img src="../assets/Clock.svg" alt="Clock" class="img-fluid">
                        <p class="mt-3" style=" font-family: sub-font;">
                            <span style=" font-family: sub-font-bold;">2. VERIFICATION / APPROVA</span> <br>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
                <!-- Add more columns for additional divs if needed -->

                <!-- Third div -->
                <div class="col-md-4">
                    <div class="image-div">
                        <img src="../assets/survey.svg" alt="Survey" class="img-fluid">
                        <p class="mt-3" style=" font-family: sub-font">
                            <span style=" font-family: sub-font-bold;">3. START POSTING</span> <br>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="news-sec">
            <div class="container">
                <h1 class="display-2 text-center" style="font-family: main-font; font-size: 2.5rem; padding-top: 7%; padding-bottom: 6%; color: #465DA3">LATEST NEWS</h1>
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

        <section class="news-sec">
            <div class="container">
                <h1 class="display-2 text-center" style="font-family: main-font; font-size: 3rem; padding-top: 7%; padding-bottom: 6%; color: #465DA3">ANNOUNCEMENTS</h1>
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
    </div>

    <div style = "padding-top: 3%"></div>

    <section class="container-fluid" style="background-color: #E5EEFF; padding: 60px;">
        <div class="row justify-content-center text-center">
            <!-- First div -->
            <div class="col-md-3">
                <p class="mt-3" style="font-family: sub-font;">
                    <span style="font-weight: bold; font-family: sub-font-bold; font-size: 2em; display: block; margin: 0 auto; color: #465DA3">MISSION</span> <br>
                    "To protect workers, promote their welfare, and maintain industrial peace"
                </p>
            </div>

            <!-- Second div -->
            <div class="col-md-3">
                <p class="mt-3" style="font-family: sub-font;">
                    <span style="font-weight: bold; font-family: sub-font-bold; font-size: 2em; display: block; margin: 0 auto; color: #465DA3">VISION</span> <br>
                    "Every workers in Valenzuela attains full, decent and productive employment"
                </p>
            </div>
            <!-- Add more columns for additional divs if needed -->
        </div>
    </section>

    <div style = "padding-top: 5%"></div>

    <footer class="footer" style="background-color: #26272B;">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function clock() {

        var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

        var today = new Date();

        document.getElementById('Date').innerHTML = (dayNames[today.getDay()] + ", " + monthNames[today.getMonth()] + ' ' + today.getDate());
    }
    var inter = setInterval(clock, 400);
</script>

</html>