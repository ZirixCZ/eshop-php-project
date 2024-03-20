<?php
session_start();
require 'db.php'; 

function redirect($page) {
    header("Location: /src/pages/" . $page);
    exit;
}


function controllerRedirect($page) {
    header("Location: /src/actions/" . $page);
    exit;
}

if (isset($_SESSION["username"])) {
    if ($_SESSION["isAdmin"]) {
        controllerRedirect('adminController.php');
    } else {
        controllerRedirect('userController.php');
    }
} else {
    redirect('login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        require './src/actions/login.php';
    } elseif (isset($_POST['create_user'])) {
        require './src/actions/createUser.php';
    } elseif (isset($_POST['create_role'])) {
        require './src/actions/createRole.php';
    }
}

