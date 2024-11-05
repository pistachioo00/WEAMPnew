<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Worker's Affairs Office</title>
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

        .container .col {
            border: 2px solid white;
            padding-top: 2%;
            padding-left: 3%;
            border-radius: 5px;
            box-shadow: 0 0 8px rgba(31, 30, 30, 0.2);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 70px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="nav nav-underline navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../super-admin/sa-dashboard.php">Dashboard</a>
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


    <h2 style="font-family: sub-font-bold; padding-left: 16%; padding-top: 10%; color: #304DA5;">
        Create SEADO Account
    </h2><br>
    <!-- <div class="container">
        <div class="accordion" id="accordionPanelsStayOpenExample" style="border: 2px solid black; table-layout: fixed;">
            <div class="accordion-item">
                <h2><img src="../assets/register-account.png" alt="Image" style="margin-right: 5px; width: 30px; height: 30px;">IMPORTANT REMINDERS</h2>
                <h2 class="accordion-header"></h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body" style="font-size: 1.1rem">
                        <strong>1. Email must be unique.</strong> You
                        cannot use a single email address for multiple user accounts. <br>
                        <strong>2. The registered email address will also be the username for the
                            account.</strong><br>
                        <strong>3. A confirmation email will be sent to the email address used. </strong> User must
                        be able to confirm
                        his/her account before she can use it. <br>
                        <strong>4. For National and Central Operations, please follow this example when encoding the
                            MOBILE
                            number (an SMS will be sent to new user): </strong><code style="font-size: 1.1rem">09112545245</code>. No need to include hyphens, spaces,
                        or country code.
                    </div>
                </div>
            </div>
        </div>
    </div><br> -->

    <div class="container" style="padding-bottom: 5%; width: 60%;">
        <div class="container text-align-left">
            <div class="container-sm">
                <div class="col">
                    <form action="create-admin-process.php" method="POST">
                        <div class="mb-2">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" style="width: 45%;" id="fullName" name="fullName" placeholder="Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" class="form-control" style="width: 45%;" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="mb-2">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" style="width: 45%;" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Enter Password</label>
                            <input type="password" class="form-control" style="width: 45%;" id="password" name="password" placeholder="Enter password" minlength="8" required>
                        </div>
                        <div class="mb-2">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" style="width: 45%;" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" minlength="8" required>
                        </div>
                        <div class="form-group col-md-3 d-flex align-items-start justify-content-between mb-2">
                            <label for="role" class="form-label" style="padding-right: 1%; padding-top: 2%;">Select User Role
                            </label>
                            <select id="role" name="role" class="form-control" style="background-color: transparent; border: 1px black solid;">
                                <option value="Admin">Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                        </div>


                        <div class="btn-container" style="border-top: 3px solid #757575; width: 65%; padding-top: 2%;  margin-bottom: 2%">
                            <a>
                                <div class="left-btn col-md-65">
                                    <div id="liveAlertPlaceholder"></div>
                                    <button type="submit" class="btn btn-success" id="liveAlertBtn" style="margin-right: 20%;">Create</button>
                                </div>
                            </a>
                            <a href="sa-user-management.php">
                                <div class="left-btn col-md-85">
                                    <button type="button" class="btn btn-secondary" style="margin-left: 30%;">Close</button>
                                </div>
                            </a>
                        </div>
                    </form>
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
<script src="super-admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script>
    // Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>

</html>