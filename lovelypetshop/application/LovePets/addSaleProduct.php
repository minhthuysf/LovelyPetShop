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

        <title>Thêm mã khuyến mãi</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        include 'connection.php';
        if (isset($_POST['submit'])) {
            $saleid = $_POST['saleid'];
            $content = $_POST['content'];
            $sdate = $_POST['sdate'];
            $edate = $_POST['edate'];
            $salep = $_POST['salep'];
            if (isset($saleid) && isset($content) && isset($edate) && isset($sdate) && isset($salep)) {
                include 'connection.php';
                $insert = "insert into sale(SaleId,Content,StartDate,EndDate,DecreasePercent) values($saleid,'$content','$sdate','$edate','$salep')";
                if ($conn->query($insert) == True) {
                    header("location:saleProduct.php");
                } else {
                    echo "Error: " . $sql . $conn->error;
                }
                $conn->close();
            }
        }
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post"  style="padding-top:20px;">

                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="font-size:30px"><b>Thêm khuyến mãi sản phẩm</b></h2>

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
                                    <td scope="row">
                                        <label  style="margin-right: 20px">Mã khuyến mãi:</label>

                                        <input type="text"  oninvalid="this.setCustomValidity('Vui lòng nhập vào mã khuyến mãi!')"
                                               oninput="setCustomValidity('')" required name="saleid" value=""/></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <label  style="margin-right: 60px">Nội dung:</label>

                                        <input type="text" oninvalid="this.setCustomValidity('Vui lòng nhập vào nội dung!')"
                                               oninput="setCustomValidity('')" required    name="content"></td>                           
                                </tr>                                                     
                                <tr>
                                    <td scope="row">
                                        <label  style="margin-right: 34px">Ngày Bắt đầu:</label>

                                        <input type="datetime-local" oninvalid="this.setCustomValidity('Vui lòng nhập vào ngày bắt đầu!')"
                                               oninput="setCustomValidity('')" required name="sdate"></td>                           
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <label  style="margin-right: 30px">Ngày kết thúc:</label>

                                        <input type="datetime-local" oninvalid="this.setCustomValidity('Vui lòng nhập vào ngày kết thúc!')"
                                               oninput="setCustomValidity('')" required  name="edate"></td>                           
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <label  style="margin-right: 66px">Giảm %:</label>

                                        <input type="text" oninvalid="this.setCustomValidity('Vui lòng nhập phần trăm giảm giá!')"
                                               oninput="setCustomValidity('')" required name="salep"><td>



                                <tr>
                                    <td><button name="submit" style="margin-left: 130px;background-color:#65e5fa;border:none;width:150px;height:50px">Thêm khuyến mãi</button></td>
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
