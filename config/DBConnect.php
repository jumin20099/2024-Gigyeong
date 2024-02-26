<?php
$host = 'localhost';
$dbname = 'skillscamp';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "<script>alert('어 실패야 : " . addslashes($e->getMessage()) . "')</script>";
}
?>