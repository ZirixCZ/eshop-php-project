<?php
require '../../src/models/UserModel.php';

$userModel = new UserModel();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$roles_id = $_POST['roles_id'] ?? null;

if (strlen($username) < 1 || strlen($password) < 1 || strlen($roles_id) < 1) {
} else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if ($userModel->registerUser($username, $password_hash, $roles_id)) {
        echo "User created successfully";
        echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
    } else {
        echo "Error creating user.";
    }
}
?>