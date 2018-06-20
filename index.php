<?php
    require_once (realpath(dirname( __FILE__ )) . '/Config.php');
    use Config as Conf;
    require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php'); 
    require_once (Conf::getApplicationManagerPath() . 'StudentManager.php'); 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php   
//            $m = new StudentManager();
//            
//            print_r($m->getStudents(true));            
            
        ?>
    </body>
</html>
