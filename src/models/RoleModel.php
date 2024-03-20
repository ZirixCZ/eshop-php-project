<?php

class RoleModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchAllRoles() {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`Roles`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
