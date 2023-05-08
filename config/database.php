<?php
$host = 'localhost';
$user = 'root';
$pass = 'p';
$dbname = 'login_dynamic_navbar';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}
?>