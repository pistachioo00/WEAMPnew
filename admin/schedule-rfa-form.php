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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Schedule RFA</title>
</head>
<style>
    .custom-navbar {
        background-color: #C80000 !important;

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
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top custom-navbar" style="position: fixed; width: 100%; z-index: 999;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button class="navbar-toggler" style="background-color: #fff; border: none;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
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

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../admin/admin-account.php">
                        <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                        My Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php" onclick="showLogoutConfirmation()">
                        <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </nav>



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

    <?php
    $adminID = $_SESSION['adminID'];

    include '../public/config.php';


    $sql = "SELECT adminID, fullName FROM admin";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <div class="container mt-5" style="max-width: 950px; margin: auto; font-family: Arial; padding-top: 8%;">
        <form action="schedule-rfa-process.php" method="POST" enctype="multipart/form-data" id="interviewDetailsForm"
            class="border rounded shadow" style="width: 100%; border: 1px solid #ddd; padding: 20px;">
            <h1 class="mt-2 mb-3 text-center" style="color: #eee203; width:100%; background-color: #140c3e; padding: 8px; border-radius: 8px; display: inline-block; font-weight: bold; font-size: 2.1rem;">
                SCHEDULE INTERVIEW
            </h1>
            <div class="mb-2">
                <strong style="font-size: 1.2rem; color: #333;">Requesting Party Name:</strong>
                <span class="form-text" style="font-size: 1rem; color: #555;">
                    <?php echo htmlspecialchars($assigned['fullName']); ?>
                </span>
            </div>
            <div class="mb-2">
                <strong style="font-size: 1.2rem; color: #333;">Reference ID:</strong>
                <span class="form-text" style="font-size: 1rem; color: #555;">
                    <?php echo htmlspecialchars($assigned['referenceID']); ?>
                </span>
            </div>

            <div class="mb-2 row">
                <div class="col-md-6">
                    <label for="date" class="form-label" style="font-size: 0.9rem;">Interview Date</label>
                    <input type="date" class="form-control" id="date" name="date" required style="background-color: #fff; border: 1px solid black; font-size: 0.9rem;">
                </div>
                <div class="col-md-6">
                    <label for="time" class="form-label" style="font-size: 0.9rem;">Interview Time</label>
                    <input type="time" class="form-control" id="time" name="time" required
                        style="background-color: #fff; border: 1px solid black; font-size: 0.9rem;"
                        step="600">
                </div>

            </div>

            <div class="mb-2">
                <label for="location" class="form-label" style="font-size: 0.9rem;">Location</label>
                <input type="text" class="form-control" id="location" name="location"
                    value="Allied Local Emergency Response Teams, MacArthur Hwy, Valenzuela, Metro Manila"
                    placeholder="Enter location" required readonly style="background-color: #fff; border: 1px solid black; font-size: 0.9rem;">
            </div>

            <div class="mb-2">
                <label for="purpose" class="form-label" style="font-size: 0.9rem;">Purpose</label>
                <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Enter purpose" required style="background-color: #fff; border: 1px solid black; font-size: 0.9rem;">
            </div>

            <div class="mb-2">
                <label for="adminID" class="form-label" style="font-size: 0.9rem;">Person to Look For</label>
                <select class="form-select" id="adminID" name="adminID" required
                    style="background-color: #fff; border: 1px solid black; font-size: 0.9rem;">
                    <option value="">Select a person</option>
                    <?php while ($admin = $result->fetch_assoc()) { ?>
                        <option value="<?php echo htmlspecialchars($admin['adminID']); ?>"
                            <?php if (htmlspecialchars($admin['fullName']) === htmlspecialchars($assigned['adminFullName'])) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($admin['fullName']); ?>
                        </option>
                    <?php } ?>
                </select>

                <!-- Footnote for guidance -->
                <div id="footnote" style="display:none; font-size: 0.8rem; color: gray; margin-top: 0.5rem;">
                    Please pick a desk officer that the requesting party shall look for.
                </div>
            </div>


            <div class="mb-2 text-end">
                <button type="submit" class="btn button w-25"
                    style="font-size: 0.8rem; padding: 8px 16px; border-radius: 30px; 
                           background: linear-gradient(90deg, #C80000, #ff4e50); border: none; 
                           color: white; transition: background 0.3s, transform 0.2s; font-weight: bold;">
                    SEND
                </button>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
<script src="../js/schedule.js"></script>