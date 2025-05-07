<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // XAMPP default
$db = 'cv'; // ← таны хэрэглэж буй өгөгдлийн сангийн нэр

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Холболт амжилтгүй: " . $conn->connect_error);
}
?>