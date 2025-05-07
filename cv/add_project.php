<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $desc = htmlspecialchars($_POST['description']);

    $stmt = $conn->prepare("INSERT INTO projects (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $desc);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <title>Төсөл нэмэх</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 40px;
    }

    form {
      max-width: 500px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input, textarea, button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      background-color: #4CAF50;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<form method="POST">
  <h2>Төсөл нэмэх</h2>
  <input type="text" name="title" placeholder="Гарчиг" required>
  <textarea name="description" placeholder="Тайлбар" rows="5" required></textarea>
  <button type="submit">Нэмэх</button>
</form>

</body>
</html>
