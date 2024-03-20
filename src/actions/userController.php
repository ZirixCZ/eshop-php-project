<?php
session_start();
require '../../db.php';
require '../../src/models/CategoryModel.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit;
}

$categoryModel = new CategoryModel($pdo);
$categories = $categoryModel->fetchAllCategoriesWithChildren($pdo); 

$username = $_SESSION['username'] ?? "";
require '../../src/pages/userPage.php';
?>
