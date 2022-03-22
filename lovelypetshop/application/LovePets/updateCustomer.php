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

        <title>Cập nhật tài khoản người dùng</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        $namelogin = $_GET['namelogin'];
        include 'connection.php';
        $sql = "select * from customer where NameLogin = '$namelogin'";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        if (isset($_POST['submit'])) {
            $status = $_POST['status'];
            $typeuser = $_POST['typeuser'];
            $update = "update customer set  TypeUser='$typeuser',Status='$status' where NameLogin ='$namelogin' ";
            if ($conn->query($update) == TRUE) {
                echo "Record updated successfully";
                header("location:displayCustomerlist.php");
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post"  style="padding-top:20px;padding-bottom: 20px ">

                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 scope="col" style="font-size:25px">Cập nhật tài khoản người dùng</h2>

                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>


                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Trạng thái:</td>
                                    <td scope="row">
                                        <select name="status">
                                            <option value="1">Hoạt động</option>
                                            <option value="0">Không hoạt động</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kiểu người dùng:</td>
                                    <th scope="row"><input type="text" value="<?php
                                        if (isset($_POST['typeuser'])) {
                                            echo $_POST['typeuser'];
                                        } else {
                                            echo $row['TypeUser'];
                                        }
                                        ?>"  name="typeuser"></th>                           
                                </tr>                                                      
                                <tr>
                                    <td></td>
                                    <td><button name="submit" style="background-color:#65e5fa;border:none;width:150px;height:50px">Cập nhật</button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </form>
        </div>

        <?php
// put your code here
        ?>
    </body>
</html>
<? ob_flush(); ?>
