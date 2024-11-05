<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- CSS Style -->
    <link rel="stylesheet" href="../../css/posting.css">
</head>
<style>
    .navbar .nav .nav-item .nav-link {
        color: white;
    }
</style>

<body>
    <!-- Sidebar -->
    <div class="sidebar mt-5" style="background-color: #FFE5E5; border: 1.8px grey solid">
        <div class="container my-4">
            <h3 class="fs-7 text-center" style="font-family: sub-font-bold; padding-top:35%; color: #304DA5;">Article Posting</h3>
            <hr style="background-color: black;">
            <a href="article-dashboard.php" class="nav-link mt-3" style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
                Posts Dashboard
            </a>
            <a href="../articles/add-post.php" class="nav-link mt-3" style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                <img src="../../assets/posting-pen.svg" alt="posting_pen">
                Add posts
            </a>
            <a href="../articles/view-post.php" class="nav-link mt-3" style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                <img src="../../assets/view-eye.svg" alt="expand_right">
                View posts
            </a>
            <a href="../articles/seminar-dashboard.php" class="nav-link mt-3" style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                <img src="../../assets/seminars.svg" alt="expand_right">
                Seminars
            </a>
        </div>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #C80000;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 70px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                    <ul class="nav nav-underline navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="../sa-home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../sa-dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../sa-rfa-entries.php">RFA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../sa-sena-records.php">Records</a>
                        </li>
                    </ul>
                </div>
                <a href="#">
                    <ul class="navbar-nav ml-auto">
                </a>
                <a class="nav-link" href="../sa-account.php" style="color: white">
                    <img src="../../assets/User/User.svg" alt="My-Account"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    My Account
                </a>
                <a class="nav-link" href="../logout.php" onclick="showLogoutConfirmation()" style="color: white">
                    <img src="../../assets/User/Line1.svg" alt="Line"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    <img src="../../assets/User/Sign_out_squre.svg" alt="Sign-out"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    Log Out
                </a>
            </div>
        </nav>

        <section class="news-sec">
            <div class="container">
                <div class="row justify-content-center align-items-center"> <!-- Modified row class -->
                    <div class="col-12 text-center" style="margin-bottom: -10px; padding-top: 5px">
                        <h1 class="display-2 mb-2" style="font-family: main-font; font-size: 3.5rem; margin: 100px 0px -20px 0px; color: #1C05B3; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">WEMP</h1>
                        <p class="display-2 mb-0" style="font-family: Arial, sans serif; font-size: 1.3rem; margin-top: -5px; color: #3682CC">Workers and Employers Management Platform</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="seminar-form">
            <section class="assist-sec">
                <div class="container">
                    <h1 class="display-2 text-center" style="font-family: sub-font-bold; font-size: 1.5rem; padding-top: 2px; padding-bottom: 1%; color: #465DA3">REGISTER TO SEMINAR</h1>
                </div>
            </section>
            <h1>Seminar Details</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <form action="signup-process.php" method="POST" enctype="multipart/form-data" class="container col-md-5" style="font-family: 'form-font'">
                <!-- FULL NAME -->
                <div class="form-row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" id="fullName" name="fullName" style="background-color: #F0F2F5; border: none;" placeholder="Full Name" required>
                    </div>
                </div>
                <!-- EMAIL ADDRESS -->
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" style="background-color: #F0F2F5; border: none" placeholder="Email Address" required>
                </div>
                <!-- ADDRESS LINE 2: REGION, PROVINCE, CITY, BRGY -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <!-- Dropdown -->
                        <input type="text" class="form-control" id="region" name="region" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="Region" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="province" name="province" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="Province" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="city" name="city" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="City" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="barangay" name="barangay" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="Barangay" required>
                    </div>
                </div>
                <!-- ADDRESS LINE 1: UNIT/BLK/LOT/NO-->
                <div class="form-row">
                    <!-- Text Box -->
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" id="addressLine1" name="addressLine1" style="background-color: #F0F2F5; border: none" placeholder="Unit/No./Lot/Blk" required>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <!-- WORK POSITION -->
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="workPosition" name="workPosition" style="background-color: #F0F2F5; border: none" placeholder="Work Position" required>
                    </div>
                    <!-- YEARS OF SERVICE -->
                    <div class="col-md-6">
                        <input class="form-control mb-2" id="yearsOfService" name="yearsOfService" type="number" style="background-color: white; border-color: #465DA3; border-width: 1px;" placeholder="No. Year(s) of Service" min="1" required>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <!-- NATURE OF WORK -->
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-2" id="natureOfWork" name="natureOfWork" style="background-color: #F0F2F5; border: none" placeholder="Nature of Work" required>
                    </div>
                    <!-- EMPLOYMENT DATE -->
                    <div class="col-md-6">
                        <input type="text" class="form-control input-with-icon" id="employmentDate" name="employmentDate" style="background-color: #F0F2F5; border: none;" placeholder="Employment Date" required>
                    </div>
                </div>


                <div class="form-row" style="padding-top: 2%">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck" style="font-size: small">
                                    By clicking checkbox, you agree to our <a href="#" data-bs-toggle="modal" data-bs-target="#TermsCondition" style="font-size: small">Terms and Condition</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#PrivacyPolicy" style="font-size: small">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="form-row">
                    <div class="col text-center">
                        <button type="submit" class="btn" style="background-color: #007BFF; color: white; height: 100%; font-weight: bold" onmouseover="this.style.backgroundColor='#0E72DE';" onmouseout="this.style.backgroundColor='#007BFF';">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
</body>

</html>