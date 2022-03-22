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

        <title>Cập nhật sản phẩm</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        $id_product = $_GET['id_product'];
        include 'connection.php';
        $sqlCategory = "select * from category";
        $result1 = $conn->query($sqlCategory);
        $sql = "select * from product where ProductId = $id_product";
        $result2 = $conn->query($sql);
        $row = $result2->fetch_array();
        $price = $row['Price'];

        if (isset($_POST['submit'])) {
            $nameproduct = $_POST['nameproduct'];
            $price = $_POST['price'];
            $realname = $_POST['realname'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $sale = $_POST['sale'];
            if ($_FILES['imagep']['name'] == "") {
                $target_path = $_POST['imagep'];
            } else {
               $target_path = "imageproduct/";
                $target_path = $target_path . basename($_FILES['imagep']['name']);
               
            }
//           
            $categoryP = $_POST['categoryproduct'];
            if (isset($nameproduct) && isset($sale) && isset($price) && isset($realname) && isset($status) && isset($description) && isset($categoryP))
                (move_uploaded_file($_FILES['imagep']['tmp_name'], $target_path));
            $sql = "update product set ProductName='$nameproduct',Price='$price',RealName='$realname',StatusProduct='$status',Description='$description',ImageProduct='$target_path',CategoryId = '$categoryP' ,SaleId='$sale' where ProductId = $id_product";
            if ($conn->query($sql) == TRUE) {
                echo "Record updated successfully";
                header("location:displayProduct.php");
            } else {
                echo "Error updating record: " . $conn->error;
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
                            <tbody>

                                <tr>
                                    <td>Tên sản phẩm:</td>
                                    <td scope="row"><input type="text"  name="nameproduct" value="<?php
                                        if (isset($_POST['nameproduct'])) {
                                            echo $_POST['nameproduct'];
                                        } else {
                                            echo $row['ProductName'];
                                        }
                                        ?>"></td>
                                </tr>
                                <tr>
                                    <td>Giá sản phẩm:</td>
                                    <th scope="row"><input type="text" value="<?php
                                        if (isset($_POST['price'])) {
                                            echo $_POST['price'];
                                        } else {
                                            echo $price;
                                        }
                                        ?>"  name="price"></th>                           
                                </tr>                                                     
                                <tr>
                                    <td>Tên Thật:</td>
                                    <th scope="row"><input type="text" value="<?php
                                        if (isset($_POST['realname'])) {
                                            echo $_POST['realname'];
                                        } else {
                                            echo $row['RealName'];
                                        }
                                        ?>"  name="realname"></th>                           
                                </tr>
                                <tr>
                                    <td>Tình trạng:</td>
                                    <th scope="row"><input type="text" value="<?php
                                        if (isset($_POST['status'])) {
                                            echo $_POST['status'];
                                        } else {
                                            echo $row['StatusProduct'];
                                        }
                                        ?>"  name="status"></th>                           
                                </tr>
                                <tr>
                                    <td>Hình sản phẩm:</td>
                                    <th scope="row">
                               
                                        <input type="file" name="imagep"/> <input type="hidden" name="imagep" value="<?php echo $row['ImageProduct']; ?>" /></th>
                                </tr>
                                <tr>
                                    <td>Miêu tả sản phẩm:</td>
                                    <th scope="row"><textarea style="width: 400px;height: 300px" value="" name="description"><?php
                                            if (isset($_POST['description'])) {
                                                echo $_POST['description'];
                                            } else {
                                                echo $row['Description'];
                                            }
                                            ?></textarea></th>                           
                                </tr>
                                <tr>
                                    <td>Loại sản phẩm:</td>
                                    <th scope="row">
                                        <select name="categoryproduct">
                                            <?php
                                            if ($result1->num_rows > 0) {
                                                while ($rowc = $result1->fetch_array()) {
                                                    ?>
                                                    <option <?php
                                                    if ($row['CategoryId'] == $rowc['CategoryId']) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?> value="<?php echo $rowc['CategoryId']; ?>"><?php echo $rowc['CategoryName']; ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </th>                           
                                </tr>
                                <tr>
                                    <td>Mã khuyến mãi:</td>
                                    <th scope="row"><input type="text" name="sale" value=" <?php
                                        if (isset($_POST['sale'])) {
                                            echo $_POST['sale'];
                                        } else {
                                            echo $row['SaleId'];
                                        }
                                        ?>">

                                <tr>
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
