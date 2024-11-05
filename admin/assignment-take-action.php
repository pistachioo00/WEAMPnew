<?php
include 'auth-admin.php';
checkAdminLogin();

$adminID = $_SESSION['adminID'];

include 'rfa-entries-check-process.php';
checkNoAssignment($adminID);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Take Action - Worker's Affairs Office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--Bootstrap Datepicker Timepicker CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<style>
    .nav-link {
        display: block;
        padding: 10px 0;
        text-decoration: none;
        color: white;
    }

    .nav-link:hover {
        text-underline-offset: 10px;
        text-decoration: underline;
    }

    .toolbar {
        margin-bottom: 10px;
    }

    /* Flexbox style for toolbar buttons */
    .tool-list {
        display: flex;
        flex-flow: row nowrap;
        list-style: none;
        padding: 0;
        overflow: hidden;
        gap: 10px;
        border-radius: 5px;
        background-color: white;
        justify-content: end;
        margin-right: 10%;
    }

    /* Button styles */
    .tool--btn {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        border-radius: 5px;
        height: 30px;
        /* Increased button size for better usability */
        width: 30px;
        font-size: 12px;
        cursor: pointer;
        background-color: transparent;
    }

    .tool--btn img {
        width: 100%;
        height: 100%;
        vertical-align: middle;
    }

    .tool--btn:hover {
        background-color: #dddddd;
    }

    /* Styles for the text editor */
    .text-editor {
        border: 1px solid #ccc;
        padding: 10px;
        min-height: 200px;
        /* Keep a minimum height */
        cursor: text;
        width: 100%;
        margin-right: 10px;
        /* Space between editor and output container */
        border-radius: 5px;
        /* Rounded corners */
        background-color: white;
        /* Match output background */
    }

    /* Output container */
    #output {
        height: 400px;
        padding: 1rem;
        width: 90%;
        border: 1px solid #333;
        border-radius: 5px;
        background-color: white;
        font-size: 16px;
        /* Default font size */
        padding: 10px;
    }

    #originalContainer {
        display: flex;
        align-items: flex-start;
        margin-top: 10px;
    }

    .image-button {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        margin-left: 10px;
        border: none;
        background-color: transparent;
        cursor: pointer;
    }

    .btn.button {
        font-size: 0.9rem;
        padding: 10px 20px;
        border-radius: 30px;
        border: none;
        background: linear-gradient(90deg, #C80000, #ff4e50);
        color: white;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn.button:hover {
        background: linear-gradient(90deg, #ff4e50, #C80000);
        transform: translateY(-2px);
    }

    .btn.button:active {
        background: #003b70;
        transform: translateY(1px);
    }


    .dropdown-item {
        color: #212529;
    }

    #saveDraftBtn:hover {
        background-color: #007bff;
        color: white;
    }

    #closeCaseBtn:hover {
        background-color: #28a745;
        color: white;
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

    /* Popover Custom Styling */
    .popover {
        max-width: 300px;
        background-color: #f9f9f9;
        border: 1px solid #c4c4c4;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .popover .popover-arrow {
        border-width: 0.5rem;
        border-color: #c4c4c4;
    }

    .popover-header {
        background-color: #e9ecef;
        font-weight: bold;
        color: #333;
        padding: 8px 12px;
        border-bottom: 1px solid #c4c4c4;
    }

    .popover-body {
        color: #555;
        padding: 10px;
        font-size: 0.95rem;
        line-height: 1.5;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #C80000; position: fixed; width: 100%; z-index: 999;">
        <div class="container">
            <a class="navbar-brand" href="../user/index.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: #fff;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/admin-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA" data-bs-content='<div><a class="nav-link text-black" href="rfa-entries.php" class="btn btn-link">New Entries</a><br><a class="nav-link text-black" href="rfa-assignment.php" class="btn btn-link">Assignment</a></div>' data-bs-placement="bottom">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="recordsLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="Records" data-bs-content='<div><a class="nav-link text-black" href="sena-records.php" class="btn btn-link">SENA Conferences</a><br><a class="nav-link text-black" href="#" class="btn btn-link">Advice Counselling</a></div>' data-bs-placement="bottom">Records</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../admin/admin-account.php">
                        <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                        My Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showLogoutConfirmation()">
                        <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                        Log Out
                    </a>
                </li>
            </ul>
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

    <?php
    include '../public/config.php';

    // Get the current admin ID from the session
    $adminID = $_SESSION['adminID'];

    // Query to get the details including the accountID
    $sql = "SELECT 
            rfa.businessName,
            rfa.claimsAndIssues,
            rfa.claimsRemarks,
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


        <div class="text-end">
            <h4 class="fw-bold text-end mt-5" style="font-family: Arial; color: #333;">Reference No.</h4>
            <h2 class="fw-bold text-end reference-number" style="font-family: Arial; color: #eee203; background-color: #140c3e; padding: 10px; border-radius: 8px; display: inline-block;">
                SEAD RCMD NCR-VAL-<?php echo htmlspecialchars($assigned['referenceID']); ?>-<?php echo date_format(date_create(htmlspecialchars($assigned['dateCreated'])), 'm-Y'); ?>
            </h2>
        </div>

        <!-- Footnote Button -->
        <div class="d-flex align-items-center mb-4">
            <button type="button" class="rounded-circle" id="footnoteBtn"
                style="color: black; font-size: 1rem; padding: 8px; width: 40px; height: 40px; background-color: transparent; border: none; box-shadow: none; margin-right: 10px;"
                data-bs-toggle="modal" data-bs-target="#instructionsModal">
                <i class="bi bi-info-circle" style="font-size: 1.5rem;"></i>
            </button>
            <span class="ms-2" style="font-size: 1rem;">Click the button for instructions on selecting checkboxes.</span>
        </div>

        <!-- Modal for Instructions -->
        <div class="modal fade" id="instructionsModal" tabindex="-1" aria-labelledby="instructionsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered"> <!-- Centering the modal -->
                <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                    <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                        <h5 class="modal-title text-center" id="instructionsModalLabel" style="font-weight: bold; font-family: Arial;">
                            INSTRUCTIONS FOR CHECKBOX SELECTION
                        </h5>
                    </div>

                    <div class="modal-body">
                        <h6 class="mb-3" style="font-size: 1.1rem; color: #333;">Please follow the instructions below:</h6>
                        <ul style="list-style-type: disc; padding-left: 20px;">
                            <li><strong>Advice and Counseling</strong>: Select this option for basic advice.</li>
                            <li><strong>Set Joint Conference and Referral</strong>: Select both for joint conferences with referrals.</li>
                            <li><strong>Referral</strong>: Select this alone if that's the only action needed.</li>
                            <li><strong>Settlement Agreement</strong>: Check this if a settlement agreement is needed.</li>
                            <li><strong>Withdrawal</strong>: Select this if you intend to withdraw the case.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <hr class="my-4" style="border-top: 2px solid black;">



        <!-- Why was this previously action to rfa-no-assignment-process.php? -->
        <form action="closed-case-process.php" id="takeAction" method="POST" onsubmit="console.log('Form submitted!');">
            <div class="checkbox-container">
                <!-- Checkbox 1 -->
                <div class="sena-rec-checkboxes">
                    <input type="checkbox" id="adviceCounseling" name="adviceCounseling" value="1">
                    <label for="adviceCounseling">
                        <span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Advice and Counseling</span>
                        <sup id="footnote1" data-bs-toggle="popover" data-bs-content="This process provides guidance and support to individuals facing challenges, often within a structured setting, to help them make informed decisions." data-bs-trigger="hover" style="cursor: pointer;">1</sup>
                    </label>
                </div>

                <hr class="my-4" style="border-top: 2px solid #367AFF;">

                <!-- Checkbox 2 -->
                <div class="sena-rec-checkboxes">
                    <input type="checkbox" id="jointConference" name="jointConference" value="1">
                    <label for="jointConference">
                        <span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Set Joint Conference</span>
                        <sup id="footnote2" data-bs-toggle="popover" data-bs-content="A joint conference is a meeting between two or more parties to discuss and negotiate terms on an issue or dispute." data-bs-trigger="hover" style="cursor: pointer;">2</sup>
                    </label>
                </div>


                <!-- TOGGLE SET JOINT CONFERENCE EXPAND -->
                <div id="additional-info" style="display: none;">
                    <?php
                    include '../public/config.php';

                    // Get the current admin ID from the session
                    $adminID = $_SESSION['adminID'];

                    // Query to get the details including the accountID
                    $sql = "SELECT 
                            rfa.*,
                            acc.accountID,
                            acc.fullName AS accFullName,
                            acc.email AS accEmail,
                            assign.*, 
                            admin.adminID,
                            admin.fullName AS adminFullName,
                            app.approvedID,
                            app.adminID AS appAdminID,
                            app.date,
                            app.time,
                            app.purpose
                        FROM 
                            rfa AS rfa
                        JOIN 
                            account AS acc ON rfa.accountID = acc.accountID
                        JOIN 
                            assignment AS assign ON rfa.accountID = assign.accountID
                        JOIN 
                            admin AS admin ON assign.adminID = admin.adminID 
                        JOIN 
                            approved AS app ON assign.adminID = app.adminID 
                        WHERE 
                            assign.adminID = ?;";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $adminID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $assigned = $result->fetch_assoc();

                    ?>

                    <div class="container" style="max-width: 950px; margin: auto; font-family: Arial;">
                        <div class="border rounded shadow" style="border: 1px solid #ddd; padding: 20px;">
                            <h1 class="mt-2 mb-3 text-center" style="color: #eee203; background-color: #140c3e; padding: 8px; border-radius: 8px; font-weight: bold; font-size: 2rem;">
                                PROVIDE THE DETAILS
                            </h1>
                            <div class="mb-3">
                                <strong style="font-size: 1.2rem; color: #333;">Requesting Party Name:</strong>
                                <span class="form-text" style="font-size: 1rem; color: #555;">
                                    <?php echo htmlspecialchars($assigned['accFullName']); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <strong style="font-size: 1.2rem; color: #333;">Reference ID:</strong>
                                <span class="form-text" style="font-size: 1rem; color: #555;">
                                    <?php echo htmlspecialchars($assigned['referenceID']); ?>
                                </span>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <strong style="font-size: 1.2rem; color: #333;">Date:</strong>
                                    <span class="form-text" style="font-size: 1rem; color: #555;">
                                        <?php echo htmlspecialchars($assigned['date']); ?>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <strong style="font-size: 1.2rem; color: #333;">Time:</strong>
                                    <span class="form-text" style="font-size: 1rem; color: #555;">
                                        <?php echo htmlspecialchars($assigned['time']); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <strong style="font-size: 1.2rem; color: #333;">Location:</strong>
                                <span class="form-text" style="font-size: 1rem; color: #555;">
                                    Allied Local Emergency Response Teams, MacArthur Hwy, Valenzuela, Metro Manila
                                </span>
                            </div>
                            <div class="mb-3">
                                <strong style="font-size: 1.2rem; color: #333;">Purpose:</strong>
                                <span class="form-text" style="font-size: 1rem; color: #555;">
                                    <?php echo htmlspecialchars($assigned['purpose']); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <strong style="font-size: 1.2rem; color: #333;">Person to Look For:</strong>
                                <span class="form-text" style="font-size: 1rem; color: #555;">
                                    <?php
                                    if ($assigned) {
                                        echo htmlspecialchars($assigned['adminFullName']);
                                    } else {
                                        echo "Admin not found.";
                                    }
                                    ?>
                                </span>
                            </div>

                            <!-- Agenda -->
                            <div class="mb-3">
                                <strong style="font-size: 1.2rem; color: #333;">Agenda:</strong>
                                <span class="form-text" style="font-size: 1rem; color: #555;">
                                    <?php
                                    if (!empty($agendaData['agenda'])) {
                                        echo htmlspecialchars($agendaData['agenda']);
                                    } else {
                                        echo "No agenda submitted.";
                                    }
                                    ?>
                                </span>
                            </div>

                            <!-- Form to submit new agenda, only if no existing agenda -->
                            <?php if (empty($agendaData['agenda'])): ?>
                                <form method="POST" action="agenda-process.php" class="mb-3">
                                    <div class="mb-3">
                                        <strong style="font-size: 1.2rem; color: #333;">Submit New Agenda:</strong>

                                        <!-- Footnote Button -->
                                        <div class="d-flex align-items-center mb-4">
                                            <button type="button" class="btn rounded-circle" id="footnoteButton"
                                                style="font-size: 1rem; padding: 8px; width: 40px; height: 40px; background-color: transparent; border: none; box-shadow: none; margin-right: 10px;"
                                                data-bs-toggle="modal" data-bs-target="#agendaInstructionsModal">
                                                <i class="bi bi-info-circle" style="font-size: 1.5rem;"></i>
                                            </button>
                                            <span class="ms-2" style="font-size: 1rem;">Click the button for instructions on submitting the agenda.</span>
                                        </div>

                                        <!-- Modal for Instructions -->
                                        <div class="modal fade" id="agendaInstructionsModal" tabindex="-1" aria-labelledby="agendaInstructionsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered"> <!-- Centering the modal -->
                                                <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                                                    <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                                                        <h5 class="modal-title text-center" id="agendaInstructionsModalLabel" style="font-weight: bold; font-family: Arial;">
                                                            INSTRUCTIONS FOR SUBMITTING AGENDA
                                                        </h5>
                                                    </div>

                                                    <div class="modal-body">
                                                        <h6 class="mb-3" style="font-size: 1.1rem; color: #333;">Please follow the instructions below:</h6>
                                                        <ul style="list-style-type: disc; padding-left: 20px;">
                                                            <li><strong>Enter Agenda:</strong> Provide a clear agenda in the text area.</li>
                                                            <li><strong>Review:</strong> Make sure to review your input before submitting.</li>
                                                            <li><strong>Submit:</strong> Click the "Submit" button to send your agenda.</li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <textarea class="form-text d-block bg-light p-2 border border-dark rounded"
                                            style="font-size: 1rem; width: 100%; resize: none;"
                                            rows="3"
                                            name="agendaInput"
                                            oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px';"></textarea>
                                    </div>
                                    <input type="hidden" name="approvedID" value="<?php echo $assigned['approvedID']; ?>" />
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-dark" style="font-size: 0.8rem; padding: 8px 16px; border-radius: 30px; 
                           background: linear-gradient(90deg, #C80000, #ff4e50); border: none; 
                           color: white; transition: background 0.3s, transform 0.2s; font-weight: bold; width: 20%; font-size: 1rem; padding: 8px;">Submit</button>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>



                    </div>

                </div>

                <hr class="my-4" style="border-top: 2px solid #367AFF;">

                <!-- Checkbox 3 -->
                <div class="sena-rec-checkboxes">
                    <input type="checkbox" id="settlementAgreement" name="settlementAgreement" value="1">
                    <label for="settlementAgreement">
                        <span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Settlement Agreement</span>
                        <sup id="footnote3" data-bs-toggle="popover" data-bs-content="A legally binding document that resolves a dispute between parties, often including terms for compensation, behavior, or future actions." data-bs-trigger="hover" style="cursor: pointer;">3</sup>
                    </label>
                </div>

                <hr class="my-4" style="border-top: 2px solid #367AFF;">

                <!-- Checkbox 4 -->
                <div class="sena-rec-checkboxes">
                    <input type="checkbox" id="withdrawal" name="withdrawal" value="1">
                    <label for="withdrawal">
                        <span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Withdrawal</span>
                        <sup id="footnote4" data-bs-toggle="popover" data-bs-content="In legal or organizational contexts, a withdrawal signifies the formal retraction of a case, application, or position." data-bs-trigger="hover" style="cursor: pointer;">4</sup>
                    </label>
                </div>

                <hr class="my-4" style="border-top: 2px solid #367AFF;">

                <!-- Checkbox 5 -->
                <div class="sena-rec-checkboxes">
                    <input type="checkbox" id="referral" name="referral" value="1">
                    <label for="referral">
                        <span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Referral</span>
                        <sup id="footnote5" data-bs-toggle="popover" data-bs-content="Referring a case or individual involves directing them to a specialized party or institution for additional support, assessment, or decision-making." data-bs-trigger="hover" style="cursor: pointer;">5</sup>
                    </label>
                </div>

                <hr class="my-4 mb-5" style="border-top: 2px solid black;">

                <div class="form-group">
                    <label for="remarks-textarea">
                        <span style="font-family: Arial; font-weight: bold; font-size: 1.5rem; padding-left: 3.5%">Remarks</span>
                    </label>
                    <textarea class="mb-5" id="remarks-textarea" name="remarks" rows="5" style="resize: none; height: 100px; margin-left: 3.5%;"></textarea>
                </div>

                <div class="btn-container" style="padding-bottom: 10%">

                    <div class="d-flex justify-content-end mb-5" style="padding-left: 88%">
                        <div class="dropdown">
                            <button class="btn fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 1rem; padding: 10px 24px; border-radius: 30px; background: linear-gradient(90deg, #C80000, #ff4e50); border: none; color: white; transition: background 0.3s, transform 0.2s;">
                                ACTIONS
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <button id="saveDraftBtn" type="button" class="dropdown-item">SAVE</button>
                                </li>
                                <li>
                                    <input type="hidden" id="referenceID" name="referenceID" value="<?php echo htmlspecialchars($assigned['referenceID']); ?>">
                                    <button type="submit" id="closeCaseBtn" class="dropdown-item btn btn-dark">CLOSE CASE</button>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('closeCaseBtn').addEventListener('click', function() {
                                const isChecked1 = document.getElementById('adviceCounseling').checked; // "Advice and Counseling"
                                const isChecked2 = document.getElementById('jointConference').checked; // "Set Joint Conference"
                                const isChecked3 = document.getElementById('settlementAgreement').checked; // "Settlement Agreement"
                                const isChecked4 = document.getElementById('withdrawal').checked; // "Withdrawal"
                                const isChecked5 = document.getElementById('referral').checked; // "Referral"

                                // Condition 1: Allow only "Referral" to proceed
                                if (isChecked5 && !isChecked1 && !isChecked2 && !isChecked3 && !isChecked4) {
                                    const referralOnlyModal = new bootstrap.Modal(document.getElementById('confirmReferralOnlyModal'));
                                    referralOnlyModal.show();
                                    document.getElementById('confirmReferralOnlyProceed').onclick = function() {
                                        document.getElementById('takeAction').submit();
                                    };
                                    return;
                                }

                                // Condition 2: Allow "Referral" and "Set Joint Conference" together to proceed
                                if (isChecked5 && isChecked2) {
                                    document.getElementById('takeAction').submit();
                                    return;
                                }

                                // Condition 3: Allow "Advice and Counseling" alone to proceed
                                if (isChecked1 && !isChecked2 && !isChecked5 && !isChecked3 && !isChecked4) {
                                    document.getElementById('takeAction').submit();
                                    return;
                                }

                                // Condition 4: Allow "Settlement Agreement" alone to proceed
                                if (isChecked3 && !isChecked1 && !isChecked2 && !isChecked4 && !isChecked5) {
                                    document.getElementById('takeAction').submit();
                                    return;
                                }

                                // Condition 5: Allow "Withdrawal" alone to proceed
                                if (isChecked4 && !isChecked1 && !isChecked2 && !isChecked3 && !isChecked5) {
                                    document.getElementById('takeAction').submit();
                                    return;
                                }

                                // Condition 6: Show modal if "Set Joint Conference" is selected without required conditions
                                if (isChecked2 && !isChecked1 && !isChecked5 && !isChecked3 && !isChecked4) {
                                    const setJointConferenceModal = new bootstrap.Modal(document.getElementById('setJointConferenceModal'));
                                    setJointConferenceModal.show();
                                    return;
                                }

                                // Default condition: Show invalid selection modal
                                const invalidSelectionModal = new bootstrap.Modal(document.getElementById('invalidSelectionModal'));
                                invalidSelectionModal.show();
                            });
                        });
                    </script>

                    <!-- CLOSE CASE BUTTON which is also called COMPLETED status -->
                    <!-- <div class="right-btn col-md-2" style="margin-left: 60%">
                        <input type="hidden" id="referenceID" name="referenceID" value="<?php echo htmlspecialchars($assigned['referenceID']); ?>">
                        <button type="button" id="closeCaseBtn" class="btn btn-dark" style="background-color:#696969; width:100%; height: 45px;">CLOSE CASE</button>
                    </div> -->

                    <?php if (isset($assigned['referenceID'])): ?>
                        <script>
                            const referenceID = <?php echo json_encode($assigned['referenceID']); ?>; // Safely encode the PHP variable


                            if (referenceID) {
                                console.log("Reference ID:", referenceID); // Log the referenceID to the console
                            } else {
                                console.log("Reference ID does not exist.");
                            }
                        </script>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal for Confirm Referral Only -->
    <div class="modal fade" id="confirmReferralOnlyModal" tabindex="-1" aria-labelledby="confirmReferralOnlyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                    <h5 class="modal-title text-center" id="confirmReferralOnlyModalLabel" style="font-weight: bold; font-family: Arial;">
                        Proceed with Referral Only?
                    </h5>
                </div>
                <div class="modal-body">
                    <p>You have only selected "Referral." Are you sure you want to proceed with referral alone?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary" id="confirmReferralOnlyProceed" style="border-radius: 30px;">
                        Proceed
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Set Joint Conference Condition -->
    <div class="modal fade" id="setJointConferenceModal" tabindex="-1" aria-labelledby="setJointConferenceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                    <h5 class="modal-title text-center" id="setJointConferenceModalLabel" style="font-weight: bold; font-family: Arial;">
                        Set Joint Conference Requirement
                    </h5>
                </div>
                <div class="modal-body">
                    <p>Please check either "Advice and Counseling" or "Referral" to proceed with the "Set Joint Conference."</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Invalid Selection -->
    <div class="modal fade" id="invalidSelectionModal" tabindex="-1" aria-labelledby="invalidSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                    <h5 class="modal-title text-center" id="invalidSelectionModalLabel" style="font-weight: bold; font-family: Arial;">
                        Invalid Selection
                    </h5>
                </div>
                <div class="modal-body">
                    <p>Please select a valid option to proceed.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                        Back to Selection
                    </button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal for Draft Saved Confirmation -->
    <div class="modal fade" id="saveDraftModal" tabindex="-1" aria-labelledby="saveDraftModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border rounded shadow" style="border: 1px solid #ddd;">
                <div class="modal-header" style="background-color: #140c3e; color: #eee203;">
                    <h5 class="modal-title text-center" id="saveDraftModalLabel" style="font-weight: bold; font-family: Arial;">
                        DRAFT SAVED
                    </h5>
                </div>
                <div class="modal-body">
                    <p style="font-size: 1.1rem; color: #333;">Your draft has been saved successfully!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #C80000; color: white; border-radius: 30px;">
                        Return to Form
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to save form state in localStorage
        function saveFormState() {
            const formState = {
                adviceCounseling: document.getElementById('adviceCounseling').checked,
                jointConference: document.getElementById('jointConference').checked,
                settlementAgreement: document.getElementById('settlementAgreement').checked,
                withdrawal: document.getElementById('withdrawal').checked,
                referral: document.getElementById('referral').checked,
                remarks: document.getElementById('remarks-textarea').value
            };

            // Save state to localStorage
            localStorage.setItem('formState', JSON.stringify(formState));
            console.log('Form state saved:', formState);

            // Show the draft saved modal
            const saveDraftModal = new bootstrap.Modal(document.getElementById('saveDraftModal'));
            saveDraftModal.show();
        }

        // Function to load form state from localStorage
        function loadFormState() {
            const savedState = localStorage.getItem('formState');
            console.log('Loading form state:', savedState);

            if (savedState) {
                const formState = JSON.parse(savedState);

                document.getElementById('adviceCounseling').checked = formState.adviceCounseling;
                document.getElementById('jointConference').checked = formState.jointConference;
                document.getElementById('settlementAgreement').checked = formState.settlementAgreement;
                document.getElementById('withdrawal').checked = formState.withdrawal;
                document.getElementById('referral').checked = formState.referral;
                document.getElementById('remarks-textarea').value = formState.remarks;

                console.log('Form state restored:', formState);
            } else {
                console.log('No saved state found.');
            }
        }

        // Function to clear the form state in localStorage
        function clearFormState() {
            localStorage.removeItem('formState');
            alert('Draft cleared!');
            console.log('Form state cleared from localStorage.');

            // Optionally reset the form visually
            document.getElementById('checkboxForm').reset();
        }

        // Event listeners for buttons
        document.getElementById('saveDraftBtn').addEventListener('click', saveFormState);
        document.getElementById('clearDraftBtn').addEventListener('click', clearFormState);

        // Load the form state when the page is loaded
        window.onload = loadFormState;
    </script>


    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>


</body>
<script src="super-admin.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
    //Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    $(document).ready(function() {
        // Initialize the datetime picker plugin
        $('#input1').datepicker({
            format: 'mm/dd/yyyy', // Specify the date format
            autoclose: true // Close the picker when a date is selected
        });
    });
    $(document).ready(function() {
        // Initialize the datetime picker plugin
        $('#input2').timepicker({
            format: 'mm/dd/yyyy', // Specify the date format

            autoclose: true // Close the picker when a date is selected
        });
    });
    //Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    function toggleDiv() {
        var checkbox = document.getElementById('checkbox2');
        var additionalInfoDiv = document.getElementById('additional-info');

        // Check if the checkbox is checked
        if (checkbox.checked) {
            additionalInfoDiv.style.display = 'block'; // Show the div
        } else {
            additionalInfoDiv.style.display = 'none'; // Hide the div
        }
    }

    function cloneContainer() {
        // Clone the original content and container
        var originalContent = document.getElementById('originalContent');
        var clonedContent = originalContent.cloneNode(true);
        var originalContainer = clonedContent.querySelector('#originalContainer');

        // Remove the button from the cloned container
        var button = originalContainer.querySelector('.image-button');
        button.remove();

        // Append the cloned content after the original content
        originalContent.parentNode.insertBefore(clonedContent, originalContent.nextSibling);
    }

    /////////////////////////////////
    let output = document.getElementById('output');
    let buttons = document.getElementsByClassName('tool--btn');
    for (let btn of buttons) {
        btn.addEventListener('click', () => {
            let cmd = btn.dataset['command'];
            if (cmd === 'createlink') {
                let url = prompt("Enter the link here: ", "http:\/\/");
                document.execCommand(cmd, false, url);
            } else if (cmd === 'fontSize') {
                let fontSize = prompt("Enter the font size (1-7): ", "3");
                document.execCommand(cmd, false, fontSize);
            } else {
                document.execCommand(cmd, false, null);
            }
        });
    }

    function footnotePopovers() {
        var popoverElements = document.querySelectorAll('[data-bs-toggle="popover"]');
        popoverElements.forEach(function(element) {
            new bootstrap.Popover(element, {
                placement: 'bottom', // Position the popover above the element
                trigger: 'hover', // Display popover on hover
                html: true, // Allow HTML in popover content
                container: 'body', // Append popover to body to avoid overflow issues
                customClass: 'custom-popover' // Optional: Custom class for further styling
            });
        });
    }

    // Call the function on page load
    document.addEventListener("DOMContentLoaded", initializePopovers);
</script>

</html>