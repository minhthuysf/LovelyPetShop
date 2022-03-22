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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Xác nhận hóa đơn</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        $order_id = $_GET['order_id'];
        include 'connection.php';
//        $sql = "select * from orderproduct where OrderId = $order_id";
//        $result2 = $conn->query($sql);
//        $row = $result2->fetch_array();

        if (isset($_POST['submit'])) {
            $dd = $_POST['date'];
            $sql = "update orderproduct set Status='Đã hoàn',DateDelivery ='$dd' where OrderId = $order_id";
            if ($conn->query($sql) == TRUE) {
              //  echo "Record updated successfully";
                header("location:displayBillComplete.php");
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post"  style="padding-top:20px;padding-bottom: 20px ">

                <div class="container" style="background-color:white;">
                    <div class="row" >
                        <div class="col-md-12">
                            <h2>Xác nhận hóa đơn</h2>
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
                                    <td scope="row" >
                                        <label style="margin-right: 10px;">Mã hóa đơn:</label>                         
                                    
                                        <input readonly="true"  type="text" value="<?php echo $order_id; ?>"  name="nameproduct">

                                    </td>
                                </tr>                                                                                                              
                                <tr>
                                    <td scope="row" >
                                        <label style="margin-right: 18px;">Ngày giao:</label>

                                        <input type="datetime-local"  name="date"></td>                           
                                </tr>
                                <tr>
                                    <td>
                                        <label style="margin-right: 15px;">Tình trạng:</label>

                                        <select name="status">
                                            <option value="Đã hoàn">Đã hoàn</option>
                                            <option value="Đã hủy">Đã hủy</option>

                                        </select>
                                    </td>                           
                                </tr>
                                <tr>
                                    <td><button name="submit" style="background-color:#65e5fa;border:none;width:150px;height:50px;margin-left: 90px">Cập nhật</button></td>
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
