<?php
session_start();
require '../../src/models/ProductModel.php';
require '../../src/models/CategoryModel.php';

$productModel = new ProductModel();
$categoryModel = new CategoryModel();

$product_id = $_GET['product_id'] ?? null;
$category_id = $_GET['category_id'] ?? null;

if ($product_id) {
    $product = $productModel->getProduct($product_id);
    $breadcrumbs = $categoryModel->buildBreadcrumbs($category_id);
    require '../../src/pages/productPage.php';
} else {
    header("Location: ../pages/errorPage.php");
    exit;
}
?>