<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <title>Админ Хяналтын Самбар</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <h2 style="text-align:center;">Админ Хяналтын Самбар</h2>
  </header>

  <main class="content">
    <p>Тавтай морилно уу, <?php echo $_SESSION['admin']; ?>!</p>
    <p>Та энд сайтаа удирдах, өөрчлөх боломжтой.</p>
    <a href="logout.php">Гарах</a>
  </main>
</body>
</html>
