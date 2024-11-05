<!-- PREVENT FROM ACCCESS NA NAKALOG OUT KA NA -->
<?php
include 'auth.php';
checkLogin();

$accountID = $_SESSION['accountID'];

include 'rfa-verification-process.php';
checkRFA($accountID);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFA Form</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .notification-panel {
            width: 20%;
            position: absolute;
            left: 72%;
            top: 5%;
            max-height: 400px;
            overflow-y: auto;
            font-family: Arial;
            z-index: 9999;
        }

        /* PUSH NOTIFICATIONS */
        .notification-list {
            list-style-type: none;
            padding: 0;
        }

        .notification-list li {
            background-color: #f5f5f5;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .notification-list li:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }

        /* Ensure collapsible content is fixed when collapsed */
        #collapseNotifications:not(.show) {
            position: fixed;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#C80000;">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 75px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../user/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../user/rfa.php">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../user/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../user/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../user/contact-us.php">Contact</a>
                    </li>
                    <div class="mr-5"></div>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white" data-bs-toggle="collapse" href="#collapseNotifications" aria-expanded="false" aria-controls="collapseNotifications">
                            <img src="../assets/Bell_Pin.svg" alt="Notification" style="width: 20px; height: 20px; margin-right: 5px;">
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white" href="../user/my-account.php">
                            <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                            My Account
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white" href="logout.php">
                            <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="news-sec">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center mb-4" style="margin-bottom: -10px;">
                    <h2 style="font-family: sub-font-bold; padding-top: 10%">Request for Assistance Form</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="backConfirmationModal" tabindex="-1" aria-labelledby="backConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-center" id="backConfirmationModalLabel">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to go back?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="goBack()">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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


    <!-- FORM STARTS HERE -->
    <form method="POST" action="rfa-form-process.php" class="container justify-content-center" style="font-family: 'form-font'">
        <div class="form-row">
            <div class="col-md-8">
                <h3 class="text-md-left" style="font-family: sub-font-bold;">Requesting Party</h3>
            </div>
        </div>

        <div class="card-container">
            <div class="card col-md-11" style="padding: 60px; border-radius: 10px; background-color: #F8F9FA; position: relative; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 40px;">

                <!-- RETRIEVE NG ACCOUNT INFORMATION -->
                <?php

                include '../public/config.php';

                $accountID = $_SESSION['accountID'];

                $sql = "SELECT * FROM account WHERE accountID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $accountID);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                ?>

                <!-- FULL NAME -->
                <div class="d-flex justify-content-between align-items-end">
                    <label for="" style="font-family: sub-font-bold; margin-bottom: 0;">Name</label>
                </div>

                <div class="form-row">
                    <div class="form-group col-auto flex-grow-1">
                        <input type="text" class="form-control" id="first-name" placeholder="First Name" value="<?php echo htmlspecialchars($user['fullName']); ?>" disabled>
                    </div>
                </div>

                <!-- COMPLETE ADDRESS -->

                <div class="d-flex justify-content-between align-items-end">
                    <label for="" style="font-family: sub-font-bold; margin-bottom: 0;">Complete Address</label>
                </div>

                <div class="d-flex align-items-center">
                    <div class="form-group flex-grow-1">
                        <input type="text" class="form-control" id="unit-req" placeholder="Unit/No./Lot/Blk" value="<?php echo htmlspecialchars($user['addressLine1'] . ", " . $user['barangay'] . ", " . $user['city'] . ", " . $user['province'] . ", " . $user['region']); ?>" disabled>
                    </div>
                </div>

                <label for="" style="font-family: sub-font-bold">Contact</label>
                <div class="form-row mb-3">
                    <!-- CONTACT NO  -->
                    <div class="form-group col-4 flex-grow-1">
                        <input type="tel" class="form-control" id="contact" placeholder="Contact No." pattern="[0-9]*" title="Please enter a valid phone number" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php echo htmlspecialchars($user['contact']); ?>" disabled>
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group col-auto flex-grow-1">
                        <input type="text" class="form-control" id="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                    </div>
                </div>

                <label for="" style="font-family: sub-font-bold">Work Details</label>
                <div class="form-row">
                    <!-- WORK POSITION -->
                    <div class="form-group col-md-auto">
                        <label for="workPosition" class="col-form-label">Work Position</label>
                        <input type="text" class="form-control mb-2" id="workPosition" placeholder="Work Position" value="<?php echo htmlspecialchars($user['workPosition']); ?>" disabled>
                    </div>

                    <!-- NATURE OF WORK -->
                    <div class="form-group col-md-auto">
                        <label for="natureOfWork" class="col-form-label">Nature of Work</label>
                        <input type="text" class="form-control mb-2" id="natureOfWork" placeholder="Nature of Work" value="<?php echo htmlspecialchars($user['natureOfWork']); ?>" disabled>
                    </div>

                    <!-- EMPLOYMENT DATE -->
                    <div class="form-group col-md-auto">
                        <label for="employmentDate" class="col-form-label">Employment Date</label>
                        <input type="text" class="form-control mb-2" id="employmentDate" name="employmentDate" placeholder="Employment Date" value="<?php echo htmlspecialchars($user['employmentDate']); ?>" disabled>
                    </div>

                    <!-- YEARS OF SERVICE -->
                    <div class="form-group col-md-auto">
                        <label for="yearsOfService" class="col-form-label ml-2">Year(s) of Service</label>
                        <input class="form-control mb-2 col-md-3" id="yearsOfService" name="yearsOfService" type="number" placeholder="No." min="1" value="<?php echo htmlspecialchars($user['yearsOfService']); ?>" disabled>
                    </div>
                </div>
            </div>
        </div>

        <!-- RESPONDING PARTY FORM -->
        <div class="card col-md-11" style="padding: 60px; border-radius: 10px; background-color: #F8F9FA; position: relative; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="form-row">
                <div class="col-md-8">
                    <h3 class="text-md-left mb-4" style="font-family: sub-font-bold">Responding Party</h3>
                </div>
            </div>

            <!-- RESPONDING PARTY NAME -->
            <div class="form-group flex-grow-1">
                <!-- <label for="" style="font-family: sub-font-bold">Responding Party Name</label> -->
                <input type="text" class="form-control" id="businessName" name="businessName" placeholder="Responding Party Name" style="background-color:#E5EEFF; border: 1px black solid">
            </div>

        </div><br><br>


        <!--Claims and Issues-->
        <div class="card col-md-11" id="claimsAndIssues" name="divClaimsAndIssues" style="padding: 60px; border-radius: 10px; background-color: #F8F9FA; position: relative; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="col-md-8">
                        <h3 class="text-md-left mb-4" style="font-family: sub-font-bold">Claims / Issues</h3>
                    </div>
                </div>
                <!-- Checkboxes for Claims and Issues -->
                <!-- You can use a loop to generate checkboxes dynamically -->
                <?php
                $sql = "SELECT * FROM claims;";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <?php while ($claims = $result->fetch_assoc()) { ?>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="<?php echo htmlspecialchars($claims['claimsCode']); ?>" id="<?php echo $claims['claimsCode']; ?>" name="claimsAndIssues[]">

                        <label class="form-check-label" for="<?php echo htmlspecialchars($claims['claimsCode']); ?>" style="font-family: form-font; font-weight: bold; font-size:large"><?php echo htmlspecialchars($claims['claimsName']); ?>
                        </label>
                    </div>
                <?php } ?>


                <!-- Additional checkbox for Others with input field -->
                <div class="form-check mb-3 mt-3">
                    <label for="" class="form-check-label" style="font-family: form-font; font-weight: bold; font-size:large">Others</label>
                    <input class="form-check-input" type="checkbox" value="Others" id="othersClaims" name="othersClaims">
                    <input type="text" class="form-control" id="othersClaimsText" name="othersClaimsText" style="border: 1px solid #000; background-color: #E5EEFF;" placeholder=" Please Specify" disabled>
                </div>
                <!-- Claims Remarks -->
                <div class="form-check mb-3 mt-3">
                    <label for="" class="form-check-label" style="font-family: form-font; font-weight: bold; font-size:large">Remarks</label>
                    <textarea class="form-control" id="claimsRemarks" name="claimsRemarks" style="border: 1px solid #000; background-color: #E5EEFF;" rows="5"></textarea>
                </div>
            </div>
        </div>
        </div><br><br>

        <!--Relief Prayed For -->
        <div class="card col-md-11" id="reliefPrayedFor" name="divReliefPrayedFor" style="padding: 60px; border-radius: 10px; background-color: #F8F9FA; position: relative; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="col-md-8">
                        <h3 class="text-md-left mb-4" style="font-family: sub-font-bold">Relief Prayed For</h3>
                    </div>
                </div>
                <!-- Checkboxes for Relief Prayed For -->
                <!-- You can use a loop to generate checkboxes dynamically -->
                <?php
                $sql = "SELECT * FROM reliefs;";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <?php while ($reliefs = $result->fetch_assoc()) { ?>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="<?php echo htmlspecialchars($reliefs['reliefCode']); ?>" id="<?php echo htmlspecialchars($reliefs['reliefCode']); ?>" name="reliefPrayedFor[]">

                        <label class="form-check-label" for="<?php echo htmlspecialchars($reliefs['reliefCode']); ?>" style="font-family: form-font; font-weight: bold; font-size:large">
                            <?php echo htmlspecialchars($reliefs['reliefName']); ?>
                        </label>
                    </div>
                <?php } ?>

                <!-- Additional checkbox for Others with input field -->
                <div class="form-check mb-3 mt-3">
                    <label for="" class="form-check-label" style="font-family: form-font; font-weight: bold; font-size:large">Others</label>
                    <input class="form-check-input" type="checkbox" value="Others" id="othersReliefs" name="othersReliefs">
                    <input type="text" class="form-control" id="othersReliefsText" name="othersReliefsText" style="border: 1px solid #000; background-color: #E5EEFF;" placeholder=" Please Specify" disabled>
                </div>

                <!-- Reliefs Remarks -->
                <div class="form-check mb-3 mt-3">
                    <label for="" class="form-check-label" style="font-family: form-font; font-weight: bold; font-size:large">Remarks</label>
                    <textarea class="form-control" id="reliefsRemarks" name="reliefsRemarks" style="border: 1px solid #000; background-color: #E5EEFF;" rows="5"></textarea>
                </div>
            </div>
        </div>
        </div><br><br>

        <div class="container mb-5" style="padding-top: 5%; padding-right: 9%">
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <button type="button" class="btn btn-dark btn-block rounded-pill" onclick="clearForm()">CLEAR</button>
                </div>
                <div class="col-md-2">
                    <!-- Open the modal on click -->
                    <button type="submit" class="btn btn-dark btn-block rounded-pill">SUBMIT</button>
                </div>
            </div>
        </div>
    </form>

    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker's Affairs Office</p>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap Datetime Picker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="../user/index.js"></script>
<script>
    $(document).ready(function() {
        // Initialize the datetime picker plugin
        $('#employment-date').datepicker({
            format: 'mm/dd/yyyy', // Specify the date format
            autoclose: true // Close the picker when a date is selected
        });
    });

    function showLogoutConfirmation() {
        $('#logoutConfirmationModal').modal('show');
    }

    function proceed() {
        window.location.href = "../user/preview-rfa.php"
    }

    function logout() {
        window.location.href = "../public/home.php";
    }

    document.getElementById('othersClaims').addEventListener('change', function() {
        document.getElementById('othersClaimsText').disabled = !this.checked;
    });

    document.getElementById('othersReliefs').addEventListener('change', function() {
        document.getElementById('othersReliefsText').disabled = !this.checked;
    });

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
</script>

</html>