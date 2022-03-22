<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<? ob_start(); ?>

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

        <title>Thay đổi mật khẩu</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php
        include 'connection.php';
        $code = $_GET['code'];
        $email = $_GET['email'];
        if (isset($_POST['changepass'])) {
            $pass = $_POST['pass'];
            $repass = $_POST['repass'];
            if ($pass != $repass) {
                $repasserr = "Mật khẩu không khớp!";
            } else {
                $password = md5($pass);
                $update = "update customer set Password='$password' where Email='$email' and code='$code'";
                if ($conn->query($update) == TRUE) {
                    $success = "Thay đổi mật khẩu thành công!";
                } else {

                    echo "Error updating record: " . $conn->error;
                }
            }
        }
        ?>
        <form method="POST">
            <div class="" style="align-content: center;background-image: url(./images/dog.jpg);background-repeat: no-repeat;background-size: cover;height: 500px;width: 100%"">
                <div class="d-flex justify-content-center h-100">
                    <div class="card" style="height: 350px;
                         margin-top: auto;
                         margin-bottom: auto;
                         width: 580px;
                         background-color: rgba(255,255,255,0.5) !important;">
                        <div class="card-header">
                            <center><h2 style="font-family:serif">Thay đổi mật khẩu</h2></center>                          
                        </div>
                        <div class="card-body">
                            <form method="POST">


                                <div class="input-group form-group" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 50px;
                                              background-color: #65e5fa;
                                              color: black;
                                              border:0 !important;"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z]).{8,}$" oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu ít nhất một ký tự thường , một ký tự hoa, lớn hơn hoặc bằng 8 ký tự!')" onkeyup="setCustomValidity('')"required  name="pass" style="font-size: 20px;color: black;" class="form-control" placeholder="Nhập vào mật khẩu">

                                </div>

                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 50px; background-color: #65e5fa; color: black;border:0 !important;">


                                            <i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" name="repass" style="font-size: 20px;color: black;" class="form-control" placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="input-group form-group" >
                                    <div class="">
                                        <?php if (isset($repasserr)) { ?>
                                            <span style="color: red;font-size: 20px;font-family:serif"><?php echo $repasserr; ?></span>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="input-group form-group" >
                                    <div class="">
                                        <?php if (isset($success)) { ?>
                                            <span style="font-size: 20px;font-family:serif"><?php echo $success; ?><a href="login.php" style="text-decoration: none">Đăng nhập</a></span>
                                        <?php } ?>
                                    </div>

                                </div>

                                <center>  <input type="submit" name="changepass" value="Thay đổi mật khẩu" class="btn login_btn" style="margin-top: 8px;font-size: 20px;
                                                 color: black;
                                                 background-color: #65e5fa;
                                                 width: 170px;font-family: serif;font-size: 20px                                               
                                                 "></center>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
<? ob_flush(); ?>