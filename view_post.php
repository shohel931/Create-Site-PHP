<?php  
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'config.php';


$userStmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$userStmt->bind_param("s", $_SESSION['username']);
$userStmt->execute();
$user_id = $userStmt->get_result()->fetch_assoc()['id'];


$stmt = $conn->prepare(
    "SELECT title, content, created_at FROM posts 
    WHERE user_id = ? ORDER BY created_at DESC"
);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$post = $stmt->get_result();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>View Post</title>
</head>
<body>
    

<div class="container">
    <h2>Your Post</h2>
    <a href="create_post.php" class="btn"><i class="fa-solid fa-plus"></i> Create new</a> 
    <a href="dashboard.php" class="btn"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    <hr>
    <?php if($post->num_rows); ?>
     <?php while ($row = $post->fetch_assoc()): ?>
        <div class="post">
            <h5><i class="fa-solid fa-circle-user"></i> <a href="dashboard.php"><span><?php echo htmlspecialchars($_SESSION['username']); ?></span></a></h5>
            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
            <small><?php echo $row['created_at']; ?></small>
             <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
        </div>
        <?php endwhile; ?>
</div>
</body>
</html>