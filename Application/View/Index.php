<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
  <link href="<?= Conf::getApplicationCSSPath() . 'styleIndex.css' ?>" type="text/css" rel="stylesheet">
  <title>Assistencia Social</title>
</head>

<body class="bg">

  <header>
    <nav class="navbar navbar-transparent">
      <div class="container-fluid">
        <div class="navbar-header">
          <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . '37279481_10204770496458106_1157461924988846080_n.png' ?>" alt="LOGO"></img>
        </div>
          <button onclick="location.href='<?= Conf::
          getApplicationViewPath() . 'login.php'?>';" class="btn btn-danger navbar-btn" href="<?= Conf::
          getApplicationViewPath() . 'login.php'?>">LogIn</button>
      </div>
    </nav>
  </header>

  <section>
    <h1>Assistente Social</h1>
  </section>

</body>

</html>