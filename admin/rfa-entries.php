<?php
include 'auth-admin.php';
checkAdminLogin();

$adminID = $_SESSION['adminID'];

// Ensures that the admin had already been assigned to an RFA
// include 'rfa-assignment-check-process.php';
// checkAssignedRFA($adminID);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Entries</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #C80000; position: fixed; width: 100%; z-index: 999;">
        <div class="container">
            <a class="navbar-brand" href="../user/index.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button class="navbar-toggler" style="background-color: #fff; border: none;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #C80000;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-underline mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA" data-bs-content='<div><a class="nav-link text-black " href="rfa-entries.php">New Entries</a><br><a class="nav-link text-black" href="rfa-assignment.php">Assignment</a></div>' data-bs-placement="bottom">
                            RFA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="recordsLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="Records" data-bs-content='<div><a class="nav-link text-black" href="sena-records.php">SENA Conferences</a><br><a class="nav-link text-black" href="#">Advice Counselling</a></div>' data-bs-placement="bottom">
                            Records
                        </a>
                    </li>
                </ul>
            </div>

            <a href="#">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/admin-account.php">
                            <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                            My Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" onclick="showLogoutConfirmation(); return false;">
                            <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                            Log Out
                        </a>
                    </li>
                </ul>
            </a>
        </div>
    </nav>


    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                    <h5 class="modal-title text-center" id="logoutConfirmationModalLabel" style="font-weight: bold; font-family: Arial;">
                        Confirm Logout
                    </h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary" onclick="logout()" style="background-color: #140c3e; color: #eee203; border-radius: 30px;">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>



    <section class="welcome-sec">
        <div class="container">
            <div class="row justify-content-between mt-5 mb-2">
                <div class="col ml-auto">
                    <h4 class="fw-bold" style="font-family: sub-font-bold">NEW ENTRIES</h4>
                </div>
            </div>

            <!-- RETRIEVE NG ACCOUNT INFORMATION -->
            <?php

            include '../public/config.php';

            $sql = "SELECT rfa.claimsAndIssues, rfa.date, acc.fullName, rfa.referenceID
                FROM rfa rfa
                JOIN account acc ON rfa.accountID = acc.accountID
                WHERE rfa.status = 'PENDING';";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $rfa = $result->fetch_assoc();
            ?>


            <table class="table table-bordered" style="border: 2px solid black; table-layout: fixed;">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>Claims/Issues</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Receive</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rfa = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="align-middle"><?php echo htmlspecialchars($rfa['claimsAndIssues']); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($rfa['fullName']); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($rfa['date']); ?></td>
                            <td class="d-flex align-items-center justify-content-center">
                                <!-- TRIGGER TO INSERT THE VALUES INSIDE THE ASSIGNMENT TABLE -->
                                <form action="rfa-entries-process.php" method="POST">
                                    <input type="hidden" id="referenceID" name="referenceID" value="<?php echo htmlspecialchars($rfa['referenceID']); ?>">
                                    <button type="submit" class="btn btn-dark" style="width:55px; height: 45px"><img src="../assets/Done.svg"></button>
                                </form>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </section>

    <footer class="footer">
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

    // Function to show the logout confirmation modal
    function showLogoutConfirmation() {
        const modalElement = document.getElementById("logoutConfirmationModal");
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
    }

    // Function to handle logout
    function logout() {
        window.location.href = "logout.php"; // Redirect to logout page
    }
</script>

</html>