<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php ob_start(); ?>

<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Quên mật khẩu</title>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

include 'connection.php';
        if (isset($_POST['send'])) {
            $email = $_POST['email'];
            $select = "select * from customer where Email ='$email'";
            $result = $conn->query($select);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['NameLogin'];
                    $code = uniqid(md5(time()));

                    $insert = "update customer set code='$code' where Email='$email'";
                    if ($conn->query($insert) == True) {
                        
                    } else {
                        //echo "Error: " . $sql . $conn->error;
                    }
                    require './PHPMailer/Exception.php';
                    require './PHPMailer/PHPMailer.php';
                    require './PHPMailer/SMTP.php';

                    $mail = new PHPMailer(true);
                    $mail->SMTPDebug = 3;
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "ssl";
                    $mail->Port = 465;
                    $mail->Username = "tringhien278@gmail.com";
                    $mail->Password = "TriNghien@278";
                    $mail->From = "tringhien278@gmail.com";
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = "Thay đổi mật khẩu";
                    $mail->Body = "Click vào link để đổi mật khẩu:" . "http://localhost/LovePets/resetPassword.php?code=$code&email=$email";
                    try {
                        $mail->send();
                        header("location:announceChangePassword.php");
                    } catch (Exception $e) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                }
            } else {
                $err = "Tài khoản email không tồn tại!";
            }
        }
        ?>
        <form method="POST">
            <div class="" style="align-content: center;background-image: url(./images/dog.jpg);background-repeat: no-repeat;background-size: cover;height: 500px;width: 100%"">
                <div class="d-flex justify-content-center h-100">
                    <div class="card" style="height: 300px;
                         margin-top: auto;
                         margin-bottom: auto;
                         width: 580px;
                         background-color: rgba(255,255,255,0.5) !important;">
                        <div class="card-header">
                            <center><h2 style="font-family:serif">Quên mật khẩu</h2></center>                          
                        </div>
                        <div class="card-body">

                            <div class="input-group form-group" >
                                <div class="">
                                    <?php if (isset($err)) { ?>
                                        <span style="color: red;font-size: 20px;font-family:serif"><?php echo $err; ?></span>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="input-group form-group" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 50px;
                                          background-color: #65e5fa;
                                          color: black;
                                          border:0 !important;"><i  class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" style="font-size: 20px;color: black;" class="form-control" placeholder="Nhập vào địa chỉ email đăng ký tài khoản của bạn">

                            </div>

                            <div class="form-group">
                                <center>  <input type="submit" name="send" value="Gửi" class="btn login_btn" style="margin-top: 8px;font-size: 20px;
                                                 color: black;
                                                 background-color: #65e5fa;
                                                 width: 200px;font-family: serif;font-size: 20px                                               
                                                 "></center>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
