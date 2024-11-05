<?php
include 'auth.php';
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFA Status</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }

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
    <div class="sidebar mt-5" style="background-color: white; border: 1.5px black solid; height: 100vh;">
        <div class="container my-5">
            <h3 class="fs-7 text-center" style="font-family: sub-font-bold; padding-top:35%">Dashboard</h3>
            <hr style="background-color: black;">
            <a href="../user/dashboard-status.php" class="nav-link mt-3" style="font-family: sub-font-bold; color: black">
                Status
                <img src="../assets/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../user/dashboard-history.php" class="nav-link" style="font-family: sub-font-bold; color: black">
                History
                <img src="../assets/Expand_right.svg" alt="expand_right">
            </a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF;" href="../user/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF;" href="../user/rfa.php">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF;" href="../user/dashboard-status.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF;" href="../user/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF;" href="../user/contact-us.php">Contact</a>
                    </li>
                    <div class="mr-5"></div>
                </ul>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#collapseNotifications" aria-expanded="false" aria-controls="collapseNotifications">
                                <img src="../assets/Bell_Pin.svg" alt="Notification" style="width: 20px; height: 20px; margin-right: 5px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../user/my-account.php">
                                <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                                My Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" onclick="showLogoutConfirmation()">
                                <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </div>
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

    <?php

    include '../public/config.php';

    $accountID = $_SESSION['accountID'];

    $sql = "SELECT status FROM rfa WHERE accountID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $accountID);
    $stmt->execute();
    $result = $stmt->get_result();
    $rfa = $result->fetch_assoc();

    // Initialize default values
    $status = 'NO RFA ENTRY';
    $message = 'You have no submitted entry of RFA. <br> Kindly make a request.';
    $progress = 0;
    $textColor = 'color: white;';
    $bgColor = '#A9A9A9'; // Light Gray for NO RFA ENTRY

    // Check if RFA exists
    if ($rfa) {
        $status = $rfa['status'];

        switch ($status) {
            case 'PENDING':
                $message = "Submitted RFA is subject for evaluation.";
                $progress = 25;
                $bgColor = '#FF8C00'; // Dark Orange for Pending
                break;
            case 'IN PROGRESS':
                $message = "Your complaint is being processed. <br> Kindly wait for an invitation to proceed for an interview with our SEnA Desk Officer (SEADO).";
                $progress = 50;
                $bgColor = '#4169E1'; // Royal Blue for In Progress
                break;
            case 'REVIEWED':
                $message = "Your complaint has been reviewed. Kindly wait for an approval.";
                $progress = 60;
                $bgColor = '#0000CD'; // Medium Blue for Reviewed
                break;
            case 'APPROVED':
                $message = "Your complaint has been approved for further proceedings.";
                $progress = 70;
                $bgColor = '#006400'; // Dark Green for Approved
                break;
            case 'SCHEDULED':
                $message = "Your interview has been scheduled. Please check your email for the details.";
                $progress = 80;
                $bgColor = '#008B8B'; // Dark Cyan for Scheduled
                break;
            case 'COMPLETED':
                $message = "Your complaint has been resolved. ";
                $message .= '<br><br>';
                $message .= '<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#feedbackModal" style="
                                                padding: 12px 24px; 
                                                background-color: #007bff; 
                                                color: white; 
                                                border: none; 
                                                border-radius: 5px; 
                                                font-weight: bold; 
                                                transition: background-color 0.3s, transform 0.2s; 
                                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                                                font-size: 1rem;"
                                                onmouseover="this.style.backgroundColor=\'#0056b3\'; this.style.transform=\'scale(1.05\';" 
                                                onmouseout="this.style.backgroundColor=\'#007bff\'; this.style.transform=\'scale(1)\';">
                                                Share Your Feedback
                                            </button>';
                $progress = 75;
                $bgColor = '#483D8B'; // Dark Slate Blue for Completed
                break;
            case 'CLOSED CASE':
                $message = "Your complaint case is closed.";
                $progress = 100;
                $bgColor = '#2F4F4F'; // Dark Slate Gray for Closed Case
                break;
            case 'REJECTED':
                $message = "Your complaint has been rejected.";
                $progress = 0;
                $bgColor = '#8B0000'; // Dark Red for Rejected
                break;
            default:
                $message = "You have no submitted RFA. <br> Kindly make a request at the RFA.";
                $progress = 0;
                $bgColor = 'black'; // Default background color if needed
                break;
        }
    } else {
        // Set default values explicitly if no RFA entry exists
        $status = "NO RFA ENTRY";
        $message = "You have no submitted entry of RFA. <br> Kindly make a request.";
    }
    ?>

    <!-- Feedback Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border rounded shadow">
                <div class="modal-header " style="background-color: #140c3e; color: #eee203;">
                    <h5 class="modal-title" id="feedbackModalLabel" style="font-family: Arial; font-weight: bold;">FEEDBACK FORM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white"></button>
                </div>
                <div class="modal-body" style="padding: 20px;">
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
                    <form action="feedback-process.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label" style="font-family: Arial; font-weight: bold;">Requesting Party</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['fullName']); ?>" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-family: Arial; font-weight: bold;">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="feedback" class="form-label" style="font-family: Arial; font-weight: bold;">Feedback</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Your Feedback" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label" style="font-family: Arial; font-weight: bold;">Rating</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="">Select Rating</option>
                                <option value="1">1 - Poor</option>
                                <option value="2">2 - Fair</option>
                                <option value="3">3 - Good</option>
                                <option value="4">4 - Very Good</option>
                                <option value="5">5 - Excellent</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn submit-btn" style="background-color: #C80000; color: white; border-radius: 30px; font-family: Arial;" onclick="handleFeedbackSubmission(event)">
                                Submit Your Feedback
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="my-account-sec" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div class="text-center">
            <h4 class="display-6" style="font-family: sub-font-bold;">RFA Status</h4>
            <div class="card text-center" style="width: 500px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15); border: 1px solid #ddd; margin-top: 20px;">
                <div class="card-header" style="background-color: <?php echo $bgColor; ?>; padding: 20px; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h3 style="font-family: Arial, sans-serif; font-weight: bold; <?php echo $textColor; ?>;">
                        <?php echo isset($rfa['status']) ? htmlspecialchars($rfa['status']) : 'NO RFA ENTRY'; ?>
                    </h3>
                </div>
                <div class="card-body" style="padding: 30px; background-color: #f9f9f9; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    <p class="card-text" style="font-size: 1.1rem; color: #333;"><?php echo $message; ?></p>
                </div>
            </div>
        </div>
    </section>




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

        $('#toggleNotifications').on('click', function(event) {
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