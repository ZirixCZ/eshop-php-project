<?php
session_start();
require '../../src/models/CategoryModel.php';
require '../../src/models/ProductModel.php';

$categoryModel = new CategoryModel();
$productModel = new ProductModel();

function displayCategories(CategoryModel $categoryModel, ProductModel $productModel, $parentId = null)
{
    $categories = $categoryModel->fetchCategories($parentId);
    if ($categories) {
        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li>' . htmlspecialchars($category['category_name']);
            displayCategories($categoryModel, $productModel, $category['id']);
            $products = $productModel->getProducts($category['id']);
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

displayCategories($categoryModel, $productModel);
?>