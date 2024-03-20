<?php
require '../../db.php'; 

function fetchCategories($pdo, $parentId = null) {
    $stmt = $pdo->prepare("SELECT * FROM `db`.`Category` WHERE Category_id IS :parentId");
    $stmt->bindParam(':parentId', $parentId, $parentId ? PDO::PARAM_INT : PDO::PARAM_NULL);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchProducts($pdo, $categoryId) {
    $stmt = $pdo->prepare("SELECT * FROM `db`.`Product` WHERE Category_id = :categoryId");
    $stmt->bindParam(':categoryId', $categoryId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function displayCategories($pdo, $parentId = null) {
    $categories = fetchCategories($pdo, $parentId);
    if ($categories) {
        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li>' . htmlspecialchars($category['category_name']);
            displayCategories($pdo, $category['id']);
            $products = fetchProducts($pdo, $category['id']);
            if ($products) {
                echo '<ul>';
                foreach ($products as $product) {
                    echo '<li>' . htmlspecialchars($product['product_name']) . ' - ' . htmlspecialchars($product['product_desc']) . '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}

displayCategories($pdo);
?>
