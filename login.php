<?php
session_start();

$correctUsername = "admin";
$correctPassword = "1111";

// Хэрэв POST хүсэлт ирсэн бол нэвтрэх нэр болон нууц үгийг шалгах
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION['admin'] = $username; // Сессийг хадгалах
        header("Location: admin_dashboard.php"); // Админ хуудас руу шилжих
        exit();
    } else {
        $errorMessage = "Нэвтрэх нэр эсвэл нууц үг буруу байна!";
    }
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нэвтрэх</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Нүүр</a></li>
                <li><a href="about.html">Миний тухай</a></li>
                <li><a href="portfolio.html">Төслүүд</a></li>
                <li><a href="contact.html">Холбоо барих</a></li>
                <li><a href="login.php" class="active">Нэвтрэх</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="content">
            <h1>Админ нэвтрэх</h1>
            <!-- Нэвтрэх хэсэг -->
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Нэвтрэх нэр" required>
                <input type="password" name="password" placeholder="Нууц үг" required>
                <button type="submit">Нэвтрэх</button>
            </form> 
            <?php
            if (isset($errorMessage)) {
                echo "<p style='color: red;'>$errorMessage</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Миний вэб. Бүх эрх хуулиар хамгаалагдсан.</p>
    </footer>
</body>
</html>
