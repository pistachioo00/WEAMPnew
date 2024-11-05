<?php
include 'auth-admin.php';
checkAdminLogin();

$adminID = $_SESSION['adminID'];

// include 'rfa-entries-check-process.php';
// checkNoAssignment($adminID);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFA Assignment</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Hover colors for each status */
        .status-reject:hover {
            background-color: red;
            color: white;
        }

        .status-review:hover {
            background-color: yellow;
            color: black;
        }

        .status-approve:hover {
            background-color: blue;
            color: white;
        }

        .status-take-action:hover {
            background-color: green;
            color: white;
        }

        .reference-number {
            color: #eee203;
            background-color: #140c3e;
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
        }

        #newAdminID {
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        #newAdminID:focus {
            border-color: #0056b3;
            box-shadow: 0px 0px 5px rgba(0, 86, 179, 0.5);
            outline: none;
        }

        .move-assignment-btn {
            font-size: 0.8rem;
            padding: 10px 20px;
            border-radius: 30px;
            border: none;
            background: linear-gradient(135deg, #C80000, #8B0000);
            /* Nazarene Red with a darker shade */
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .move-assignment-btn:hover {
            background: linear-gradient(135deg, #8B0000, #C80000);
            /* Inverse gradient for hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }


        .move-assignment-btn:active {
            background: #003b70;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        .btn {
            cursor: pointer;
            background-color: #C80000;
            color: white;
        }

        .btn:hover {
            background: linear-gradient(90deg, #dc3545, #ff4e50);
            transform: scale(1.05);
        }
    </style>
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
                        <a class="nav-link text-white" href="#" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA" data-bs-content='<div><a class="nav-link text-black" href="rfa-entries.php">New Entries</a><br><a class="nav-link text-black" href="rfa-assignment.php">Assignment</a></div>' data-bs-placement="bottom">
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
    <br>

    <?php
    include '../public/config.php';

    // Get the current admin ID from the session
    $adminID = $_SESSION['adminID'];

    // Query to get the details including the accountID
    $sql = "SELECT 
            rfa.businessName,
            rfa.claimsRemarks,
            rfa.claimsAndIssues,
            rfa.reliefPrayedFor,
            rfa.reliefsRemarks,
            rfa.date AS dateCreated,
            rfa.status AS status,
            acc.*, 
            assign.*, 
            admin.adminID,
            admin.fullName AS adminFullName,
            admin.username AS adminUsername
        FROM 
            rfa AS rfa
        JOIN 
            account AS acc ON rfa.accountID = acc.accountID
        JOIN 
            assignment AS assign ON acc.accountID = assign.accountID
        JOIN 
            admin AS admin ON assign.adminID = admin.adminID  
        WHERE 
            rfa.status != 'PENDING' AND assign.adminID = ?;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $adminID);
    $stmt->execute();
    $result = $stmt->get_result();
    $assigned = $result->fetch_assoc();

    ?>

    <div class="container" style="padding-top:10%">
        <h2 class="text-start" style="font-family: sub-font-bold; font-weight: bold">ASSIGNMENT</h2>
        <div class="container">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="font-weight:bold">Submitted date</td>
                        <td><?php echo htmlspecialchars($assigned['dateCreated']); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Created by</td>
                        <td><?php echo htmlspecialchars($assigned['fullName']); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Received date</td>
                        <td><?php echo htmlspecialchars($assigned['datetime']); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">SEADO assigned</td>
                        <td><?php echo htmlspecialchars($assigned['adminFullName']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php
        $oldAdminID = $_SESSION['adminID'];

        include '../public/config.php';

        $sql = "SELECT * FROM admin";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <!-- IF ADMIN IS CATERING AN RFA, THE ADMIN SHOULD NOT BE VISIBLE HERE -->
        <div class="col-md-4 d-flex justify-content-center align-items-center" style="padding-left: 1%;">
            <form action="move-assignment-process.php" method="POST" class="w-100">
                <div class="form-group d-flex align-items-center">
                    <!-- Styled Dropdown with placeholder -->
                    <select id="newAdminID" name="newAdminID" class="form-select me-2">
                        <option value="" disabled selected style="color: #6c757d;">Desk Officer</option>
                        <?php while ($admin = $result->fetch_assoc()) { ?>
                            <option value="<?php echo htmlspecialchars($admin['adminID']); ?>">
                                <?php echo htmlspecialchars($admin['fullName']); ?>
                            </option>
                        <?php } ?>
                    </select>
                    <!-- Improved Button -->
                    <button type="submit" class="btn btn-dark fw-bold" style="font-size: 0.9rem; padding: 10px 20px; border-radius: 30px; background: linear-gradient(90deg, #C80000, #ff4e50); border: none; color: white; transition: background 0.3s, transform 0.2s;">
                        MOVE ASSIGNMENT
                    </button>
                </div>
            </form>
        </div>



        <div class="text-end">
            <h4 class="fw-bold text-end mt-5" style="font-family: Arial; color: #333;">Reference No.</h4>
            <h2 class="fw-bold text-end reference-number" style="font-family: Arial;">
                SEAD RCMD NCR-VAL-<?php echo htmlspecialchars(string: $assigned['referenceID']); ?>-<?php echo date_format(date_create(htmlspecialchars($assigned['dateCreated'])), 'm-Y'); ?>
            </h2>
        </div>
        <hr class="my-4" style="border-top: 2px solid black;">

        <h3 class="fw-bold text-start mt-2 mb-3" style="font-family: Arial; color: black">Requesting Party</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Date Employed</th>
                    <th>Service Years</th>
                    <th>Nature of Work</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($assigned['fullName']); ?></td>
                    <td><?php echo htmlspecialchars($assigned['addressLine1'] . ", " . $assigned['barangay'] . ", " . $assigned['city'] . ", " . $assigned['province'] . ", " . $assigned['region']); ?></td>
                    <td><?php echo htmlspecialchars($assigned['contact']); ?></td>
                    <td><?php echo htmlspecialchars($assigned['employmentDate']); ?></td>
                    <td><?php echo htmlspecialchars($assigned['yearsOfService']); ?></td>
                    <td><?php echo htmlspecialchars($assigned['natureOfWork']); ?></td>
                </tr>
            </tbody>
        </table>
        <?php
        if ($assigned) {
            $accountID = $assigned['accountID']; // Get the accountID from the fetched data

            // Query to get images for the specific accountID
            $sql_images = "SELECT selfieWithID, governmentID FROM account WHERE accountID = ?";

            if ($stmt_images = $conn->prepare($sql_images)) {
                $stmt_images->bind_param("i", $accountID);
                $stmt_images->execute();
                $stmt_images->bind_result($selfieWithID, $governmentID);

                if ($stmt_images->fetch()) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Government ID</th>
                                <th>Selfie With ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="../uploads/governmentID/<?= htmlspecialchars($governmentID) ?>"
                                        alt="Government ID"
                                        style="width: 200px; height: auto; border: 2px solid black; border-radius: 8px; transition: transform 0.2s;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#govIDModal"
                                        data-bs-container="body"
                                        data-bs-toggle="popover"
                                        data-bs-trigger="hover"
                                        data-bs-placement="top"
                                        title="View Government ID"
                                        data-bs-content="Click to view the Government ID in full size."
                                        onmouseover="this.style.transform='scale(1.05)';"
                                        onmouseout="this.style.transform='scale(1)';">
                                </td>
                                <td>
                                    <img src="../uploads/selfieWithID/<?= htmlspecialchars($selfieWithID) ?>"
                                        alt="Selfie with ID"
                                        style="width: 130px; height: auto; border: 2px solid black; border-radius: 8px; transition: transform 0.2s;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#selfieIDModal"
                                        data-bs-container="body"
                                        data-bs-toggle="popover"
                                        data-bs-trigger="hover"
                                        data-bs-placement="top"
                                        title="View Selfie with ID"
                                        data-bs-content="Click to view the Selfie with ID in full size."
                                        onmouseover="this.style.transform='scale(1.05)';"
                                        onmouseout="this.style.transform='scale(1)';">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php
                } else { ?>
                    <tr>
                        <td colspan="2">No images found for this account ID</td>
                    </tr>
        <?php }

                $stmt_images->close();
            } else {
                echo "Error preparing the SQL statement for images: " . $conn->error;
            }
        } else {
            echo "No data found for this admin.";
        }

        $stmt->close();
        $conn->close();
        ?>

        <!-- Government ID Modal -->
        <div class="modal fade" id="govIDModal" tabindex="-1" aria-labelledby="govIDModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                    <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                        <h5 class="modal-title text-center" id="govIDModalLabel" style="font-weight: bold; font-family: Arial;">
                            GOVERNMENT ID
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="../uploads/governmentID/<?= htmlspecialchars($governmentID) ?>" alt="Government ID" class="img-fluid" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Selfie with ID Modal -->
        <div class="modal fade" id="selfieIDModal" tabindex="-1" aria-labelledby="selfieIDModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                    <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                        <h5 class="modal-title text-center" id="selfieIDModalLabel" style="font-weight: bold; font-family: Arial;">
                            SELFIE WITH ID
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="../uploads/selfieWithID/<?= htmlspecialchars($selfieWithID) ?>" alt="Selfie with ID" class="img-fluid" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4" style="border-top: 2px solid black;">

        <h3 class="fw-bold text-start mt-2 mb-3" style="font-family: Arial; color: black">Responding Party</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Date Employed</th>
                    <th>Service Years</th>
                    <th>Nature of Work</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($assigned['businessName']); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <hr class="my-4" style="border-top: 2px solid black;">

        <h3 class="fw-bold text-start mt-2 mb-3" style="font-family: Arial; color: black">Claims/Issues</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject of Request</th>
                    <th>Remarks</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding-bottom: 4%"><?php echo htmlspecialchars($assigned['claimsAndIssues']); ?></td>
                    <td style="padding-bottom: 4%"><?php echo htmlspecialchars($assigned['claimsRemarks']); ?></td>
                </tr>
            </tbody>
        </table>

        <hr class="my-4" style="border-top: 2px solid black;">

        <h3 class="fw-bold text-start mt-2 mb-3" style="font-family: Arial; color: black">Relief Prayed For</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject of Request</th>
                    <th>Remarks</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding-bottom: 4%"><?php echo htmlspecialchars($assigned['reliefPrayedFor']); ?></td>
                    <td style="padding-bottom: 4%"><?php echo htmlspecialchars($assigned['reliefsRemarks']); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-center align-items-center">
            <div class="dropdown" style="width:15%; margin-left: 95%; margin-right:10%">
                <button class="btn fw-bold mb-5 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.9rem; padding: 10px 20px; border-radius: 30px; background: linear-gradient(90deg, #C80000, #ff4e50); border: none; color: white; transition: background 0.3s, transform 0.2s;">
                    STATUS ACTIONS
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" id="referenceID" name="referenceID" value="<?php echo htmlspecialchars($assigned['referenceID']); ?>">
                            <button type="button" class="dropdown-item status-reject" onclick="showRejectModal()">
                                Reject
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="review-update-process.php" method="POST" class="d-inline">
                            <input type="hidden" id="referenceID" name="referenceID" value="<?php echo htmlspecialchars($assigned['referenceID']); ?>">
                            <button type="submit" class="dropdown-item status-review">
                                Review
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="approve-update.php" method="POST" class="d-inline">
                            <input type="hidden" id="referenceID" name="referenceID" value="<?php echo htmlspecialchars($assigned['referenceID']); ?>">
                            <button type="submit" class="dropdown-item status-approve">
                                Approve
                            </button>
                        </form>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item status-take-action" data-bs-toggle="modal" data-bs-target="#actionConfirmationModal">
                            Take Action
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Rejection Reason Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                        <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                            <h5 class="modal-title" id="staticBackdropLabel" style="font-family: Arial; font-weight: bold;">
                                Reason for Rejection
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px;">
                            <form id="rejectionForm" action="rfa-reject-process.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label" style="font-family: Arial; font-weight: bold;">Responding Party</label>
                                    <input type="text" class="form-control" id="recipient-name" value="<?php echo htmlspecialchars($assigned['fullName']); ?>" disabled>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="blurred_id" id="flexCheckBlurredID">
                                        <label class="form-check-label" for="flexCheckBlurredID">Blurred Government ID</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="blurred_selfie" id="flexCheckBlurredSelfie">
                                        <label class="form-check-label" for="flexCheckBlurredSelfie">Blurred Selfie with ID</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="irrelevant_remarks" id="flexCheckIrrelevantRemarks">
                                        <label class="form-check-label" for="flexCheckIrrelevantRemarks">Irrelevant remarks regarding claims/issues</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="others" id="flexCheckOthers">
                                        <label class="form-check-label" for="flexCheckOthers">Others</label>
                                    </div>

                                    <!-- Text box that will be shown/hidden based on the checkbox -->
                                    <div class="mb-3" id="otherTextContainer" style="display: none;">
                                        <label for="otherText" class="form-label">Please specify:</label>
                                        <input type="text" class="form-control" id="otherText" placeholder="Enter details">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label" style="font-family: Arial; font-weight: bold;">Remarks</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px; font-family: Arial;">
                                Cancel
                            </button>
                            <button type="button" class="btn" id="sendButton" style="background-color: #140c3e; color: #eee203; border-radius: 30px; font-family: Arial;">
                                Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Take Action Confirmation Modal -->
            <div class="modal fade" id="actionConfirmationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actionConfirmationLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                        <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                            <h5 class="modal-title" id="actionConfirmationLabel" style="font-family: Arial; font-weight: bold;">
                                Confirm Action
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px;">
                            <p style="font-family: Arial; font-weight: bold; font-size: 16px;">
                                Are you sure you want to take this action?
                            </p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px; font-family: Arial;">
                                Cancel
                            </button>
                            <button type="button" class="btn" id="confirmActionButton" style="background-color: #140c3e; color: #eee203; border-radius: 30px; font-family: Arial;" onclick="redirectToAssignment()">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../js/rfa-assignment.js">

</script>

</html>