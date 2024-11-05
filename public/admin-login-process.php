<?php
require_once '../public/config.php';

session_start();

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
            
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['username'] = $username;
                header("Location: ../admin/home.php");
                $_SESSION['adminID'] = $row['adminID'];
                exit();
            } else {
                echo "<script>alert('Invalid username or password.');</script>";
                header("Location: ../public/admin-login.php");
            }
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
            header("Location: ../public/admin-login.php");
        }
        
        $sql->close();
    } else {
        echo "<script>alert('Please enter both username and password.');</script>";
        header("Location: ../public/admin-login.php");
    }
}

$conn->close();
?>
