<?php
class ProductModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getProduct($productId) {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`Product` WHERE id = :productId");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProducts($categoryId) {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`Product` WHERE Category_id = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

