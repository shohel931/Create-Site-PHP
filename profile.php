<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Profile</title>
</head>
<body>

<div class="profile_container">
    <h2>👤 Profile</h2>
    <div class="sub_profile">
        <p><strong>Username:</strong>  <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Join Date:</strong> <?php echo date('d M Y', strtotime($user['created_at'])); ?></p>
    </div>
    <div class="actions">
        <a class="btn" href="edit_profile.php">✏️ Edit Profile</a> 
        <a class="btn" href="change_password.php">🔒 Change Password</a> <br>
        <a class="btn" href="dashboard.php">🏠 Back to Dashboard</a>
    </div>
</div>

</body>
</html>
