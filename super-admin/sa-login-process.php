<?php
require_once '../public/config.php';

session_start();

/* //Enable report for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($username) && !empty($password)) {
        // Prepare the SQL statement to prevent SQL injection
        $sql = $conn->prepare("SELECT adminID, password FROM admin WHERE username = ?");
        if ($sql === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $sql->bind_param("s", $username);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                // Check if the adminID is 1
                if ($row['adminID'] == 10) {
                    $_SESSION['username'] = $username;
                    $_SESSION['adminID'] = $row['adminID'];
                    // Redirect to sa-home.php
                    header("Location: ../super-admin/sa-home.php");
                    exit();
                } else {
                    // Redirect to login if not adminID 1
                    echo "<script>alert('Access denied. Only adminID 1 can log in.');
                    window.location.href = '../super-admin/sa-login.php';</script>";
                }
            } else {
                echo
                "<script>alert('Invalid username or password.');
                window.location.href = '../super-admin/sa-login.php';</script>";
            }
        } else {
            echo
            "<script>alert('Invalid username or password.');
            window.location.href = '../super-admin/sa-login.php';</script>";
        }

        $sql->close();
    } else {
        echo
        "<script>alert('Please enter both username and password.');
        window.location.href = '../super-admin/sa-login.php';</script>";
    }
}

$conn->close();
?>