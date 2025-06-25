<?php 
include 'config.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        
        $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username or Email already exists. Please try again.');</script>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if (mysqli_query($conn, $insert_query)) {
                echo "<script>alert('Registration successful! You can now login.');</script>";
                header("Location: login.php");
                exit();
            } else {
                echo "<script>alert('Error: Could not register user. Please try again later.');</script>";
            }
        }
    } else {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    }
}



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Register</title>
</head>
<body>
    

<div class="register_login">
    <form action="" method="POST">
        <h2>Register</h2>
        <div class="input_field">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input_field">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input_field">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input_field">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        </div>
        <button  type="submit" name="submit">Register</button>
        <p>Already have an account? <a href="./login.php">Login</a></p>
    </form>
</div>




</body>
</html>