<?php
$host = 'localhost';
$db = 'cv';
$user = 'gvnjee';
$pass = '0727';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Холболт амжилтгүй: " . $conn->connect_error);
}
?>
