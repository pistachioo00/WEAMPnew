<?php

include 'signin-check.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
    .form-check {
        display: flex;
        align-items: center;
    }

    .form-check-input {
        width: 16px;
        /* Adjust to match the size you need */
        height: 16px;
        /* Adjust to match the size you need */
        margin: 0;
    }

    .form-check-label {
        font-family: 'inter-med';
        font-size: 12px;
        margin-bottom: 0;
        margin-left: 8px;
        /* Adjust spacing between checkbox and label */
        display: inline-flex;
        /* Ensures label is inline and centered */
        align-items: center;
        /* Centers label text vertically */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color:#C80000; font-family: sub-font-bold;">
        <div class="container">
            <a class="navbar-brand" href="../public/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white;" onclick="showReg()" href="../public/signup.php">RFA</a>
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
                            <img src="../assets/Sign_in_squre.svg" alt="Sign-in" style="width: 20px; height: 20px; margin-right: 5px;">
                            Sign in
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>
</body>
<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>