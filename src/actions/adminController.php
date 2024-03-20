<?php 
session_start();
require '../../db.php';
require '../../src/models/CategoryModel.php';
require '../../src/models/RoleModel.php'; 


if (!isset($_SESSION['username']) || !$_SESSION['isAdmin']) {
    header("Location: ../pages/login.php");
    exit;
}

$roleModel = new RoleModel($pdo);
$roles = $roleModel->fetchAllRoles();

$categoryModel = new CategoryModel($pdo);
$categories = $categoryModel->fetchAllCategories();

$username = $_SESSION['username'];

require '../../src/pages/adminPage.php';
?>
