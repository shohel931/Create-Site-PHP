<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include './config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Dashboard</title>
</head>
<body>
    


<div class="main_dashboard">
  <div class="sub_dashboard_a">
    <div class="sidebar">
        <div class="title_dashboard">
            <h2><i class="fas fa-tachometer-alt"></i> Dashboard</h2>
        </div>
      <ul>
        <li><a href="dashboard.php"><span><i class="fas fa-home"></i></span> Home</a></li>
        <li><a href="profile.php"><span><i class="fas fa-user"></i></span> Profile</a></li>
        <li><a href="settings.php"><span><i class="fas fa-cog"></i></span> Settings</a></li>
        <li><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Logout</a></li>
      </ul>
    </div>
  </div>


  <div class="sub_dashboard_b">
    <div class="dashboard_header">
      <h1>Dashboard</h1>
      <div class="user_info">
        <h5> Welcome, <i class="fa-solid fa-circle-user"></i> <span><?php echo htmlspecialchars($_SESSION['username']); ?></span></h5>
      </div>
    </div>
  <div class="dashboard_cards">
            <div class="card">
                <h3><i class="fa-solid fa-circle-plus"></i> Create Post</h3>
                <p>Create post and shear your profile . Manage your post.</p>
                <a href="create_post.php" class="btn">Create a Post</a>
            </div>
            <div class="card">
                <h3><i class="fa-solid fa-eye"></i> View Post</h3>
                <p>View and update your post  information.</p>
                <a href="view_post.php" class="btn">View Post</a>
            </div>
            <div class="card">
                <h3><i class="fas fa-user"></i> Profile</h3>
                <p>View and update your personal profile information.</p>
                <a href="profile.php" class="btn">Go to Profile</a>
            </div>
            <div class="card">
                <h3><i class="fas fa-cog"></i> Settings</h3>
                <p>Manage your account settings and preferences.</p>
                <a href="settings.php" class="btn">Open Settings</a>
            </div>
            <div class="card">
                <h3><i class="fas fa-sign-out-alt"></i> Logout</h3>
                <p>Click below to safely log out from your account.</p>
                <a href="logout.php" class="btn">Logout</a>
            </div>
        </div>
  </div>
</div>
</div>
</div>  




</body>
</html>