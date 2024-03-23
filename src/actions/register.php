<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
require '../../src/models/UserModel.php';


require '../../vendor/autoload.php';


$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$email = $_POST['email'] ?? null;

$userModel = new UserModel();

if (!$username || !$password) {
    echo "Please provide both a username and a password.";
    exit;
}

if ($userModel->userExists($username)) {
    echo "Username already exists. Please choose another one.";
    exit;
}

function sendMail($email) {
  $mail = new PHPMailer(true);

  $dotenv = Dotenv\Dotenv::createImmutable("../../");
  $dotenv->load();

  try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Username = $_ENV['EMAIL_USER']; 
    $mail->Password = $_ENV['EMAIL_PASS']; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    $mail->setFrom($_ENV['EMAIL_USER'], 'Mihal');
    $mail->addAddress($email, 'User'); 

    $mail->isHTML(true);
    $mail->Subject = 'Welcome to the eshop!';
    $mail->Body    = 'This is a <b>confirmation email!</b> letting you know about your registration. You are now able to login on the website.';
    $mail->AltBody = 'This is confirmation email! letting you know about your registration. You are now able to login on the website.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}

if ($userModel->registerUser($username, $password)) {
  sendMail($email);
    echo "Registration successful!";
    $_SESSION["username"] = $username;
    header("Location: ../pages/login.php");
    exit;
} else {
    echo "Error during registration.";
}
