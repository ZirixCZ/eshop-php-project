<?php
require_once 'Database.php';

class RoleModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function fetchAllRoles()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`Roles`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createRole($displayName, $isAdmin)
    {
        $sql = "INSERT INTO `db`.`Roles` (displayName, admin) VALUES (:displayName, :admin)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':displayName', $displayName);
        $stmt->bindParam(':admin', $isAdmin, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
