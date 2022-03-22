<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php ob_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">   
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Đăng ký tài khoản</title>
    </head>
    <body>
        <?php
        include 'header.php';
        include 'connection.php';
        ?>
        <?php
        include 'connection.php';

        if (isset($_POST['register'])) {
            $namelogin = $_POST['username'];
            $pass = $_POST['pass'];
            $repass = $_POST['repass'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = _POST['phone'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $sqlcm = "select * from customer where Email = '$email'";
            $result2 = $conn->query($sqlcm);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_array()) {
                    $erremail = "Email đã được sử dụng!";
                }
            } else {
                $sql = "select * from customer where NameLogin='$namelogin'";
                $result1 = $conn->query($sql);
                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_array()) {
                        $errsamenameLogin = "Tên đăng nhập đã được sử dụng!";
                    }
                }
                if ($pass != $repass) {
                    $repasserr = "Mật khẩu không khớp!";
                } else {
                    $password = md5($pass);
                    $insert = "insert into customer(NameLogin,Password,FullName,"
                            . "Gender,Address,Email,PhoneNumber,Birthday,Status,TypeUser) values('$namelogin','$password','$fullname',"
                            . "'$gender','$address','$email','$phone','$birthday',1,'Khách hàng')";
                    if ($conn->query($insert) == True) {
                        header("location:login.php");
                    } else {
                        echo $conn->error;
                    }
                    $conn->close();
                }
            }
        }
        ?>
        <form method="POST">
            <div class="" style="align-content: center;background-image: url(./images/dogb1.jpg);background-repeat: no-repeat;background-size: cover;width: 100%">
                <div class="d-flex justify-content-center h-100">
                    <div class="card" style="
                         margin-top: 20px;
                         margin-bottom: 20px;
                         width: 700px;
                         background-color: rgba(255,255,255,0.5) !important;">
                        <div class="card-header">
                            <center><h2 style="font-family:serif">Đăng ký tài khoản</h2></center>                          
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="input-group form-group" >
                                    <div class="">
                                        <?php if (isset($errsamenameLogin)) { ?>
                                            <span style="color: red;font-size: 20px;font-family:serif"><?php echo $errsamenameLogin; ?></span>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="input-group form-group" >
                                    <div class="">
                                        <?php if (isset($erremail)) { ?>
                                            <span style="color: red;font-size: 20px;font-family:serif"><?php echo $erremail; ?></span>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="input-group form-group" >
                                    <div class="">
                                        <?php if (isset($repasserr)) { ?>
                                            <span style="color: red;font-size: 20px;font-family:serif"><?php echo $repasserr; ?></span>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="input-group form-group" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px;
                                              background-color: #65e5fa;
                                              color: black;
                                              border:0 !important;">Tên đăng nhập</span>
                                    </div>
                                    <input type="text" name="username" pattern="^[a-zA-Z-_]*$" oninvalid="this.setCustomValidity('Vui lòng nhập tên đăng nhập chỉ chứa kí tự không khoảng cách!')" onkeyup="setCustomValidity('')" required style="font-size: 20px;color: black;" class="form-control" >

                                </div>

                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Nhập mật khẩu</span>
                                    </div>
                                    <input type="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z]).{8,}$" oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu ít nhất một ký tự thường , một ký tự hoa, lớn hơn hoặc bằng 8 ký tự!')" onkeyup="setCustomValidity('')"required name="pass" style="font-size: 20px;color: black;" class="form-control" >
                                </div>

                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Nhập lại mật khẩu</span>
                                    </div>
                                    <input type="password" name="repass" style="font-size: 20px;color: black;" class="form-control">
                                </div>


                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Họ Tên</span>
                                    </div>
                                    <input type="text" oninvalid="this.setCustomValidity('Vui lòng nhập vào Họ Tên!')"
                                           oninput="setCustomValidity('')" required  name="fullname" style="font-size: 20px;color: black;" class="form-control" >
                                </div>
                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Địa chỉ</span>
                                    </div>
                                    <input type="text" name="address" oninvalid="this.setCustomValidity('Vui lòng nhập vào địa chỉ!')"
                                           oninput="setCustomValidity('')" required  style="font-size: 20px;color: black;" class="form-control" >
                                </div>
                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Email</span>
                                    </div>
                                    <input type="email" name="email" style="font-size: 20px;color: black;" oninvalid="this.setCustomValidity('Vui lòng nhập vào email hợp lệ!')"
                                           oninput="setCustomValidity('')" required  class="form-control" >
                                </div>
                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Sinh nhật</span>
                                    </div>
                                    <input type="date" name="birthday" oninvalid="this.setCustomValidity('Vui lòng nhập vào sinh nhật!')"
                                           oninput="setCustomValidity('')" required  style="font-size: 20px;color: black;" class="form-control" >
                                </div>
                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Điện thoại</span>
                                    </div>
                                    <input type="phone" pattern="(\+84|0)\d{9,10}" oninvalid="this.setCustomValidity('Vui lòng nhập đúng định dạng số điện thoại!')"
                                           oninput="setCustomValidity('')" required  name="phone" style="font-size: 20px;color: black;" class="form-control" >
                                </div>
                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px; background-color: #65e5fa; color: black;border:0 !important;">


                                            Giới tính</span>
                                    </div>
                                    <select name="gender">
                                        <option value="1">Nữ</option>
                                        <option value="0">Nam</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <center>  <input type="submit" name="register" value="Đăng ký" class="btn login_btn" style="margin-top: 8px;font-size: 20px;
                                                     color: black;
                                                     background-color: #65e5fa;
                                                     width: 120px;font-family: serif;font-size: 20px
                                                     "></center>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center links" style="font-family: serif;font-size: 20px;text-decoration: none">
                                Bạn đã có tài khoản?<a href="login.php" style="text-decoration: none">Đăng nhập</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include 'footer.php'; ?>
    </body>
</html>
