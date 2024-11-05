<?php
session_start();

function checkLogin()
{
    if (!isset($_SESSION['accountID'])) {
        header("Location: ../public/login.php");

        exit();
    }

    if (isset($_SESSION['adminID'])) {
        header("Location: ../admin/home.php");
        exit();
    }
}
