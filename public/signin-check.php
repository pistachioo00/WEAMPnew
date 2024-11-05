<?php

// Check if the user is already logged in
if (isset($_SESSION['accountID'])) {
    // Redirect the user to the dashboard page
    header('Location: ../user/home.php');
    exit;
}