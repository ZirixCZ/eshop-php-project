<?php
session_start();
require '../../src/models/UserModel.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$userModel = new UserModel();

if (!$username || !$password) {
    echo "Please provide both a username and a password.";
    exit;
}

if ($userModel->userExists($username)) {
    echo "Username already exists. Please choose another one.";
    exit;
}

if ($userModel->registerUser($username, $password)) {
    echo "Registration successful!";
    $_SESSION["username"] = $username;
    header("Location: ../pages/login.php");
    exit;
} else {
    echo "Error during registration.";
}
