<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    die("Энэ хуудас зөвхөн админд зориулагдсан!");
}
include 'db_project.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM projects WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $project = $stmt->get_result()->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE projects SET title=?, description=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $description, $id);
    if ($stmt->execute()) {
        echo "Төсөл амжилттай засагдлаа!";
    } else {
        echo "Алдаа гарлаа: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <title>Төсөл засах</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Төсөл засах</h2>
  <form method="post" action="">
    <input type="hidden" name="id" value="<?= $project['id'] ?>">
    <input type="text" name="title" value="<?= $project['title'] ?>" required>
    <textarea name="description" required><?= $project['description'] ?></textarea>
    <button type="submit">Засах</button>
</form>
</body>
</html>
