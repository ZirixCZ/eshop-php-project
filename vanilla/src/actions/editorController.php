<?php
session_start();
require '../../src/models/CategoryModel.php';
require '../../src/models/RoleModel.php';


if (!isset ($_SESSION['username']) || !$_SESSION['isEditor']) {
    header("Location: ../pages/login.php");
    exit;
}

$roleModel = new RoleModel();
$roles = $roleModel->fetchAllRoles();

$categoryModel = new CategoryModel();
$categories = $categoryModel->fetchAllCategories();

$username = $_SESSION['username'];

require '../../src/pages/editorPage.php';
?>
