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
    <style>
        .container {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../user/dashboard.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="nav nav-underline navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/admin-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA" data-bs-content='<div><a class="nav-link" href="rfa-entries.php" class="btn btn-link">New Entries</a><br><a class="nav-link" href="rfa-assignment.php" class="btn btn-link">Assignment</a></div>' data-bs-placement="bottom">
                            RFA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="recordsLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="Records" data-bs-content='<div><a class="nav-link" href="sena-records.php" class="btn btn-link">SENA Conferences</a><br><a class="nav-link" href="#" class="btn btn-link">Advice Counselling</a></div>' data-bs-placement="bottom">
                            Records
                        </a>
                    </li>
                </ul>
            </div>


            <a href="#">
                <ul class="navbar-nav ml-auto">
                    <a class="nav-link" href="../admin/admin-account.php">
                        <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                        My Account
                    </a>
                    <a class="nav-link" href="../admin/admin-login.php" onclick="showLogoutConfirmation()">
                        <img src="../assets/Sign_out_squre.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                        Log Out
                    </a>
                </ul>
            </a>
        </div>
    </nav>

    <section class="my-account-sec">
        <div class="container">
            <h3 class="display-5 text-start mt-5" style="font-family: sub-font-bold;"> Manage your Account</h3>
            <div class="mb-3 row">
                <div class="col-sm-2 mt-2">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-decoration: none; color: white;">
                        Change Password
                    </button>
                </div>
            </div>

            <!--Modal Change Password-->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container text-align-left">
                                <div class="col">
                                    <h2>IMPORTANT REMINDER</h2>
                                    <p style="font-size: .8"><b>Password must be at least 6 characters long and must
                                            contain the following:</b>
                                        uppercase
                                        letters (A through Z), lowercase letters (a through z), numeric characters
                                        (0-9),
                                        and non-alphanumeric characters (special characters e.g. 1. $, #, %)</p>
                                </div>
                                <div class="mb-2">
                                    <label for="inputPassword5" class="form-label">Current Password</label>
                                    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPassword5" class="form-label">New Password</label>
                                    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                                </div>
                                <label for="inputPassword5" class="form-label">Confirm New Password</label>
                                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                                <div id="passwordHelpBlock" class="form-text">
                                    Your password must be 8-20 characters long, contain letters and numbers, and
                                    must not contain spaces, special characters, or emoji.
                                </div>
                                <div class="modal-footer">
                                    <a class="nav-link" href="update-account.php"><button type="button" class="btn btn-success">Change Password</a></button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    </section>

    <hr class="my-4" style="background-color: black; border-width: 0.1rem; width: 70%">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="update-account.php" method="POST">
                    <div class="mb-3 row">
                        <label for="username" style="font-family: sub-font;" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="font-family: sub-font; background-color: transparent; border: black 1.5px solid;" id="username" placeholder="bayanijuan" name="username">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" style="font-family: sub-font;" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="font-family: sub-font; background-color: transparent; border: black 1.5px solid;" id="name" placeholder="Juan Dela Cruz" name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" style="font-family: sub-font;" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="font-family: sub-font; background-color: transparent; border: black 1.5px solid;" id="email" placeholder="juandelacruz@gmail.com" name="email">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contact" style="font-family: sub-font;" class="col-sm-3 col-form-label">Contact</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="font-family: sub-font; background-color: transparent; border: black 1.5px solid;" id="contact" placeholder="09126549876" name="contact">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-4 mt-4">
                            <a class="nav-link" href="process.php"><button type="submit" style="font-family: sub-font-bold; width: 100%;" class="btn btn-dark btn-sm rounded-pill text-white">Update Account</button></a>
                        </div>
                    </div>
                </form>

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
<script>
    //Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>

</html>