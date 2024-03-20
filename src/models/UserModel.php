<?php
require_once 'Database.php';

class UserModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findUserByUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`User` WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function checkPassword($user, $password)
    {
        return password_verify($password, $user['password_hash']);
    }

    public function userExists($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`User` WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    public function registerUser($username, $password, $roles_id = 2)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO `db`.`User` (username, password_hash, Roles_id) VALUES (:username, :password_hash, :roles_id)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':roles_id', $roles_id);
        return $stmt->execute();
    }
}
?>