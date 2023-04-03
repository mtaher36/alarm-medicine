<?php
include "../koneksi.php";

// Check if the user clicked the register button
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // MD5 password for security

    // Query to insert user data to database
    $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($koneksi, $query);

    // Check if the query successfully inserted data to database
    if ($result) {
        // Redirect to login page
        header('Location: ../login.php');
    } else {
        // If the query fails, set error message and redirect back to register page
        $_SESSION['error'] = "Registration failed. Please try again.";
        header('Location: ../register.php');
    }
}
