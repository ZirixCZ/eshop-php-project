<?php
require_once 'Database.php';

class ProductModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function getProduct($productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`Product` WHERE id = :productId");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProducts($categoryId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `db`.`Product` WHERE Category_id = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $price, $desc, $categoryId)
    {
        $sql = "INSERT INTO `db`.`Product` (product_name, product_price, product_desc, Category_id) VALUES (:name, :price, :desc, :category_id)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':category_id', $categoryId);

        return $stmt->execute();
    }
}
?>