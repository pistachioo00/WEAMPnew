<?php
// Include the database configuration file
require_once '../../public/config.php';

session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/bk_WEAMP/WEAMP/public/config.php';

// Check if adminID is set in the session
if (!isset($_SESSION['adminID'])) {
   echo "Admin ID is not set in session.";
   exit; // Stop further execution
}

$adminID = $_SESSION['adminID'];

// Save Post Logic
if (isset($_POST['save'])) {

   $postID = $_POST['postID'];
   $postTitle = filter_var($_POST['title'], FILTER_SANITIZE_STRING); // Field name is 'title' in the form
   $postContent = filter_var($_POST['content'], FILTER_SANITIZE_STRING); // Field name is 'content'
   $postLink = filter_var($_POST['link'], FILTER_SANITIZE_URL); // Field name is 'link'
   $postStatus = filter_var($_POST['postStatus'], FILTER_SANITIZE_STRING); // Field name is 'postStatus'

   // Update post content and status
   $update_post = $conn->prepare("UPDATE `posts` SET postTitle = ?, postContent = ?, postLink = ?, postStatus = ? WHERE postID = ?");
   $update_post->bind_param('ssssi', $postTitle, $postContent, $postLink, $postStatus, $postID);
   $update_post->execute();
   $update_post->close();  // Close the prepared statement after execution to avoid errors

   $message[] = 'Post updated!';

   // Handling image
   $old_postImage = $_POST['old_image']; // Changed to match the hidden field 'old_image'
   $postImage = $_FILES['image']['name']; // Changed to match 'image' in the form
   $postImage_tmp_name = $_FILES['image']['tmp_name'];
   $postImage_size = $_FILES['image']['size'];
   $allowed_exs = array("jpg", "jpeg", "png", "webp");
   $postImage_folder = '../../uploads/articleImages/' . $postImage;

   if (!empty($postImage)) {
      $postImage_ext = strtolower(pathinfo($postImage, PATHINFO_EXTENSION));

      if ($postImage_size > 5000000) {
         $message[] = 'Image size is too large!';
      } elseif (!in_array($postImage_ext, $allowed_exs)) {
         $message[] = 'Invalid image type!';
      } else {
         // Move the image and update the post
         move_uploaded_file($postImage_tmp_name, $postImage_folder);
         $update_postImage = $conn->prepare("UPDATE `posts` SET postImage = ? WHERE postID = ?");
         $update_postImage->bind_param('si', $postImage, $postID);
         $update_postImage->execute();
         $update_postImage->close();  // Close the prepared statement

         // Delete the old image if it's different
         if (!empty($old_postImage) && $old_postImage != $postImage) {
            unlink('../../uploads/articleImages/' . $old_postImage);
         }

         $message[] = 'Image updated!';
      }
   }
}

// Delete Post Logic
if (isset($_POST['delete_post'])) {
   // Sanitize the postID
   $postID = filter_var($_POST['postID'], FILTER_SANITIZE_STRING);

   // Prepare statement to fetch post details, including the image
   $delete_postImage = $conn->prepare("SELECT postImage FROM `posts` WHERE postID = ?");
   $delete_postImage->bind_param('i', $postID);
   $delete_postImage->execute();
   $result = $delete_postImage->get_result();
   $fetch_delete_postImage = $result->fetch_assoc();
   $delete_postImage->close(); // Close the prepared statement

   // If post has an image, delete it from the server
   if (!empty($fetch_delete_postImage['postImage'])) {
      $imagePath = '../../uploads/articleImages/' . $fetch_delete_postImage['postImage'];
      if (file_exists($imagePath)) {
         unlink($imagePath);  // Delete the image file
      }
   }

   // Delete the post from the database
   $delete_post = $conn->prepare("DELETE FROM `posts` WHERE postID = ?");
   $delete_post->bind_param('i', $postID);
   $delete_post->execute();
   $delete_post->close();  // Close the prepared statement

   // Success message
   $message[] = 'Post deleted successfully!';
}

