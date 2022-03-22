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
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Thông tin tài khoản</title>
    </head>
    <body style="font-family: serif;font-size: 18px">
        <?php include 'header.php'; ?>
        <?php
                if(!isset($_SESSION)){
                    session_start();

        }
        $namelogin = $_SESSION['NameLogin'];
        include 'connection.php';
        if (isset($_POST['subsuccess'])) {
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $birthday = $_POST['birthday'];
            $phone = $_POST['phone'];

            if (isset($name) && isset($email) && isset($address) && isset($birthday) && isset($phone)) {
                $sql = "update customer set Gender ='$gender',Email = '$email', Address = '$address',Birthday = '$birthday',PhoneNumber='$phone' where NameLogin ='$namelogin'";
                if ($conn->query($sql) == TRUE) {
                    header("location:informationPersonal.php?namelogin=$namelogin");
                   //  $success = "Cập nhật thông tin thành công!";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
        ?>
        <?php
        include 'connection.php';
        $namelogin = $_GET['namelogin'];
        $sql = "select * from customer where NameLogin='$namelogin'";
        $result = $conn->query($sql);
        ?>
        <div style="background-color:rgb(248,248,248);height:570px">



            <div class="container" style="background-color:white;">
                <form method="post">
                      <div class="row">
                        <div class="col-md-12">
                            <h2><?php //echo $success; ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="padding-bottom: 25px;padding-top: 25px">
                            <h2>Cập Nhật Thông Tin Tài Khoản</h2>
                        </div>
                    </div>
                  
                    <div class="row">
                        <table class="table">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    $gender = $row['Gender'];
                                    ?>
                                    <tbody>

                                        <tr>
                                            <td>Tên đăng nhập:</td>
                                            <th scope="row"><input type="text" readonly=""  value="<?php echo $namelogin; ?>" name="name"></th>
                                        </tr>
                                        <tr>
                                            <td>Giới tính:</td>
                                            <td scope="row">
                                                <select name="gender">
                                                    <option value="<?php
                            if ($gender == 1) {
                                echo "1";
                            } else {
                                echo "0";
                            }
                                    ?>"><?php
                                                            if ($gender == 1) {
                                                                echo "Nữ";
                                                            } else {
                                                                echo "Nam";
                                                            }
                                                            ?></option>
                                                    <option value="<?php
                                                        if ($gender == 1) {
                                                            echo "0";
                                                        } else {
                                                            echo "1";
                                                        }
                                                            ?>"><?php
                                                            if ($gender == 0) {
                                                                echo "Nữ";
                                                            } else {
                                                                echo "Nam";
                                                            }
                                                            ?></option>

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Email: </td>
                                            <th scope="row"><input type="email" oninvalid="this.setCustomValidity('Vui lòng nhập vào địa chỉ email!')"
                                                                   oninput="setCustomValidity('')" required value="<?php echo $row['Email'] ?>"  name="email">


                                            </th>                           
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ: </td>
                                            <th scope="row"><input type="text" oninvalid="this.setCustomValidity('Vui lòng nhập vào địa chỉ!')"
                                                                   oninput="setCustomValidity('')" required  value="<?php echo $row['Address'] ?>" name="address"></th>                           
                                        </tr>
                                        <tr>
                                            <td>Điện thoại: </td>
                                            <th scope="row"><input type="phone" oninvalid="this.setCustomValidity('Vui lòng nhập vào số điện thoại!')"
                                                                   oninput="setCustomValidity('')" required  value="<?php echo $row['PhoneNumber'] ?>" name="phone"></th>                           
                                        </tr>
                                        <tr>
                                            <td>Sinh nhật: </td>
                                            <th scope="row"><input type="date" oninvalid="this.setCustomValidity('Vui lòng nhập vào mật khẩu lớn hơn bằng 8 ký tự!')"
                                                                   oninput="setCustomValidity('')" required value="<?php echo $row['Birthday']; ?>"  name="birthday"></th>                           
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input style="background-color:#65e5fa;border:none;width:150px;height:50px" type="submit" name="subsuccess" value="Cập nhật"></input></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            } else {
                                echo $conn->error;
                            }
                            ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
<? ob_flush(); ?>