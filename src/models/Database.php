<?php

class Database
{
    private static $pdo = null;

    public static function connect()
    {
        if (self::$pdo === null) {
            $host = '127.0.0.1';
            $port = '3306';
            $dbname = 'db';
            $username = 'user';
            $password = 'password';

            $dsn = "mysql:host=$host;port=$port;dbname=$dbname";

            try {
                self::$pdo = new PDO($dsn, $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit;
            }
        }
        return self::$pdo;
    }
}
