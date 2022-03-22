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

        <title>Cập nhật mã khuyến mãi</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        include 'connection.php';
        $saleid = $_GET['saleid'];

        $sql = "select * from sale where SaleId = $saleid";
        $result2 = $conn->query($sql);
        $row = $result2->fetch_array();


        if (isset($_POST['submit'])) {
            $ids = $_POST['ids'];
            $content = $_POST['content'];
            $sdate = $_POST['sdate'];
            $edate = $_POST['edate'];
            $percent = $_POST['percent'];
            if (isset($ids) && isset($content) && isset($sdate) && isset($edate)) {
                $sql = "update sale set DecreasePercent = '$percent',Content='$content',EndDate='$edate',StartDate='$sdate' where SaleId = $saleid";
                if ($conn->query($sql) == TRUE) {
                    echo "Record updated successfully";
                    header("location:saleProduct.php");
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
        ?>

        <div style="background-color:rgb(248,248,248);">
            <form method="post"  style="padding-top:20px; " enctype="multipart/form-data">

                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="font-size:30px"><b>Chỉnh sửa sản phẩm</b></h2>

                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>


                                </tr>
                            </thead>
                            <?php ?>
                            <tbody>

                                <tr>
                                    <td scope="row">
                                        <label style="margin-right: 20px">Mã khuyến mãi:</label>

                                        <input type="text"  name="ids" readonly="" value="<?php
                                        if (isset($_POST['ids'])) {
                                            echo $_POST['ids'];
                                        } else {
                                            echo $row['SaleId'];
                                        }
                                        ?>"></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <label style="margin-right: 60px">Nội dung:</label>

                                        <input type="text" value="<?php
                                        if (isset($_POST['content'])) {
                                            echo $_POST['content'];
                                        } else {
                                            echo $row['Content'];
                                        }
                                        ?>"  name="content"></td>                           
                                </tr>                                                     
                                <tr>
                                    <td scope="row">
                                        <label style="margin-right: 34px">Ngày bắt đầu:</label>

                                        <input type="datetime" value="<?php
                                        if (isset($_POST['sdate'])) {
                                            echo $_POST['sdate'];
                                        } else {
                                            echo $row['StartDate'];
                                        }
                                        ?>" name="sdate"></td>                           
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <label style="margin-right: 30px">Ngày kết thúc:</label>

                                        <input type="datetime" value="<?php
                                        if (isset($_POST['edate'])) {
                                            echo $_POST['edate'];
                                        } else {
                                            echo $row['EndDate'];
                                        }
                                        ?>"  name="edate"></td>                           
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <label style="margin-right: 66px">Giảm %:</label>

                                        <input type="text" value="<?php
                                        if (isset($_POST['percent'])) {
                                            echo $_POST['percent'];
                                        } else {
                                            echo $row['DecreasePercent'];
                                        }
                                        ?>"  name="percent"></td>                           
                                </tr>

                                <tr>
                                    <td><button name="submit" style="margin-left: 130px;background-color:#65e5fa;border:none;width:150px;height:50px">Cập nhật</button></td>
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
