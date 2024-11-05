<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bk_WEAMP/WEAMP/public/config.php';

session_start();

$adminID = $_SESSION['adminID'];

if (!isset($adminID)) {
    header('location:sa-home.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- CSS Style -->
    <link rel="stylesheet" href="../../css/posting.css">
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

.nav-link:hover {
    color: #00008b;
    /* Darker color on hover */
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
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding-left: 3%">
                SENA Assistance Desk
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../sa-user-management.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding-left: 3%">
                User Management
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../sa-rfa-status.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding-left: 3%">
                RFA Status
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../articles/article-dashboard.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding-left: 3%"
                onclick="toggleSubMenu(event)">
                Articles
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <div class="sub-menu">
                <div class="sub-menu-item">
                    <a href="../articles/add-post.php">&nbsp;&nbsp;Add Article</a>
                    <a href=" ../articles/view-post.php">&nbsp;&nbsp;View Article</a>
                </div>
            </div>
            <!-- <a href=" ../articles/article-dashboard.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Seminar
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a> -->
            <a href="../sa-records.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Records Management
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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

        <section class="post-dashboard">
            <h1 class="post-heading" style="padding-top:4%;">Articles Dashboard</h1>
            <div class="box-container">
                <!-- Box for Total Posts -->
                <div class="box-post">
                    <?php
                    $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE adminID = ?");
                    $select_posts->bind_param('i', $adminID);  // 'i' for integer
                    $select_posts->execute();
                    $select_posts->store_result();  // Needed to use num_rows
                    $numbers_of_posts = $select_posts->num_rows;  // Count the number of posts
                    ?>
                    <h3><?= $numbers_of_posts; ?></h3>
                    <p>Posts added</p>
                    <a href="../articles/add-post.php" class="post-btn">Add new post</a>
                </div>

                <!-- Box for Published Posts -->
                <div class="box-post">
                    <?php
                    $select_publish_posts = $conn->prepare("SELECT * FROM `posts` WHERE adminID = ? AND postStatus = ?");
                    $postStatus = 'Publish';  // Set status to 'Publish'
                    $select_publish_posts->bind_param('is', $adminID, $postStatus);  // 'i' for integer, 's' for string
                    $select_publish_posts->execute();
                    $select_publish_posts->store_result();  // Store result to use num_rows 
                    $numbers_of_publish_posts = $select_publish_posts->num_rows;  // Count active posts
                    ?>
                    <h3><?= $numbers_of_publish_posts; ?></h3>
                    <p>Published posts</p>
                    <a href="../articles/view-post.php" class="post-btn">See Posts</a>
                </div>

                <!-- Box for Draft Posts -->
                <div class="box-post">
                    <?php
                    $select_draft_posts = $conn->prepare("SELECT * FROM `posts` WHERE adminID = ? AND postStatus = ?");
                    $postStatus = 'Draft';  // Set status to 'Draft'
                    $select_draft_posts->bind_param('is', $adminID, $postStatus);  // 'i' for integer, 's' for string
                    $select_draft_posts->execute();
                    $select_draft_posts->store_result();  // Store result to use num_rows
                    $numbers_of_draft_posts = $select_draft_posts->num_rows;  // Count draft posts
                    ?>
                    <h3><?= $numbers_of_draft_posts; ?></h3>
                    <p>Draft posts</p>
                    <a href="../articles/view-post.php" class="post-btn">See Posts</a>
                </div>
            </div>
        </section>
    </div>


    <!-- custom js file link  -->
    <script src="../js/super-admin.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const articleLink = document.getElementById('articleLink');
        const subMenu = document.querySelector('.sub-menu');

        // Check if we're on the article dashboard page
        if (window.location.href.includes("article-dashboard.php")) {
            subMenu.style.display = 'block'; // Automatically show the sub-menu
        }

        // Toggle sub-menu visibility when "Articles" link is clicked
        articleLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent navigation if desired
            subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
            window.location.href = "article-dashboard.php"; // Redirect to the Articles page
        });

        // Hide the sub-menu when clicking on other sidebar links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                if (this !== articleLink) {
                    subMenu.style.display = 'none'; // Hide sub-menu
                }
            });
        });
    });
    </script>
</body>

</html>