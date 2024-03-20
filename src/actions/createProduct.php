<?php
require '../../db.php'; 

$name = $_POST['product_name'] ?? null;
$price = $_POST['product_price'] ?? null;
$desc = $_POST['product_desc'] ?? null;
$category_id = $_POST['category_id'] ?? null;

if (!$name || !$price || !$desc || !$category_id) {
    echo "Please provide all product details: name, price, description, and category.";
} else {
    $stmt = $pdo->prepare("INSERT INTO `db`.`Product` (product_name, product_price, product_desc, Category_id) VALUES (:name, :price, :desc, :category_id)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':category_id', $category_id);

    if ($stmt->execute()) {
        echo "Product created successfully";
        echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
    } else {
        echo "Error creating product.";
    }
}
?>
