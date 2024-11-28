<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "your_database_name");

// Check if form is submitted
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to find the admin by username
    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    // Check if admin exists
    if ($result && mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);

        // Verify the password (assuming passwords are stored in plain text)
        if($admin['password'] == $password) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];

            // Redirect to admin dashboard
            header("location: admin_dashboard.php");
            exit;
        } else {
            $error ="Invalid username or password";
        }
    }else {
        $error = "Invalid username or password";
    }
}
?>