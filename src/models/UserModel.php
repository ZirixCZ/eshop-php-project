<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function findUserByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`User` WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function checkPassword($user, $password) {
        return password_verify($password, $user['password_hash']);
    }
}
?>
