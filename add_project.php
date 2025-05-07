<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $conn->query("INSERT INTO projects (title, description) VALUES ('$title', '$desc')");
    header("Location: admin_dashboard.php");
    exit();
}
?>

<form method="POST">
  <h2>Төсөл нэмэх</h2>
  <input type="text" name="title" placeholder="Гарчиг" required><br>
  <textarea name="description" placeholder="Тайлбар" required></textarea><br>
  <button type="submit">Нэмэх</button>
</form>
