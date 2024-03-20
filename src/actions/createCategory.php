<?php
session_start();
require '../../src/models/CategoryModel.php';

$categoryModel = new CategoryModel();

$name = $_POST['category_name'] ?? null;
$slug = $_POST['category_slug'] ?? null;
$parent_id = $_POST['parent_id'] ?? null;

if (!$name || !$slug) {
    echo "Please provide both a category name and slug.";
} else {
    if ($categoryModel->createCategory($name, $slug, $parent_id)) {
        echo "Category created successfully";
        echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
    } else {
        echo "Error creating category.";
    }
}
?>