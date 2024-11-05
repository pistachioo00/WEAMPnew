<?php

include 'signin-check.php';

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
    <!-- CSS  -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }

        /* Container for the carousel */
        .carousel-container {
            position: relative;
            width: 100%;
            /* Full width of the screen */
            max-width: 100vw;
            /* Full viewport width */
            overflow-x: hidden;
            /* Only hide horizontal overflow to allow vertical shadow */
            padding: 20px 0;
            /* Add vertical padding to make room for shadow */
            margin: 0 auto;
        }

        /* Carousel wrapper for the cards */
        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 20px;
            /* Add gap between the cards */
        }

        /* Individual cards */
        .carousel-card {
            flex: 0 0 auto;
            /* Ensure cards maintain their set width */
            width: 600px;
            /* Card width */
            height: 488px;
            /* Card height */
            background-color: #fff;
            border-radius: 18px;
            box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
            /* Visible shadow */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 10px;
            /* Space between cards */
        }

        .carousel-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Circular buttons */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .left-btn {
            left: 10px;
        }

        .right-btn {
            right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#C80000; font-family: sub-font-bold;">
        <div class="container">
            <a class="navbar-brand" href="../public/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/signup.php" onclick="showReg()">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/contact-us.php">Contact</a>
                    </li>
                    <div class="mr-5"></div>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/signup.php">
                            <img src="../assets/User.svg" alt="Register" style="width: 20px; height: 20px; margin-right: 5px;">
                            Register
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/login.php">
                            <img src="../assets/Sign_in_square.svg" alt="Sign-in" style="width: 20px; height: 20px; margin-right: 5px;">
                            Sign in
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
        <div style="float: right; opacity: 0.5; padding-top: 5%">
            <img src="../assets/letter-v.svg" alt="">
        </div>
        <div class="row justify-content-center" style="padding-top:15%">
            <div class="col-md-10 mt-5">
                <h1 class="mt-3" style="font-family: sub-font-bold; color: #1C05B3; font-size: 30px">About us</h1>
                <p style="font-family: 'inter-bold'; font-size: 30px; line-height: 1.1;">
                    Serve as the labor administration and relations department as facilitating body to settle
                    <span style="color:#007BFF">labor-management disputes.</span>
                </p>

            </div>
        </div>
    </div>

    <div style="padding: 50px 20px 50px 310px ;display: grid; grid-template-columns: repeat(5, 100px); gap: 100px; opacity: 0.5">
        <img src="../assets/image 12.svg" alt="Image 1" width="100" height="100">
        <img src="../assets/image 13.svg" alt="Image 2" width="100" height="100">
        <img src="../assets/image 14.svg" alt="Image 3" width="100" height="100">
        <img src="../assets/image 15.svg" alt="Image 4" width="100" height="100">
        <img src="../assets/image 16.svg" alt="Image 5" width="100" height="100">
    </div>

    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-card">
                <img src="image1.jpg" alt="Card 1">
            </div>
            <div class="carousel-card">
                <img src="image2.jpg" alt="Card 2">
            </div>
            <div class="carousel-card">
                <img src="image3.jpg" alt="Card 3">
            </div>
            <div class="carousel-card">
                <img src="image4.jpg" alt="Card 4">
            </div>
            <div class="carousel-card">
                <img src="image5.jpg" alt="Card 5">
            </div>
        </div>
        <button class="carousel-btn left-btn">Left</button>
        <button class="carousel-btn right-btn">Right</button>
    </div>



    <div style="padding-top: 10%">

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

    const carousel = document.querySelector('.carousel');
    const leftBtn = document.querySelector('.left-btn');
    const rightBtn = document.querySelector('.right-btn');
    const totalCards = document.querySelectorAll('.carousel-card').length;

    let currentIndex = 0;

    rightBtn.addEventListener('click', () => {
        if (currentIndex < totalCards - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; // Loop back to the first card
        }
        updateCarousel();
    });

    leftBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalCards - 1; // Loop to the last card
        }
        updateCarousel();
    });

    function updateCarousel() {
        const cardWidth = document.querySelector('.carousel-card').offsetWidth;
        carousel.style.transform = `translateX(-${cardWidth * currentIndex}px)`;
    }
</script>

</html>