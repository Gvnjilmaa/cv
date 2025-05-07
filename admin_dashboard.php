<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    die("Энэ хуудас зөвхөн админд зориулагдсан!");
}
include 'db_project.php';

$result = $conn->query("SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <title>Админ - Төслүүд</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="content">
  <h2>Төслүүдийн жагсаалт</h2>
<a href="add_project.php">+ Төсөл нэмэх</a>
<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li>
        <strong><?= $row['title'] ?></strong> -
        <a href="edit_project.php?id=<?= $row['id'] ?>">Засах</a>
    </li>
<?php endwhile; ?>
</ul>
    <a href="logout.php">Гарах</a>
  </main>
</body>
</html>
