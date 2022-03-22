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

        <title>Thêm hình mô tả sản phẩm</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        if (isset($_POST['submit'])) {
            $productid = $_POST['product'];
            $target_path = "imageproduct/";
            $target_path = $target_path . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                include 'connection.php';
                $sql = "insert into imageproduct(FileName,ProductId) values('$target_path','$productid')";
                if ($conn->query($sql) == True) {
                    header("location:displayProduct.php");
                } else {
                    echo "Error: " . $sql . $conn->error;
                }
                $conn - close();
            }
        }
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post"  style="padding-top:20px;padding-bottom: 20px  " enctype="multipart/form-data">

                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="font-size:30px"><b>Thêm hình sản phẩm</b></h2>

                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>


                                </tr>
                            </thead>
                            <tbody>



                            <td>Hình sản phẩm:</td>
                            <th scope="row"><input type="file" name="image" oninvalid="this.setCustomValidity('Vui lòng lựa chọn hình ảnh!')"
                                   oninput="setCustomValidity('')" required >


                            <tr>
                                <td>Tên sản phẩm:</td>
                                <th scope="row">
                                    <?php
                                    include 'connection.php';
                                    $query = "select * from product order by ProductId desc";
                                    $result = $conn->query($query);
                                    ?>
                                    <select name="product">
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>

                                                <option  value="<?php echo $row['ProductId']; ?>"><?php echo $row['ProductName']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </th>                           
                            </tr>
                            <tr>
                                <td></td>
                                <td><button name="submit" style="background-color:#65e5fa;border:none;width:150px;height:50px">Thêm sản phẩm</button></td>
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