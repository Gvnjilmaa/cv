<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Хэрвээ админ биш бол нэвтрэх хэсэг рүү шилжих
    exit();
}

require 'db_connect.php';

// ID-г шалгах
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Бэлтгэсэн мэдэгдэл ашиглах нь аюулгүй
    $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: admin_dashboard.php");
exit();
?>
