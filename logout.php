<?php
session_start();
session_unset(); // Сессийн өгөгдлийг устгах
session_destroy(); // Сессийг устгах
header("Location: login.php"); // Гарахын дараа login хуудас руу чиглүүлэх
exit();
?>
