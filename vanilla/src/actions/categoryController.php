<?php
session_start();
require '../../src/models/CategoryModel.php';
require '../../src/models/ProductModel.php';

$categoryModel = new CategoryModel();
$productModel = new ProductModel();

$category_id = $_GET['category_id'] ?? null;

if ($category_id) {
    $category = $categoryModel->getCategory($category_id);
    $products = $productModel->getProducts($category_id);
    $breadcrumbs = $categoryModel->buildBreadcrumbs($category_id);

    require '../../src/pages/categoryPage.php';
} else {
    header("Location: ../pages/userPage.php");
    exit;
}
?>