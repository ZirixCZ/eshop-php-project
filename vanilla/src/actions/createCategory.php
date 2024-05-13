<?php
session_start();
require '../../src/models/CategoryModel.php';

$categoryModel = new CategoryModel();

$name = $_POST['category_name'] ?? null;
$slug = $_POST['category_slug'] ?? null;
$parent_id = $_POST['parent_id'] ?? null;
$is_editor = $_POST['is_editor'];

if (!$name || !$slug) {
    echo "Please provide both a category name and slug.";
} else {
    if ($categoryModel->createCategory($name, $slug, $parent_id)) {
        echo "Category created successfully";
        if ($is_editor) {
            echo '<a href="/src/actions/editorController.php">Back to editor page</a>';
        } else {
            echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
        }
    } else {
        echo "Error creating category.";
    }
}
?>
