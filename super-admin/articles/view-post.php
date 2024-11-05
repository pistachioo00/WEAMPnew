<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bk_WEAMP/WEAMP/public/config.php';

session_start();

$adminID = $_SESSION['adminID'];

if (!isset($adminID)) {
   header('location:../super-admin/sa-home.php');
}


if (isset($_POST['delete'])) {
   // Ensure the correct POST key is used, matching your form input
   $postID = $_POST['post_id'];

   // Sanitize postID properly (since it should be an integer)
   $postID = filter_var($postID, FILTER_SANITIZE_NUMBER_INT);

   if ($postID) {
      // Select the postImage for deletion
      $delete_postImage = $conn->prepare("SELECT postImage FROM `posts` WHERE postID = ?");
      if ($delete_postImage === false) {
         die('Prepare failed: ' . htmlspecialchars($conn->error));
      }

      $delete_postImage->bind_param('i', $postID);
      $delete_postImage->execute();

      $result = $delete_postImage->get_result();
      $fetch_delete_postImage = $result->fetch_assoc();

      if ($fetch_delete_postImage && !empty($fetch_delete_postImage['postImage'])) {
         $postImage_path = '../../uploads/articleImages/' . $fetch_delete_postImage['postImage'];

         // Check if the file exists and delete it
         if (file_exists($postImage_path)) {
            if (!unlink($postImage_path)) {
               die('Error deleting the image: ' . $postImage_path);
            }
         }
      }

      $delete_postImage->close();

      // Proceed with deleting the post itself
      $delete_post = $conn->prepare("DELETE FROM `posts` WHERE postID = ?");
      if ($delete_post === false) {
         die('Prepare failed: ' . htmlspecialchars($conn->error));
      }

      $delete_post->bind_param('i', $postID);
      $delete_post->execute();

      if ($delete_post->affected_rows > 0) {
         $message[] = 'Post deleted successfully!';
      } else {
         $message[] = 'Post deletion failed!';
      }

      $delete_post->close();
   } else {
      $message[] = 'Invalid post ID.';
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Articles</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/posting.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />



</head>
<style>
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
            <h3 class="fs-7 text-center" style="font-family: sub-font-bold; padding-top:20%; color: #304DA5;">Dashboard
            </h3>
            <hr style="background-color: black;">
            <a href="#" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                SENA Assistance Desk
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../sa-user-management.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                User Management
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../sa-rfa-status.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                RFA Status
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
            <a href="../articles/article-dashboard.php" class="nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%"
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
            <a href="../sa-records.php" class=" nav-link mt-3"
                style="font-size: 1rem; font-family: sub-font; color: #304DA5; padding: left 35%">
                Records Management
                <img src="../../assets/user/Expand_right.svg" alt="expand_right">
            </a>
        </div>
    </div>


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

        <br><br>
        <!-- Article Posts -->
        <h1 class="post-heading">Article posts</h1>
        <div class="table-wrapper">
            <table class="posts-table">
                <thead>
                    <tr>
                        <th>Article Image</th>
                        <th>Article Title</th>
                        <th>Article Status</th>
                        <th>Article Content</th>
                        <th>Article Creation Date</th>
                        <th>Article Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
               // Selecting posts based on adminID
               $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE adminID = ?");
               $select_posts->bind_param('i', $adminID);
               $select_posts->execute();
               $result = $select_posts->get_result();

               // Check if there are posts available
               if ($result->num_rows > 0) {
                  while ($fetch_posts = $result->fetch_assoc()) {
                     $postID = $fetch_posts['postID'];
                     $postImage = htmlspecialchars($fetch_posts['postImage']);
                     $postTitle = htmlspecialchars($fetch_posts['postTitle']);
                     $postContent = htmlspecialchars($fetch_posts['postContent']);
                     $postLink = htmlspecialchars($fetch_posts['postLink']);
                     $postStatus = htmlspecialchars($fetch_posts['postStatus']);
                     $postDate = htmlspecialchars($fetch_posts['postDate']);
               ?>
                    <tr>
                        <!-- Display the post image -->
                        <td>
                            <?php if (!empty($postImage)) { ?>
                            <img src="../../uploads/articleImages/<?= $postImage; ?>" class="post-image"
                                alt="Post Image" style="width:75px;height:75px;object-fit:cover;">
                            <?php } ?>
                        </td>

                        <!-- Display the post title -->
                        <td><?= $postTitle; ?></td>

                        <!-- Display the post status with color coding -->
                        <td>
                            <span class="post-status"
                                style="background-color:<?= ($postStatus == 'Publish') ? 'rgb(15, 134, 15)' : 'coral'; ?>;">
                                <?= $fetch_posts['postStatus']; ?>
                            </span>
                        </td>

                        <!-- Display the post content -->
                        <td class="post-content"><?= $postContent; ?></td>

                        <!-- Display the creation date -->
                        <td><?= $postDate; ?></td>

                        <!-- Action buttons -->
                        <td>
                            <a href="../articles/edit-post.php?postID=<?= $postID; ?>" class="post-option-btn">Edit</a>
                            <button type="submit" name="delete" class="p-delete-btn"
                                onclick="return confirm('Delete this post?');">Delete</button>
                            <a href="../articles/read-post.php?postID=<?= $postID; ?>" class="post-btn">View</a>
                        </td>
                    </tr>
                    <?php
                  }
               } else {
                  echo '<p class="empty">No posts added yet! <a href="../articles/add-post.php" class="post-btn">Add post</a></p>';
               }
               ?>
                </tbody>
            </table>
        </div>

        <!-- custom js file link  -->
        <script src="../js/super-admin.js"></script>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const articleLink = document.getElementById('articleLink');
            const subMenu = document.querySelector('.sub-menu');

            // Check if we're on the article dashboard page
            if (window.location.href.includes("view-post.php")) {
                subMenu.style.display = 'block'; // Automatically show the sub-menu
            }

            // Toggle sub-menu visibility when "Articles" link is clicked
            articleLink.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent navigation if desired
                subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
                window.location.href = "view-post.php"; // Redirect to the Articles page
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