<?php
session_start();
require '../../src/models/ProductModel.php';

$productModel = new ProductModel();

$name = $_POST['product_name'] ?? null;
$price = $_POST['product_price'] ?? null;
$desc = $_POST['product_desc'] ?? null;
$category_id = $_POST['category_id'] ?? null;
$is_editor = $_POST['is_editor'];

if (!$name || !$price || !$desc || !$category_id) {
    echo "Please provide all product details: name, price, description, and category.";
} else {
    if ($productModel->createProduct($name, $price, $desc, $category_id)) {
        echo "Product created successfully";
        if ($is_editor) {
            echo '<a href="/src/actions/editorController.php">Back to editor page</a>';
        } else {
        echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
        }
    } else {
        echo "Error creating product.";
    }
}
?>
