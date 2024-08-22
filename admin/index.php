<?php
include '../includes/db.php';
include '../includes/functions.php';

$blogs = getBlogs($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Admin Panel</h1>
    <a href="add.php">Add New Blog</a>
    <div class="blogs">
        <?php foreach ($blogs as $blog) : ?>
            <div class="blog">
                <h2><?php echo $blog['title']; ?></h2>
                <a href="edit.php?id=<?php echo $blog['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $blog['id']; ?>">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>