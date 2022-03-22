<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<? ob_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Thay đổi mật khẩu</title>
    </head>
    <?php 
    include 'header.php';
    ?>
    <body style="font-family: serif">

        <div style="background-color:rgb(248,248,248);font-size: 20px;height: 400px">

       <form method="post" style="padding-top:20px; ">
                <div class="container" style="background-color: white;margin-bottom: 20px;margin-top: 65px">
            <div class="row">
                <div class="col-md-12" style="background-color: #ccffcc">

                    </p>
                    <p style="font-size: 20px">
                         Link thay đổi mật khẩu đã gửi tới mail của bạn, vui lòng check mail!  
                    </p>
                </div>
            </div>
        </div>
       </form>
        </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
<? ob_flush(); ?>