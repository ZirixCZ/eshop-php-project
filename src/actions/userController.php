<?php
session_start();
require '../../src/models/CategoryModel.php';

if (!isset ($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit;
}

$categoryModel = new CategoryModel();
$categories = $categoryModel->fetchAllCategoriesWithChildren();

$username = $_SESSION['username'] ?? "";
require '../../src/pages/userPage.php';
?>