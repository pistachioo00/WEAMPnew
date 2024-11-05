<?php
session_start();

function checkAdminLogin() {
    if (!isset($_SESSION['adminID'])) {
        header("Location: ../public/admin-login.php");
        exit();
    }
    if (isset($_SESSION['accountID'])) {
        header("Location: ../user/home.php");
        exit();
    }
}
?>
