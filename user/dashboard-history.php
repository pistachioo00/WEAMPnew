<?php
include 'auth.php';
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History LOGS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> <!-- Include Bootstrap Icons -->
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
    .log-container {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .log-title {
        text-align: center;
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .log-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .log-table th,
    .log-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .log-table th {
        background-color: #e7e7e7;
        font-weight: 600;
        color: #555;
    }

    .log-table td {
        font-size: 14px;
        color: #444;
    }

    .log-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .log-table .status {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 20px;
        text-align: center;
        text-transform: uppercase;
    }

    /* Status colors */
    .status.in-progress {
        background-color: #ffca28;
        color: #fff;
    }

    .status.completed {
        background-color: #4caf50;
        color: #fff;
    }

    .status.pending {
        background-color: #ff9800;
        color: #fff;
    }

    .status.reviewed {
        background-color: #2196f3;
        color: #fff;
    }

    @media (max-width: 768px) {

        .log-table th,
        .log-table td {
            padding: 10px 8px;
        }

        .log-title {
            font-size: 20px;
        }
    }

    .search-bar {
        display: flex;
        align-items: center;
        width: 20%;
    }

    #searchInput {
        margin-right: 0px;
        /* Space between input and button */
    }

    .pagination-controls {
        align-self: center;
        /* Aligns the pagination controls vertically */
    }

    .btn-group .btn {
        margin-left: 5px;
        /* Space between pagination buttons */
    }

    .loading-indicator {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid gray;
        border-top: 3px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-left: 10px;
        /* Spacing between title and indicator */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%; background-color: #fff; border: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #C80000;"></span>
            </button>
            <div class="mr-5"></div>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mr-5">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/rfa.php">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/dashboard-status.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/contact-us.php">Contact</a>
                    </li>
                    <div class="mr-5"></div>
                </ul>
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

    <!-- Collapsible content -->
    <div class="collapse position-fixed" style="width: 20%; left: 65%; top: 0; max-height: 400px; overflow-y: auto; font-family: Arial; padding-top: 5%; z-index: 9999;" id="collapseNotifications">
        <div class="card card-body">
            <ul class="notification-list">
                <!-- Example notifications -->
                <li>No notifications</li>
            </ul>
        </div>
    </div>

    <?php
    include('../public/config.php');

    // Check if the accountID is set
    if (!isset($_SESSION['accountID'])) {
        die("Unauthorized access. Please log in.");
    }

    // Get the current accountID from the session
    $accountID = $_SESSION['accountID'];

    // Query to fetch logs
    $sql = "SELECT 
            rfa.*,
            acc.accountID,
            acc.fullName AS accFullName,
            acc.email AS accEmail,
            assign.*, 
            admin.adminID AS AdminID,
            admin.fullName AS adminFullName,
            admin.email AS adminEmail
        FROM 
            rfa AS rfa
        JOIN 
            account AS acc ON rfa.accountID = acc.accountID
        JOIN 
            assignment AS assign ON rfa.accountID = assign.accountID
        JOIN 
            admin AS admin ON assign.adminID = admin.adminID
        WHERE 
            rfa.status = 'COMPLETED' AND assign.accountID = ?;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $accountID);
    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }
    $result = $stmt->get_result();
    $logs = $result->fetch_all(MYSQLI_ASSOC);

    // // Handle CSV download
    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['download_logs'])) {

    //     // Check if logs are available
    //     if (!empty($logs)) {
    //         $filename = "rfa_logs_" . date('Y-m-d') . ".csv";

    //         header('Content-Type: text/csv');
    //         header('Content-Disposition: attachment; filename="' . $filename . '"');

    //         $output = fopen('php://output', 'w');

    //         // Add CSV header
    //         fputcsv($output, ['Reference ID', 'Business Name', 'Claims and Issues', 'Claims Remarks', 'Relief Prayed For', 'Reliefs Remarks', 'Date', 'Status']);

    //         // Add data to CSV
    //         foreach ($logs as $log) {
    //             fputcsv($output, $log);
    //         }

    //         fclose($output);
    //         exit();
    //     } else {
    //         echo "No logs available to download.";
    //         exit();
    //     }
    // }

    // Get the number of logs per page from the dropdown, default to 25 if not set
    $logsPerPage = isset($_POST['logsPerPage']) ? (int)$_POST['logsPerPage'] : 25;
    $totalLogs = count($logs); // Total number of log entries
    $totalPages = ceil($totalLogs / $logsPerPage); // Total number of pages

    // Get the current page from the URL, default to 1 if not set
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculate the offset for the query
    $offset = ($current_page - 1) * $logsPerPage;

    // Slice the logs array to get the current page's entries
    $currentLogs = array_slice($logs, $offset, $logsPerPage);
    ?>

    <div class="log-container">
        <h1 class="log-title text-start mt-5 mb-4" style="font-weight:bold; font-size: 2em">
            RFA History Log
            <span id="loadingIndicator" class="loading-indicator" style="display: none;"></span>
        </h1>
        <hr class="my-4" style="border-top: 2px solid grey;">

        <!-- Search Bar, Refresh, Download Buttons -->
        <div class="d-flex align-items-center mb-3 justify-content-between">
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                <button class="btn btn-primary mt-2" id="searchButton" style="width: 15%; background-color: grey;">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <div style="padding-right:45%"></div>

            <div class="d-flex align-items-center" style="gap: 1px;">
                <button class="btn btn-success" id="refreshButton" onclick="refreshLogs();" style="width: 40px; height: 40px; background-color: grey;">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
                <form method="post" action="" style="display: inline;">
                    <input type="hidden" name="download_logs" value="1">
                    <button type="submit" class="btn btn-info" style="width: 40px; height: 40px; background-color: grey;">
                        <i class="bi bi-file-earmark-spreadsheet"></i>
                    </button>
                </form>
            </div>

            <div class="d-flex align-items-center">
                <span id="resultCount"><?php echo $totalLogs; ?> results found</span>

                <!-- Dropdown for results per page -->
                <form method="post" class="ms-2">
                    <select name="logsPerPage" id="logsPerPage" onchange="this.form.submit();" class="form-select" style="width: 80px;">
                        <option value="25" <?php echo ($logsPerPage == 25) ? 'selected' : ''; ?>>25</option>
                        <option value="50" <?php echo ($logsPerPage == 50) ? 'selected' : ''; ?>>50</option>
                        <option value="100" <?php echo ($logsPerPage == 100) ? 'selected' : ''; ?>>100</option>
                    </select>
                </form>

                <div class="btn-group ms-2" role="group" aria-label="Pagination" style="gap:1px;">
                    <form method="get" class="mb-0">
                        <input type="hidden" name="page" value="<?php echo max(1, $current_page - 1); ?>">
                        <button type="submit" class="btn btn-secondary" id="prevButton" <?php echo $current_page == 1 ? 'disabled' : ''; ?>>
                            <i class="bi bi-arrow-left"></i>
                        </button>
                    </form>

                    <form method="get" class="mb-0">
                        <input type="hidden" name="page" value="<?php echo min($totalPages, $current_page + 1); ?>">
                        <button type="submit" class="btn btn-secondary" id="nextButton" <?php echo $current_page >= $totalPages ? 'disabled' : ''; ?>>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Result Count and Pagination Controls -->
        <div class="table-responsive">
            <table class="log-table">
                <thead>
                    <tr>
                        <th>Reference ID</th>
                        <th>Business Name</th>
                        <th>Claims and Issues</th>
                        <th>Claims Remarks</th>
                        <th>Relief Prayed For</th>
                        <th>Reliefs Remarks</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($currentLogs) > 0): ?>
                        <?php foreach ($currentLogs as $log): ?>
                            <tr>
                                <td style="font-weight: bold;">SEAD RCMD NCR-VAL-<?php echo htmlspecialchars($log['referenceID']); ?>-<?php echo date_format(date_create(htmlspecialchars($log['dateCreated'])), 'm-Y'); ?></td>
                                <td><?php echo htmlspecialchars($log['businessName']); ?></td>
                                <td><?php echo htmlspecialchars($log['claimsAndIssues']); ?></td>
                                <td><?php echo htmlspecialchars($log['claimsRemarks']); ?></td>
                                <td><?php echo htmlspecialchars($log['reliefPrayedFor']); ?></td>
                                <td><?php echo htmlspecialchars($log['reliefsRemarks']); ?></td>
                                <td><?php echo date("Y-m-d", strtotime($log['date'])); ?></td>
                                <td class="status <?php echo strtolower($log['status']); ?>">
                                    <?php echo htmlspecialchars($log['status']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" style="text-align: center;">No completed RFAs found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- <footer class="footer fixed-footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer> -->
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script src="index.js"></script>
<script>
    function showLogoutConfirmation() {
        var logoutModal = new bootstrap.Modal(document.getElementById('logoutConfirmationModal'));
        logoutModal.show();
    }


    function logout() {
        window.location.href = "../public/home.php";
    }

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

    $(document).ready(function() {
        // Get the current month and year
        var currentDate = new Date();
        var options = {
            month: 'long',
            year: 'numeric'
        };
        var monthYearString = currentDate.toLocaleDateString('en-US', options);

        // Set the input value to the current month
        $('#monthPicker').val(monthYearString);

        // Initialize the datepicker
        $('#monthPicker').datepicker({
            format: "MM yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        });
    });

    function refreshLogs() {
        const loadingIndicator = document.getElementById("loadingIndicator");
        loadingIndicator.style.display = "inline-block"; // Show loading indicator

        // Simulate a refresh operation (replace with your actual refresh logic)
        setTimeout(() => {
            loadingIndicator.style.display = "none"; // Hide loading indicator after refresh
            // Add your refresh logic here
        }, 2000); // Example timeout to simulate a loading period
    }


    function showNoResultsModal() {
        document.getElementById("noResultsModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("noResultsModal").style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target === document.getElementById("noResultsModal")) {
            closeModal();
        }
    };
</script>