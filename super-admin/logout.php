<?php

include '../public/config.php';

session_start();
session_destroy();

header("Location: ../super-admin/sa-login.php");
exit();

?>
