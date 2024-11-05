<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
.navbar-nav .nav-item .nav-link {
    color: white;
}

.container .row {
    color: #465DA3;
}
</style>

<body>
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
                </a>
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
        <div class="modal fade" id="logoutConfirmationModal" tabindex="-1"
            aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
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


        <section class="my-account-sec">
            <div class="container" style="padding-top: 4%; color: #465DA3">
                <h3 class="display-5 text-start mt-5" style="font-family: sub-font-bold;">My Account</h3>
            </div>
        </section>

        <hr class="my-3" style="background-color: black; border-width: 0.1rem; width: 60%">

        <?php
        require_once '../public/config.php';

        $adminID = 10;  // Replace this with the actual adminID, potentially from session data
        $currentUsername = '';
        $currentfullName = '';
        $currentemail = '';

        $query = $conn->prepare("SELECT fullName, username, email FROM `admin` WHERE adminID = ?");
        $query->bind_param("i", $adminID);
        $query->execute();
        $query->bind_result($fullName, $username, $email);
        if ($query->fetch()) {
            $currentUsername = htmlspecialchars($username);
            $currentfullName = htmlspecialchars($fullName);
            $currentemail = htmlspecialchars($email);
        }
        $conn->close();

        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="">
                        <div class="mb-3 row">
                            <label for="username" style="font-family: sub-font;"
                                class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"
                                    style="font-family: sub-font; background-color: transparent; border: #304DA5 1.5px solid;"
                                    value="<?= $currentUsername; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" style="font-family: sub-font;"
                                class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"
                                    style="font-family: sub-font; background-color: transparent; border: #304DA5 1.5px solid;"
                                    value="<?= $currentfullName; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" style="font-family: sub-font;"
                                class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control"
                                    style="font-family: sub-font; background-color: transparent; border: #304DA5 1.5px solid;"
                                    value="<?= $currentemail; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4 mt-4">
                                <button type="button" onclick="window.location.href='sa-update-account.php';"
                                    style="font-family: sub-font-bold; width: 100%; background-color:#465DA3;"
                                    class="btn btn-dark btn-sm rounded-pill text-white">Update Account</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <footer class="footer fixed-bottom" style="background-color: #C80000;">
            <div class="container-footer" style="color: white;">
                <p>Copyright 2024 © All Rights Reserved</br>
                    Worker’s Affairs Office</p>
            </div>
        </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</html>