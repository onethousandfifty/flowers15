<?php
session_start();
require_once "../includes/posts.php";

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Handle post creation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"])) {
    $content = trim($_POST["content"]);
    
    if (!empty($content)) {
        $sql = "INSERT INTO posts (content) VALUES (?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $content);
            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit;
            } else {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
}

// Handle post deletion
if (isset($_GET["delete"]) && is_numeric($_GET["delete"])) {
    $id = $_GET["delete"];
    $sql = "DELETE FROM posts WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        header("location: index.php");
        exit;
    }
}

// Fetch all posts
$posts = getPosts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Flowers 15</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .post-form {
            margin-bottom: 30px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .post {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .post:last-child {
            border-bottom: none;
        }
        .post-content {
            margin-bottom: 10px;
        }
        .post-meta {
            color: #666;
            font-size: 0.9em;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .delete-btn:hover {
            background-color: #da190b;
        }
        .logout-btn {
            background-color: #666;
        }
        .logout-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <a href="logout.php"><button class="logout-btn">Logout</button></a>
        </div>

        <div class="post-form">
            <h2>Create New Post</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <textarea name="content" rows="4" maxlength="140" placeholder="What's happening? (140 characters max)" required></textarea>
                <button type="submit">Post</button>
            </form>
        </div>

        <div class="posts">
            <h2>Recent Posts</h2>
            <?php foreach ($posts as $post): ?>
                <div class="post">
                    <div class="post-content"><?php echo htmlspecialchars($post["content"]); ?></div>
                    <div class="post-meta">
                        Posted on <?php echo date('F j, Y, g:i a', strtotime($post["created_at"])); ?>
                        <a href="?delete=<?php echo $post["id"]; ?>" onclick="return confirm('Are you sure you want to delete this post?')">
                            <button class="delete-btn">Delete</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html> 