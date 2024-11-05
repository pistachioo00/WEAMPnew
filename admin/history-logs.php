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
    <title>RFA History Logs</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> <!-- Include Bootstrap Icons -->

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

    /* For Side Menu */
    .side-menu {
        width: 250px;
        position: absolute;
        top: 0;
        bottom: 0;
        padding-top: 20px;
        z-index: 1000;
    }

    .side-menu .nav-link {
        font-size: 16px;
        padding: 10px 20px;
        pointer-events: auto;
    }

    .side-menu .nav-link:hover {
        background-color: #f8f9fa;
        border-radius: 8px;
        color: #007bff;
    }

    .content-wrapper {
        margin-left: 250px;
    }

    .profile-btn {
        background-color: #f9f9f9;
        color: #5A5A5A;
        padding: 4px 12px;
        min-width: 120px;
        max-width: 120px;
        border: none;
        box-shadow: none;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }


    .profile-btn:hover {
        background-color: #F5F5F5;
    }

    .profile-dropdown-menu {
        min-width: 200px;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: none;
    }

    .profile-item {
        color: #5A5A5A;
        font-size: 14px;
    }

    .dropdown-header {
        font-size: 13px;
        font-weight: bold;
        color: #8A8A8A;
    }

    .dropdown-icon {
        margin-left: 8px;
        font-size: 12px;
        color: #5A5A5A;
        vertical-align: middle;
    }
</style>

