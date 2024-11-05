<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/posting.css">
</head>
<style>
.navbar .nav .nav-item .nav-link {
    color: white;
}

.rectangle {
    background-color: white;
    border: 2.5px solid #146fca;
}

.rectangle h4 {
    font-family: sub-font-bold;
    color: #304da5;
}

.rectangle h1 {
    margin-bottom: 0;
    padding-right: 35%;
    color: #465da3;
}
</style>

<body>
    <!-- Sidebar -->
    <div class="sidebar mt-5" style="background-color: #FFE5E5; border: 1.8px grey solid">
        <div class="container my-5">
            <h3 class="fs-7 text-center" style="font-family: sub-font-bold; padding-top:35%; color: #304DA5;">Dashboard
            </h3>
            <hr style="background-color: black;">
            <a href="#" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                SENA Assistance Desk
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="sa-user-management.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                User Management
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="sa-rfa-status.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                RFA Status
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../super-admin/articles/article-dashboard.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Articles
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="#" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Seminar
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../super-admin/sa-records.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Records Management
                <img src="../assets/user/Expand_right.svg" alt="expand_right">
            </a>
        </div>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #C80000;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 70px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                    <ul class="nav nav-underline navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="../super-admin/sa-home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="../super-admin/sa-dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../super-admin/sa-rfa-entries.php">RFA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../super-admin/sa-sena-records.php">Records</a>
                        </li>
                    </ul>
                </div>
                <a href="#">
                    <ul class="navbar-nav ml-auto">
                </a>
                <a class="nav-link" href="../super-admin/sa-account.php" style="color: white">
                    <img src="../assets/User/User.svg" alt="My-Account"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    My Account
                </a>
                <a class="nav-link" href="../logout.php" onclick="showLogoutConfirmation()" style="color: white">
                    <img src="../assets/User/Line1.svg" alt="Line"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    <img src="../assets/User/Sign_out_squre.svg" alt="Sign-out"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    Log Out
                </a>
                </ul>
                </a>
            </div>
        </nav>
        <br><br>


        <div class="seminar-container">

            <div class="row justify-content-left align-items-left">
                <div class="col-md-3">
                    <div class="searchbar-rec" style="color: #304DA5;">
                        <div class="label">Date</div>
                        <div class="input-with-icon">
                            <input type="text" class="form-control"
                                style="background-color: #F2F7FF; border: 1px solid grey; border-radius: 6px;">
                            <img src="../assets/blank-calendar--blank-calendar-date-day-month-empty.svg" class="icon"
                                alt="icon" style="width: 20px; height: 20px">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="searchbar-rec" style="color: #304DA5;">
                        <div class="label">Status</div>
                        <input type="text" class="form-control"
                            style="background-color: #F2F7FF; border: 1px solid grey; border-radius: 6px;">
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <div class="searchbar-rec">
                        <div class="label"></div>
                        <button class="btn btn-dark btn-block button fw-bold btn-hover"
                            style="font-family: Arial; height: 6%; font-size: .90rem; background-color:#465DA3;">SEARCH</button>
                    </div>
                </div>
            </div>
            <br><br><br>

            <h2>Records Management</h2>
            <table class="sem-table">
                <thead>
                    <tr>
                        <th>RFA</th>
                        <th>Participants</th>
                        <th>Registration Period</th>
                        <th>Session Times</th>
                        <th>Location</th>
                        <th>Facilitators</th>
                        <th>Session Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Row 1 -->
                    <tr>
                        <td class="sem-status sem-open">Open<br><small style="color: #555;">Seminar open</small></td>
                        <td>0 / 20</td>
                        <td>20 Oct 2024, 10:00 AM -<br>30 Oct 2024, 10:00 AM</td>
                        <td>1 Nov 2024, 9:00 AM -<br>12:00 PM</td>
                        <td class="sem-location">Worker's Affairs Office - Conference Room</td>
                        <td class="facilitator">Mr. Andrei John Camposano</td>
                        <td class="sem-ongoing">Upcoming</td>
                        <td class="sem-actions">
                            <a href="../articles/seminar-form.php" class="sem-button">Go to event</a>
                            <button class="button">...</button>
                        </td>
                    </tr>
                    <!-- Sample Row 2 -->
                    <tr>
                        <td class="sem-status status-closed">Closed<br><small style="color: #555;">Seminar
                                closed</small></td>
                        <td>10 / 10</td>
                        <td>5 Oct 2024, 10:00 AM -<br>10 Oct 2024, 10:00 AM</td>
                        <td>12 Oct 2024, 1:00 PM -<br>4:00 PM</td>
                        <td class="sem-location">Nabi Residence</td>
                        <td class="facilitator">Dr. Panot Developer</td>
                        <td class="sem-closed">Closed</td>
                        <td class="sem-actions">
                            <a href="../articles/seminar-form.php" class="sem-button">Go to event</a>
                            <button class="button">...</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>

            <!-- Export Options -->
            <div class="export-container">
                <span>Export attendance</span>
                <select>
                    <option>Format</option>
                    <option>CSV</option>
                    <option>Excel</option>
                </select>
                <button class="button">Export to file</button>
            </div>
        </div>

</body>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Select all sidebar menu items
    const menuItems = document.querySelectorAll(".menu-item");

    // Add click event listener to each menu item
    menuItems.forEach(item => {
        item.addEventListener("click", function() {
            // Remove 'active' class from all menu items
            menuItems.forEach(i => i.classList.remove("active"));

            // Add 'active' class to the clicked menu item
            item.classList.add("active");
        });
    });
});
</script>

</html>