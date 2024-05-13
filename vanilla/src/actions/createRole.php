<?php
session_start();
require '../../src/models/RoleModel.php';

$roleModel = new RoleModel();

$displayName = $_POST['role_name'] ?? null;
$admin = isset ($_POST['admin']) ? 1 : 0;

if (!$displayName) {
    echo "Please provide a role name.";
} else {
    if ($roleModel->createRole($displayName, $admin)) {
        echo "Role created successfully";
        echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
    } else {
        echo "Error creating role.";
    }
}

