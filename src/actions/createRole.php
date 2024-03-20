<?php
require '../../db.php';

$displayName = $_POST['role_name'] ?? null;
$admin = isset($_POST['admin']) ? 1 : 0;

if (!$displayName) {
    echo "Please provide a role name.";
} else {
    $stmt = $pdo->prepare("INSERT INTO `db`.`Roles` (displayName, admin) VALUES (:displayName, :admin)");
    $stmt->bindParam(':displayName', $displayName);
    $stmt->bindParam(':admin', $admin);

    if ($stmt->execute()) {
        echo "Role created successfully";
        echo '<a href="/src/actions/adminController.php">Back to admin page</a>';
    } else {
        echo "Error creating role.";
    }
}
?>
