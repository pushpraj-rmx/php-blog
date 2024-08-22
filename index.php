<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/db.php';
include 'includes/functions.php';

$blogs = getBlogs($conn);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Blog Management System</h1>
    <a href="admin/">Admin Panel</a>
    <div class="blogs">
        <?php foreach ($blogs as $blog) : ?>
            <div class="blog">
                <h2><?php echo $blog['title']; ?></h2>
                <p><?php echo nl2br($blog['content']); ?></p>
                <small>Posted on <?php echo $blog['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>