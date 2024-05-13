<?php
session_start();

require '../../src/models/UserModel.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$userModel = new UserModel();

if ($username && $password) {
    $user = $userModel->findUserByUsername($username);

    if ($user && $userModel->checkPassword($user, $password)) {
        $_SESSION["isAdmin"] = $user['Roles_id'] == 1;
        $_SESSION["isEditor"] = $user['Roles_id'] == 3;
        $_SESSION["username"] = $username;

        if ($_SESSION["isAdmin"]) {
            header("Location: ./adminController.php");
            exit;
        } else if ($_SESSION["isEditor"]) {
            header("Location: ./editorController.php");
            exit;
        } else if (isset ($_SESSION["username"])) {
            header("Location: ./userController.php");
            exit;
        } else {
            header("Location: ../pages/login.php");
        }
    } else {
        echo "Login failed: Incorrect password or user not found";
        var_dump($user);
        echo '<a href="/src/pages/login.php">Back to login page</a>';
    }
} else {
    echo "Please provide both username and password.";
}
?>
