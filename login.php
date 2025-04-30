<?php
session_start();

$correctUsername = "admin";
$correctPassword = "1111";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $correctUsername && $password === $correctPassword) {
    $_SESSION['admin'] = $username;
    header("Location: admin/dashboard.php");
    exit();
} else {
    echo "<script>alert('Нэвтрэх нэр эсвэл нууц үг буруу байна!'); window.location.href='login.html';</script>";
}
?>
