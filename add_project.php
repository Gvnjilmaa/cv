<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    die("Энэ хуудас зөвхөн админд зориулагдсан!");
}
include 'db_project.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO projects (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        echo "Төсөл амжилттай нэмэгдлээ!";
    } else {
        echo "Алдаа гарлаа: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <title>Төсөл нэмэх</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Шинэ төсөл нэмэх</h2>
  <form method="post" action="">
    <input type="text" name="title" placeholder="Гарчиг" required>
    <textarea name="description" placeholder="Тайлбар" required></textarea>
    <button type="submit">Нэмэх</button>
</form>
</body>
</html>
