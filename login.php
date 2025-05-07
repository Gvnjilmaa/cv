<?php
session_start();
include 'db_project.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: admin_dashboard/index.php");
        exit();
    } else {
        echo "Нэвтрэх нэр эсвэл нууц үг буруу!";
    }
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8">
  <title>Нэвтрэх</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Нэвтрэх</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="post" action="">
    <input type="text" name="username" placeholder="Хэрэглэгчийн нэр" required>
    <input type="password" name="password" placeholder="Нууц үг" required>
    <button type="submit">Нэвтрэх</button>
</form>
</body>
</html>
