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
           session_start();
           session_destroy();
           unset($_SESSION['username']);
           $_SESSION['mesage'] = "You are now logged out";
           header("location:homePage.php");
        ?>
    </body>
</html>
