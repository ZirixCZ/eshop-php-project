<?php
require '../../db.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$roles_id = $_POST['roles_id'] ?? null;

if (strlen($username) < 1 || strlen($password) < 1 || strlen($roles_id) < 1) {
} else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO `db`.`User` (username, password_hash, Roles_id) VALUES (:username, :password_hash, :roles_id)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password_hash', $password_hash);
    $stmt->bindParam(':roles_id', $roles_id);

    if ($stmt->execute()) {
        echo "User created successfully";
        echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
    } else {
        echo "Error creating user.";
    }
}
?>
