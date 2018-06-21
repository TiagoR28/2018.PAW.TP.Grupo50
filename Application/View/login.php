<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;
?>
<!DOCTYPE html>
<html>

<head>
    <title> MedCare LogIn </title>
    <link rel="stylesheet" type="text/css" href="<?= Conf::getApplicationCSSPath() . 'styleLogIn.css' ?>">
</head>
<body>
    <div class="login-box">
        <img src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" class="logo">
        <h1>LOGIN</h1>
        <form action="" method="GET">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>

</html>