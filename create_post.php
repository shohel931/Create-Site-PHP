<?php  
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}


include 'config.php';



$userStmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$userStmt->bind_param("s", $_SESSION['username']);
$userStmt->execute();
$userResult = $userStmt->get_result()->fetch_assoc();
$user_id = $userResult['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);


    if ($title && $content) {
        $stmt = $conn->prepare(
            "INSERT INTO posts (user_id, title, content) VALUE(?, ?, ?)"
        );
        $stmt->bind_param("iss", $user_id, $title, $content);
        if ($stmt->execute()) {
            header("Location: view_post.php?msg=created");
            exit;
        } else{
            $error = "Could not create post. Try again.";
        }
    } else {
        $error = "Title and content are required.";
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
    <title>Create Post</title>
</head>
<body>
    

<div class="container">
    <h2>Create a New Post</h2>
    <div class="sub_container">
        
    <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Title" required><br><br>
        <textarea name="content" rows="10" cols="60" placeholder="Write here"  required ></textarea><br><br>
        <button type="submit" class="btn btnp">Publish</button>
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </form>
    </div>
</div>

</body>
</html>






















