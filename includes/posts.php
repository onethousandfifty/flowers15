<?php
session_start();

// Path to the JSON file
$jsonFile = __DIR__ . '/../posts.json';

// Function to read posts
function getPosts() {
    global $jsonFile;
    if (file_exists($jsonFile)) {
        $json = file_get_contents($jsonFile);
        return json_decode($json, true)['posts'];
    }
    return [];
}

// Function to save posts
function savePosts($posts) {
    global $jsonFile;
    $json = json_encode(['posts' => $posts], JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $json);
}

// Handle post creation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"])) {
    $content = trim($_POST["content"]);
    
    if (!empty($content)) {
        $posts = getPosts();
        $newPost = [
            'id' => time(), // Use timestamp as ID
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        ];
        array_unshift($posts, $newPost); // Add new post at the beginning
        savePosts($posts);
        header("location: ../admin/index.php");
        exit;
    }
}

// Handle post deletion
if (isset($_GET["delete"]) && is_numeric($_GET["delete"])) {
    $id = $_GET["delete"];
    $posts = getPosts();
    $posts = array_filter($posts, function($post) use ($id) {
        return $post['id'] != $id;
    });
    savePosts(array_values($posts)); // Reindex array
    header("location: ../admin/index.php");
    exit;
}
?> 