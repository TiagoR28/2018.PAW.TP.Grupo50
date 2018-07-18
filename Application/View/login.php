<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;
require_once (Conf::getApplicationvalidarPath() . 'validarLogin.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title> MedCare LogIn </title>
    <link rel="stylesheet" type="text/css" href="<?= Conf::getApplicationCSSPath() . 'styleLogIn.css' ?>">
</head>
<body>
    <div class="login-box">
        <img src="<?= Conf::getApplicationImagePath() . '37279481_10204770496458106_1157461924988846080_n.png' ?>" class="logo">
        <h1>LOGIN</h1>
        <form action="" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>