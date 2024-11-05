<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="../css/styles.css">

    <style>
        .form-group {
            position: relative;
        }

        .field-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#C80000;">
        <div class="container">
            <a class="navbar-brand" href="../public/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 d-flex flex-column align-items-center">
            <img src="../assets/forgot-pw.svg" alt="Descriptive Alt Text" style="width: 200px; height: auto; margin-bottom: 20px;">

            <h2 class="text-center" style="font-weight: bold; font-family: 'arimo-bold'">Forgot Password</h2>
            <p class="text-center" style="font-weight: medium; font-family: 'arimo-reg'; margin-bottom: 40px">
                Enter your email and we'll send you a link to reset your password.
            </p>

            <form action="login.php" method="post" class="login-form">
                <div class="form-group position-relative" style="width: 450px;">
                    <input type="text" class="form-control" placeholder="Email Address"
                        style="background-color: #F0F2F5; border: none; padding-left: 40px; width: 100%; height: 45px;" required>
                    <img src="../assets/mail-24.svg" alt="Icon"
                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px;">
                </div>
                <div style="padding-top:1%"></div>
                <a href="email-process.php" class="btn btn-primary btn-block"
                    style="background-color: #42B72A; color: white; font-family: Arial; padding: 9px; width: 450px; font-weight: bold">
                    Submit
                </a>
            </form>

            <a href="../public/login.php" style="text-decoration: none; display: flex; align-items: center; padding-top: 5%">
                <img src="../assets/left.svg" alt="back" style="width: 16px; height: 16px; margin-right: 10px;">
                <span style="text-decoration: none; color: #565656; font-size: 13px">Back to login</span>
            </a>
        </div>
    </div>

    <footer class="footer fixed-bottom">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>