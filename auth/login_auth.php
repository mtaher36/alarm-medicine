<?php
session_start();
include "../koneksi.php";

// Check if the user clicked the login button
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // MD5 password for security

    // Query to get user data from database
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    // Check if the query returns a row
    if (mysqli_num_rows($result) == 1) {
        // Save user data to session
        $data = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $data['email'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['is_login'] = true; // Set session login to true


        // Redirect to dashboard page
        header('Location: ../dashboard.php');
    } else {
        // If the query returns no row, set error message and redirect back to login page
        $_SESSION['error'] = "Invalid email or password";
        header('Location: ../login.php');
    }
}
