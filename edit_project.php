<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

require 'db_connect.php';

// ID-г шалгах
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID буруу байна.");
}

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    // Prepared statement ашиглах (SQL injection-оос хамгаална)
    $stmt = $conn->prepare("UPDATE projects SET title = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $desc, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_dashboard.php");
    exit();
}

// Мэдээлэл авах
$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
?>

<form method="POST">
  <h2>Төсөл засах</h2>
  <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br>
  <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea><br>
  <button type="submit">Хадгалах</button>
</form>
