<?php
session_start();

// Нэвтрэх нэр, нууц үг шалгах
$correctUsername = "admin";
$correctPassword = "1111";

// POST шалгах
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Хэрэглэгчийн мэдээлэл зөв бол сесс үүсгэх
    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // alert-г аль болох зайлсхийх, учир нь UX муу болгодог
        $_SESSION['login_error'] = "Нэвтрэх нэр эсвэл нууц үг буруу байна!";
        header("Location: login.html");
        exit();
    }
} else {
    header("Location: login.html");
    exit();
}
