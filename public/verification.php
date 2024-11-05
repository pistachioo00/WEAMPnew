<?php

require_once './config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }

        .form-group {
            position: relative;
        }

        .field-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            pointer-events: none;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color:#C80000; font-family: sub-font-bold;">
        <div class="container">
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link" style="text-decoration: none; color: white;" href="../public/signup.php">RFA</a>
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
    <section class="news-sec">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <a href="#" class="back-button mt-5">
                    <img src="../assets/Expand_left.svg" alt="Back-Button" style="width: 3rem; height: 3rem;">
                </a>
                <div class="col-12 text-center" style="margin-bottom: -10px; padding-top: 5%">
                    <h1 class="fs-3" style="font-family: sub-font-bold;">PLEASE VERIFY YOUR EMAIL ADDRESS</h1>
                    <div class="line"></div>
                    <p class="fs-5">A verification code has been sent to <br>
                        <span class="fw-bold"><?php echo $email; ?></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="text-center mt-3">
            <p class="fs-5 text-secondary">
                Please check your inbox and enter the verification<br> code below to
                verify your email address. The code<br> will expire in 14:40.
            </p>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form>
                    <div class="form-group" style="position: relative;">
                        <input type="text" class="form-control" placeholder="Username / Email Address" style="background-color: #A6C7D9; border-left: none; padding-right: 40px;" required>
                        <img src="../assets/User.svg" alt="User Icon" class="field-icon" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); height: 20px;">
                    </div>
                    <div class="d-grid gap-2 col-md-7 mx-auto mt-3">
                        <button class="btn btn-primary bg-black btn-lg fw-bold" type="button">VERIFY</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link text-black text-decoration-none">Resend code</a>
                    <div class="mx-5"></div>
                    <a href="#" class="btn btn-link text-black text-decoration-none">Change email</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer fixed-bottom">
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

</html>