<body>
    <div class="container-fluid">

        <div class="d-flex">
            <!-- Side Menu -->
            <nav class="side-menu bg-light border-end vh-100">
                <div class="menu-header p-3 text-white">
                    <img src="../assets/Valenzuela-Seal-Outline.svg" alt="WAO Logo" style="height: 150px; width: 150px; margin-right: 8px; vertical-align: middle;">
                </div>

                <ul class="nav flex-column p-2">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../admin/dashboard.php">
                            <i class="bi bi-house-door-fill me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../admin/history-logs.php">
                            <i class="bi bi-clock-history me-2"></i>RFA History Log
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../admin/rfa-no-assignment.php">
                            <i class="bi bi-people-fill me-2"></i>Manage Assignments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="sena-records.php">
                            <i class="bi bi-file-earmark-text-fill me-2"></i>Sena Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="account-settings.php">
                            <i class="bi bi-gear-fill me-2"></i>Account Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="support.php">
                            <i class="bi bi-info-circle-fill me-2"></i>Support
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- As a temporary workaround, you can use JavaScript to force navigation when the links are clicked -->
        <script>
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', (e) => {
                    window.location.href = link.getAttribute('href');
                });
            });
        </script>

        <?php
        include('../public/config.php');

        // Check if adminID is set in the session
        if (!isset($_SESSION['adminID'])) {
            die("Unauthorized access. Please log in.");
        }

        // Use the adminID from the session as the adminID
        $adminID = $_SESSION['adminID'];

        // Fetch account details
        $adminQuery = "SELECT fullName, email FROM admin WHERE adminID = ?";
        $stmt = $conn->prepare($adminQuery);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("i", $adminID); // Use the correct variable
        $stmt->execute();
        $adminResult = $stmt->get_result();

        if ($adminResult->num_rows > 0) {
            $admin = $adminResult->fetch_assoc();
        } else {
            // Handle case where no account was found
            die("No account found for the given adminID.");
        }
        ?>

        <!-- Profile Dropdown Menu aligned to the right -->
        <div class="d-flex justify-content-end" style="background-color: #f9f9f9;">
            <div class="dropdown">
                <button class="btn dropdown-toggle profile-btn" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="flex-grow-1 text-truncate"><?php echo htmlspecialchars($admin['fullName']); ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end profile-dropdown-menu" aria-labelledby="profileDropdown">
                    <li class="dropdown-header text-muted">
                        <span><?php echo htmlspecialchars($admin['email']); ?></span>
                    </li>
                    <hr class="dropdown-divider">
                    <li><a class="dropdown-item profile-item" href="/my-profile">My Profile</a></li>
                    <li><a class="dropdown-item profile-item" href="/settings">Settings</a></li>
                    <li><a class="dropdown-item profile-item text-danger" style="cursor: pointer;" onclick="showLogoutConfirmation();">Logout</a></li>
                </ul>
            </div>
        </div>

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


        <?php
        include('../public/config.php');

        // Check if the accountID is set
        if (!isset($_SESSION['adminID'])) {
            die("Unauthorized access. Please log in.");
        }

        /**
         * NOTE: 
         * THERE WILL BE A LOGICAL PROBLEM TO APPEAR BY THE TIME YOU FIXED RFA-NEW-ENTRIES
         * WHICH SHALL ENABLE BY THE TIME THE ADMIN SUCCESSFULLY COMPLETED THE RFA
         * 
         * IN ORDER TO FIX THE PROBLEM. MATCH THE COMPLETED RFAs THAT THE ADMIN HAD FINISHED
         * TO APPEAR IN THE TABLE
         * 
         * */
        // Get the current accountID from the session
        $adminID = $_SESSION['adminID'];

        // Query to fetch logs
        $sql = "SELECT 
            rfa.*,
            rfa.status AS status,
            rfa.date AS dateCreated,
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
            rfa.status = 'COMPLETED' AND assign.adminID = ?;";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $adminID);
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

        <div class="content-wrapper">
            <div class="log-container">
                <h1 class="log-title text-start mt-5 mb-4" style="font-weight:bold; font-size: 2em; padding-top:5%">
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
                                <th>Interview Date</th>
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
                                        <td><?php echo date("Y-m-d", timestamp: strtotime($log['date'])); ?></td>
                                        <?php

                                        $statusColor = '';

                                        switch ($log['status']) {
                                            case 'PENDING':
                                                $statusColor = '#C80000'; // Nazarene Red for Pending
                                                break;
                                            case 'IN PROGRESS':
                                                $statusColor = '#0000FF'; // Blue for In Progress
                                                break;
                                            case 'REVIEWED':
                                                $statusColor = '#0000FF'; // Blue for Reviewed
                                                break;
                                            case 'APPROVED':
                                                $statusColor = '#000080'; // Navy Blue for Approved
                                                break;
                                            case 'SCHEDULED':
                                                $statusColor = '#0000FF'; // Blue for Scheduled
                                                break;
                                            case 'COMPLETED':
                                                $statusColor = '#000080'; // Navy Blue for Completed
                                                break;
                                            case 'CLOSED CASE':
                                                $statusColor = '#000080'; // Navy Blue for Closed Case
                                                break;
                                            default:
                                                $statusColor = ''; // Default color if needed
                                        }
                                        ?>
                                        <td style="text-align: center;">
                                            <div style="color: white; font-weight: bold; border-radius: 15px; background-color: <?php echo htmlspecialchars($statusColor); ?>; display: inline-block; padding: 6px 10px; text-align: center; margin: auto;">
                                                <?php echo htmlspecialchars($log['status']); ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No logs available</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- JavaScript to manage pagination, search, and loading -->
        <script>
            function refreshLogs() {
                document.getElementById('loadingIndicator').style.display = 'inline-block';
                setTimeout(() => {
                    document.getElementById('loadingIndicator').style.display = 'none';
                    location.reload(); // Refresh the page
                }, 1000); // Simulate a loading delay
            }

            // Search functionality
            document.getElementById('searchButton').addEventListener('click', () => {
                const searchValue = document.getElementById('searchInput').value.toLowerCase();
                const rows = document.querySelectorAll('.log-table tbody tr');
                rows.forEach(row => {
                    const text = row.innerText.toLowerCase();
                    row.style.display = text.includes(searchValue) ? '' : 'none';
                });
            });
        </script>
    </div>
</body>

</html>

<script src="super-admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
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
<script>
    //Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })


    function showLogoutConfirmation() {
        $('#logoutConfirmationModal').modal('show');
    }

    function logout() {
        window.location.href = "logout.php";
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

    document.querySelectorAll('.side-menu .nav-link').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
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


    // functiishowNoResultsModal() {
    //     document.getElementById("noResultsModal").style.display = "block";
    // }

    // function closeModal() {
    //     document.getElementById("noResultsModal").style.display = "none";
    // }

    // // Close the modal when clicking outside of it
    // window.onclick = function(event) {
    //     if (event.target === document.getElementById("noResultsModal")) {
    //         closeModal();
    //     }
    // };
</script>