<?php
session_start();
require 'db_connect.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $conn->query("UPDATE projects SET title='$title', description='$desc' WHERE id=$id");
    header("Location: admin_dashboard.php");
    exit();
}

$result = $conn->query("SELECT * FROM projects WHERE id=$id");
$row = $result->fetch_assoc();
?>

<form method="POST">
  <h2>Төсөл засах</h2>
  <input type="text" name="title" value="<?= $row['title'] ?>" required><br>
  <textarea name="description" required><?= $row['description'] ?></textarea><br>
  <button type="submit">Хадгалах</button>
</form>
