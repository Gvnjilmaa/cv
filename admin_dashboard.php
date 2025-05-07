<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <title>Админ - Төслүүд</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <main class="content">
    <h1>Төслүүдийн жагсаалт</h1>
    <a href="add_project.php">+ Шинэ төсөл нэмэх</a>
    <ul>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <li>
          <strong><?= $row['title'] ?></strong><br>
          <?= $row['description'] ?><br>
          <a href="edit_project.php?id=<?= $row['id'] ?>">Засах</a> |
          <a href="delete_project.php?id=<?= $row['id'] ?>" onclick="return confirm('Устгах уу?');">Устгах</a>
        </li>
      <?php } ?>
    </ul>
    <a href="logout.php">Гарах</a>
  </main>
</body>
</html>
