<?php
$host = '127.0.0.1';
$port = '3306';
$dbname = 'db';
$username = 'user';
$password = 'password';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>

