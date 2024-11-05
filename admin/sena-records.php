<?php
include 'auth-admin.php';
checkAdminLogin();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENA Records - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
</head>


<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #C80000; position: fixed; width: 100%; z-index: 999;">
        <div class="container">
            <a class="navbar-brand" href="../admin/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 80px;">
            </a>
            <button class="navbar-toggler" style="background-color: #fff;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #C80000;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="RFA" data-bs-content='<div><a class="nav-link text-black" href="rfa-entries.php" class="btn btn-link">New Entries</a><br><a class="nav-link text-black" href="rfa-assignment.php" class="btn btn-link">Assignment</a></div>' data-bs-placement="bottom">
                            RFA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="recordsLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title-center="Records" data-bs-content='<div><a class="nav-link text-black" href="sena-records.php" class="btn btn-link">SENA Conferences</a><br><a class="nav-link text-black" href="#" class="btn btn-link">Advice Counselling</a></div>' data-bs-placement="bottom">
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
                    <a class="nav-link text-white" href="#" onclick="showLogoutConfirmation()">
                        <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                        Log Out
                    </a>
                </li>
            </ul>
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


    <!-- Modal for Delete Row -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Row</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this row?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><a class="nav-link"
                            href="../admin/sena-records.php">Delete</button></a>
                    <button type="button" class="btn btn-secondary"><a class="nav-link"
                            href="../admin/sena-records.php">Close</button></a>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-top:7%"></div>
    <div class="container mt-5 mb-5" style="border: 2px solid black; padding: 1%">
        <form action="" method="GET">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3">
                    <div class="searchbar-rec">
                        <div class="label">Claims/Issues</div>
                        <input type="text" name="claimsIssues" class="form-control" style="background-color: #E5EEFF; border: 1px solid black; border-radius: 10px" value="<?php echo isset($_GET['claimsIssues']) ? htmlspecialchars($_GET['claimsIssues']) : ''; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="searchbar-rec">
                        <div class="label">Relief Prayed</div>
                        <input type="text" name="reliefPrayed" class="form-control" style="background-color: #E5EEFF; border: 1px solid black; border-radius: 10px" value="<?php echo isset($_GET['reliefPrayed']) ? htmlspecialchars($_GET['reliefPrayed']) : ''; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="searchbar-rec">
                        <div class="label">Date</div>
                        <div class="input-with-icon">
                            <input type="date" name="dateCreated" class="form-control" style="background-color: #E5EEFF; border: 1px solid black; border-radius: 10px" value="<?php echo isset($_GET['dateCreated']) ? htmlspecialchars($_GET['dateCreated']) : ''; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mt-3">
                    <div class="searchbar-rec">
                        <button type="submit" class="btn btn-dark btn-block button fw-bold btn-hover" style="font-family: Arial; height: 4%; font-size: .83rem; background-color: black">SEARCH</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- /**
     * NOTE:
     * THERE WILL BE A LOGICAL PROBLEM TO APPEAR BY THE TIME YOU FIXED RFA-NEW-ENTRIES
     * WHICH SHALL ENABLE BY THE TIME THE ADMIN SUCCESSFULLY COMPLETED THE RFA
     *
     * IN ORDER TO FIX THE PROBLEM. MATCH THE COMPLETED RFAs THAT THE ADMIN HAD FINISHED
     * TO APPEAR IN THE TABLE
     */ -->

    <?php
    include('../public/config.php');

    // Check if the adminID is set
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
     */
    // Get the current adminID from the session
    $adminID = $_SESSION['adminID'];

    // Query to fetch logs
    $sql = "SELECT 
            rfa.referenceID,
            rfa.claimsAndIssues,
            comp.settlement,
            rfa.businessName,
            acc.category,
            rfa.date AS dateCreated,
            acc.accountID,
            acc.fullName AS accFullName,
            acc.email AS accEmail,
            assign.*, 
            admin.adminID AS AdminID,
            admin.fullName AS adminFullName,
            admin.email AS adminEmail,
            comp.*
        FROM 
            rfa 
        JOIN 
            account AS acc ON rfa.accountID = acc.accountID
        JOIN 
            assignment AS assign ON rfa.accountID = assign.accountID
        JOIN 
            admin AS admin ON assign.adminID = admin.adminID
        JOIN 
            completed_case AS comp ON comp.adminID = admin.adminID
        WHERE 
            rfa.status = 'COMPLETED' AND assign.adminID = ?;";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $adminID);

    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }
    $result = $stmt->get_result();
    $records = $result->fetch_all(MYSQLI_ASSOC);
    ?>


    <div class="container mt-5 mb-5">
        <h2 class="text-start" style="font-family: sub-font-bold; font-weight: bold">SENA Conferences</h2>


        <table class="table-sena-records" style="padding-bottom: 20%;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Reference No</th>
                    <th>Claims/Issues</th>
                    <th>Settlement</th>
                    <th>Responding Party</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)): ?>
                    <?php foreach ($records as $record): ?>
                        <tr style="background-color:#E5EEFF">
                            <td><?php echo htmlspecialchars($record['dateCreated']); ?></td>
                            <td> SEAD RCMD NCR-VAL-<?php echo htmlspecialchars(string: $record['referenceID']); ?>-<?php echo date_format(date_create(htmlspecialchars($record['dateCreated'])), 'm-Y'); ?></td>
                            <td><?php echo htmlspecialchars($record['settlement']); ?></td>
                            <td><?php echo htmlspecialchars($record['businessName']); ?></td>
                            <td><?php echo htmlspecialchars($record['category']); ?></td>
                            <td>
                                <div class="button-container">
                                    <a href="sena-details.php"><button class="button col-auto"><img src="../assets/pencil--change-edit-modify-pencil-write-writing.svg" alt=""></button></a>
                                    <button class="button col-auto"><img src="../assets/import.svg" alt=""></button>
                                    <button class="button col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="../assets/trash.svg" alt=""></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>



    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</script>

</html>