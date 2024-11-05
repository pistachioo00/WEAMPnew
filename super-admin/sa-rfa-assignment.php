<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFA Assignment - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="nav nav-underline navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-items">
                        <a class="nav-link" href="../super-admin/sa-home.php">Home</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="../super-admin/sa-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="../super-admin/sa-rfa-entries.php" id="rfaLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click" data-bs-title="<strong>New Entries</strong>" data-bs-content="Assignment" data-bs-placement="bottom">RFA</a>
                    </li>
                    <li class="nav-items">
                        <a class="nav-link" href="../super-admin/sa-sena-records.php">Records</a>
                    </li>
                    <div class="mr-5"></div>
                    <li>
                        <a class="nav-link" href="../super-admin/sa-account.php">
                            <img src="../assets/User-register.svg" alt="Register" style="width: 20px; height: 20px; margin-right: 5px;">
                            My Account
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../super-admin/sa-login.php">
                            <img src="../assets/Sign_in_squre.svg" alt="Sign-in" style="width: 20px; height: 20px; margin-right: 5px;">
                            Log out
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Popover Content -->
            <div id="popoverContent" style="display: none;">
                <div class="popover-body">
                    Assignment
                </div>
            </div>
        </div>
    </nav>


    <div class="container" style="padding-top:10%">
        <h2 class="text-start" style="font-family: sub-font-bold; font-weight: bold">ASSIGNMENT</h2>

        <div class="container">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="font-weight:bold">Submitted date</td>
                        <td>2024-03-08</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Created by</td>
                        <td>Maria Clara Buenavista</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Received date</td>
                        <td>2024-03-09</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">SEADO assigned</td>
                        <td>admin-username</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="fw-bold text-end mt-5" style="font-family: Arial; color: black">Reference No.</h4>
        <h2 class="fw-bold text-end" style="font-family: Arial; color: black">SEAD RCMD-NCR-VAL-03-004-2024</h2>

        <hr class="my-4" style="border-top: 2px solid black;">

        <h3 class="fw-bold text-start mt-2 mb-3" style="font-family: Arial; color: black">Requesting Party</h3>

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
                    <td>Maria Clara Buenavista</td>
                    <td>Female</td>
                    <td>12 Karuhatan Road, Karuhatan,
                        Valenzuela City</td>
                    <td>0912 345 6789</td>
                    <td>2002-02-20</td>
                    <td>22</td>
                    <td>Department
                        Supervisor</td>
                </tr>
                <tr>
                    <td>John Mark Valenzuela</td>
                    <td>Male</td>
                    <td>34 Maysan Road, Maysan,
                        Valenzuela City</td>
                    <td>0912 564 1234</td>
                    <td>2011-05-15</td>
                    <td>13</td>
                    <td>Manager</td>
                </tr>
            </tbody>
        </table>

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
                    <td>ABC Company</td>
                    <td>-</td>
                    <td>56 Malinta Road, Malinta,
                        Valenzuela City</td>
                    <td>Manufacturing</td>
                    <td>0912 789 4567</td>
                    <td>Domingo
                        Fernandez</td>
                    <td>Human
                        Resource</td>
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
                    <td style="padding-bottom: 4%">Illegal Dismissal</td>
                    <td style="padding-bottom: 4%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                </tr>
                <tr>
                    <td>Money Claims</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5" style="padding-top: 5%; padding-bottom: 8%">Relief Prayed For</td>
                    <td style="padding-top: 5%">Payment of Money Claims<br>
                        Reinstatement<br>
                        Others: Remove from blacklisted</td>
                </tr>
            </tbody>
        </table>

        <div class="col-md-2 d-flex justify-content-center align-items-center">
            <a href="sa-assignment-take-action.php"> <button class="btn btn-dark fw-bold mb-5" style="font-size: 1rem; padding: 8px; border-radius: 50px">
                    TAKE ACTION
                </button></a>
        </div>
    </div>


    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>

</html>