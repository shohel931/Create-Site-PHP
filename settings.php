<?php 





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Settings</title>
</head>
<body>
    
<div class="register_login">
    <h2><i class="fas fa-cog"></i> Settings</h2>
     <div class="sub_profile" style="margin: 20px 0;">
    <p class="padding_left" ><strong>Username:</strong> sohel</p>
    <p class="padding_left"><strong>Email:</strong> sohel123@gmail.com</p>
    </div>
    <div class="setting_links" style="margin-top: 20px;">
        <a href="edit_profile.php" class="btn"><i class="fas fa-user-edit"></i> Edit Profile</a>
        <a href="change_password.php" class="btn"><i class="fas fa-key"></i> Change Password</a>
        <a href="delete_account.php" class="btn" onclick="return confirm('Are you sure you want to delete your account?');"><i class="fas fa-user-times"></i> Delete Account</a>
        <a href="dashboard.php" class="btn"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
</div>


</body>
</html>