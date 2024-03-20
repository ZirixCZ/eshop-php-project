
<?php
require '../../db.php';  

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if (!$username || !$password) {
    echo "Please provide both a username and a password.";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM `db`.`User` WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();

if ($stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Username already exists. Please choose another one.";
    exit;
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$defaultRoleId = 2;

$stmt = $pdo->prepare("INSERT INTO `db`.`User` (username, password_hash, Roles_id) VALUES (:username, :password_hash, :roles_id)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password_hash', $password_hash);
$stmt->bindParam(':roles_id', $defaultRoleId);

if ($stmt->execute()) {
    echo "Registration successful!";
    $_SESSION["username"] = $username;
    header("Location: ../pages/login.php");
    exit;
} else {
    echo "Error during registration.";
}
?>

