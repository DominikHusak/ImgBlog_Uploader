<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_blog'])) {
    $blogText = $_POST['blog_text'];
    $messageFile = fopen("messages/blog", "a");
    fwrite($messageFile, $blogText . "\n");
    fclose($messageFile);
    header("Location: index.php");
    exit;
}
?>