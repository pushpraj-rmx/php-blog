<?php
include '../includes/db.php';
include '../includes/functions.php';

$id = $_GET['id'];
$blog = getBlog($conn, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE blogs SET title = ?, content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            license_key: 'gpl',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>
</head>

<body>
    <h1>Edit Blog</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $blog['title']; ?>" required><br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="10" required><?php echo $blog['content']; ?></textarea><br>
        <input type="submit" value="Update Blog">
    </form>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template paste textpattern imagetools codesample toc help',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>
</body>

</html>