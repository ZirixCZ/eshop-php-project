<?php
  include '../../header.php';
?>

<h1>Login</h1>
<form method="post" action="/src/actions/login.php">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="hidden" name="login" value="true">
    <input type="submit" value="Login">
    <a href="/src/actions/register.php">go to register</a>
</form>

