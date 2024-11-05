<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
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
        <section class="news-sec" style="padding-top:1%">
            <div class="container">
                <a href="../public/home.php" class="mt-5 d-flex justify-content-start">
                    <img src="../assets/Expand_left.svg" alt="Back-Button" style="width: 3rem; height: 3rem;">
                </a>
                <div class="row justify-content-center align-items-center"> <!-- Modified row class -->
                    <img src="../assets/admin-logo.svg" alt="Logo" style="width: 350px; height: 200px;">
                    <div class="col-12 text-center" style="margin-bottom: -10px;">
                        <h1 class="display-2 mb-1"
                            style="color: black; font-family: main-font; font-size: 3.5rem; margin-bottom: -4px;">WEMP
                        </h1>
                        <p class="display-2 mb-0"
                            style="font-family: Arial, sans serif; font-size: 1.3rem; margin-top: -4px;">Workers and
                            Employers Management Platform</p>
                    </div>

                </div>
            </div>
        </section>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form action="admin-login-process.php" method="POST" class="login-form">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username"
                                    style="background-color: #E5EEFF; border-left: none;" id="username" name="username" required>
                                <img src="../assets/User.svg" alt="User Icon" class="field-icon">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password"
                                    style="background-color: #E5EEFF; border-left: none;" id="password" name="password" required>
                                <img src="../assets/View_alt.svg" alt="Password Icon" class="field-icon">
                            </div>

                            <button type="submit" style="background-color: black; color: white; font-family: Arial; padding: 2%" class="btn btn-primary btn-block"> Sign in</button>

                        <div class="form-group mb-3">
                            <a href="../admin/admin-forgot-password.php" style="color:black; font-style: italic"
                                class="btn btn-link float-left">Forgot Password?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>