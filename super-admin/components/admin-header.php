<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
    <div class="message">
        <span>' . $message . '</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    ';
    }
}
?>

<header class="header">

    <a href="dashboard.php" class="logo">Admin<span>Panel</span></a>

    <!-- <div class="profile">
        <?php
        //$select_profile = $conn->prepare("SELECT * FROM `admin` WHERE adminID = ?");
        //$select_profile->execute([$adminID]);
        //$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
        
        <a href="update_profile.php" class="btn">update profile</a>
    </div> -->

    <nav class="navbar">
        <a href="../articles/article-dashboard.php"><i class="fas fa-home"></i> <span>home</span></a>
        <a href="../articles/add-post.php"><i class="fas fa-pen"></i> <span>add posts</span></a>
        <a href="../articles/view-post.php"><i class="fas fa-eye"></i> <span>view posts</span></a>
        <a href="../sa-account.php"><i class="fas fa-user"></i> <span>accounts</span></a>
        <a href="../super-admin/logout.php" style="color:var(--red);" onclick="return confirm('logout from the website?');"><i class="fas fa-right-from-bracket"></i><span>logout</span></a>
    </nav>

    <div class="flex-btn">
        <a href="admin_login.php" class="option-btn">login</a>
        <a href="register_admin.php" class="option-btn">register</a>
    </div>

</header>

<div id="menu-btn" class="fas fa-bars"></div>