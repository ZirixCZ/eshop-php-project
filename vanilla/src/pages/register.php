<?php
  include '../../header.php';
?>

<h1>Register</h1>
<form method="post" action="../../src/actions/register.php">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Email: <input type="text" name="email"><br>
    <input type="hidden" name="login" value="true">
    <input type="submit" value="Register">
    <a href="/src/pages/login.php">go to login</a>
</form>

