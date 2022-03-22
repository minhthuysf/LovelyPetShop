<?php ob_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>
        <title>Đăng nhập - Lovely Petshop</title>
    </head>
    <style>
        .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon span:hover{
            color: white;
            cursor: pointer;
        }
        .links{
            color: black;
            font-size: 20px;
        }

        .links a{
            margin-left: 4px;
            font-size: 20px;
        }
    </style>
    <body>
        <?php
        include 'header.php';
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = md5($password);
            $sql = "select * from customer where NameLogin ='$username' and Password='$password' and Status='1'";
            $result2 = $conn->query($sql);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_array()) {
                    $type = $row['TypeUser'];
                    if ($type == "Admin") {
                        header("location:homePageAdmin.php");                    
                        $_SESSION['NameLogin'] = $username;
                    } else {
                        header("location:homePage.php");
                        $_SESSION['NameLogin'] = $username;
                    }
                }
            } else {
                $announce = "Tên đăng nhập và mật khẩu không khớp!";
            }
        }
        ?>
        <form method="POST">
            <div class="" style="align-content: center;background-image: url(./images/dog.jpg);background-repeat: no-repeat;background-size: cover;height: 500px;width: 100%"">
                <div class="d-flex justify-content-center h-100">
                    <div class="card" style="height: 450px;
                         margin-top: auto;
                         margin-bottom: auto;
                         width: 580px;
                         background-color: rgba(255,255,255,0.5) !important;">
                        <div class="card-header">
                            <center><h2 style="font-family:serif">Đăng Nhập</h2></center>                          
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="input-group form-group" >
                                    <div class="">
                                        <?php if (isset($announce)) { ?>
                                            <span style="color: red;font-size: 20px;font-family:serif"><?php echo $announce; ?></span>
                                        <?php } ?>
                                    </div>

                                </div>

                                <div class="input-group form-group" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 50px;
                                              background-color: #65e5fa;
                                              color: black;
                                              border:0 !important;"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" style="font-size: 20px;color: black;" class="form-control" placeholder="Tên đăng nhập">

                                </div>
                                <div  class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 50px; background-color: #65e5fa; color: black;border:0 !important;">


                                            <i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" style="font-size: 20px;color: black;" class="form-control" placeholder="Mật khẩu">
                                </div>
                                <div class="row align-items-center remember" style="color:black;font-size: 20px;font-family: serif"> 
                                    <input type="checkbox" style=" border: 1px solid black;
                                           width: 20px;
                                           height: 20px;
                                           margin-left: 15px;
                                           margin-right: 5px;font-family: serif;font-size: 20px " >Remember Me
                                </div>
                                <div class="form-group">
                                    <center>  <input type="submit" name="login" value="Đăng nhập" class="btn login_btn" style="margin-top: 8px;font-size: 20px;
                                                     color: black;
                                                     background-color: #65e5fa;
                                                     width: 120px;font-family: serif;font-size: 20px
                                                     "></center>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center links" style="font-family: serif;font-size: 20px;text-decoration: none">
                                Bạn chưa có tài khoản?<a href="Registration.php" style="text-decoration: none">Đăng ký</a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="forgetPassword.php" style="font-family: serif;font-size: 20px;text-decoration: none">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include 'footer.php'; ?>
    </body>
</html>