// Delete Image Logic
if (isset($_POST['delete_image'])) {

   // Sanitize the postID
   $postID = filter_var($_POST['postID'], FILTER_SANITIZE_STRING);
   $empty_image = '';

   // Fetch the post to get the current image name
   $delete_postImage = $conn->prepare("SELECT postImage FROM `posts` WHERE postID = ?");
   $delete_postImage->bind_param('i', $postID);
   $delete_postImage->execute();
   $result = $delete_postImage->get_result();
   $fetch_delete_postImage = $result->fetch_assoc();
   $delete_postImage->close();  // Close the prepared statement

   // If the post has an image, delete it from the server
   if (!empty($fetch_delete_postImage['postImage'])) {
      $imagePath = '../../uploads/articleImages/' . $fetch_delete_postImage['postImage'];
      if (file_exists($imagePath)) {
         unlink($imagePath);  // Delete the image file
      }
   }

   // Update the database to set the postImage to an empty string
   $unset_postImage = $conn->prepare("UPDATE `posts` SET postImage = ? WHERE postID = ?");
   $unset_postImage->bind_param('si', $empty_image, $postID);
   $unset_postImage->execute();
   $unset_postImage->close();  // Close the prepared statement

   // Success message
   $message[] = 'Image deleted successfully!';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../css/posting.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

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

        <section class="post-editor">
            <h1 class="post-heading">Edit post</h1>

            <?php
         $postID = $_GET['postID'];

         // Use MySQLi syntax to prepare and execute the query
         $select_posts = $conn->prepare("SELECT * FROM posts WHERE postID = ?");
         $select_posts->bind_param('i', $postID);
         $select_posts->execute();
         $result = $select_posts->get_result();

         // Check if any posts were returned
         if ($result->num_rows > 0) {
            while ($fetch_posts = $result->fetch_assoc()) {

               if (isset($_POST['postID']) && !empty($_POST['postID'])) {
                  $postID = filter_var($_POST['postID'], FILTER_SANITIZE_NUMBER_INT);
               } else {
                  /* echo "Post ID is missing!"; */
               }

         ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_image" value="<?= htmlspecialchars($fetch_posts['postImage']); ?>">
                <input type="hidden" name="postID" value="<?= htmlspecialchars($fetch_posts['postID']); ?>">

                <p>Post status <span>*</span></p>
                <select name="postStatus" class="box-post" required>
                    <option value="<?= htmlspecialchars($fetch_posts['postStatus']); ?>" selected>
                        <?= htmlspecialchars($fetch_posts['postStatus']); ?></option>
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>

                <p>Post Title <span>*</span></p>
                <input type="text" name="title" maxlength="100" required placeholder="Add post title" class="box-post"
                    value="<?= htmlspecialchars($fetch_posts['postTitle']); ?>">

                <p>Post Content <span>*</span></p>
                <textarea name="content" class="box-post" required maxlength="20000" placeholder="Write your content..."
                    cols="30" rows="10"><?= htmlspecialchars($fetch_posts['postContent']); ?></textarea>

                <p>Post Link</p>
                <input type="url" name="link" class="box-post"
                    value="<?= htmlspecialchars($fetch_posts['postLink']); ?>">

                <p>Post Image</p>
                <input type="file" name="image" class="box-post" accept="image/jpg, image/jpeg, image/png, image/webp">

                <?php if (!empty($fetch_posts['postImage'])) { ?>
                <img src="../../uploads/articleImages/<?= htmlspecialchars($fetch_posts['postImage']); ?>" class="image"
                    alt="">
                <input type="submit" value="Delete Image" class="p-inline-delete-btn" name="delete_image">
                <?php } ?>

                <div class="flex-btn">
                    <input type="submit" value="Save Post" name="save" class="post-btn">
                    <a href="../articles/view-post.php" class="post-option-btn">Go back</a>
                    <input type="submit" value="Delete Post" class="p-delete-btn" name="delete_post">
                </div>
            </form>
            <?php
            }
         } else {
            echo '<p class="empty">No posts found!</p>';
         }
         ?>
        </section>
    </div>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const articleLink = document.getElementById('articleLink');
        const subMenu = document.querySelector('.sub-menu');

        // Check if we're on the article dashboard page
        if (window.location.href.includes("edit-post.php")) {
            subMenu.style.display = 'block'; // Automatically show the sub-menu
        }

        // Toggle sub-menu visibility when "Articles" link is clicked
        articleLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent navigation if desired
            subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
            window.location.href = "edit-post.php"; // Redirect to the Articles page
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