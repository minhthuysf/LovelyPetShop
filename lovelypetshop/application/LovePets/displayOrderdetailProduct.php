<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        <title>Chi tiết sản phẩm</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        include 'connection.php';
        $id_product= $_GET['id_product'];
        $sql = "select * from product where ProductId ='$id_product'";
        $result1 = $conn->query($sql);
        ?>
  
        <div style="background-color:rgb(248,248,248);">
            <div style="padding-top:20px; ">
                
                
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Chi tiết sản phẩm sản phẩm</h2>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Mã SP</th>
                                    <th scope="col">Hình SP</th>
                                    <th scope="col">Tên SP</th>
                                    <th scope="col">Miêu tả</th>
                                    <th scope="col">Tên thật</th> 
                                    <th scope="col">Giá SP</th>
                                    <th scope="col">Loại SP</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Thao tác</th>


                                </tr>
                            </thead>
                            <?php
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_array()) {
                                    $id = $row['ProductId'];
                                    $price = $row['Price'];
                                    $image = $row['ImageProduct'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $row['ProductId']; ?></th>
                                            <td><img src="<?php echo $row['ImageProduct']; ?>" style="width: 100px;width: 100px"/></td>
                                            <td><?php echo $row['ProductName']; ?></td>
                                            <td><?php echo $row['Description']; ?></td>
                                            <td><?php echo $row['RealName']; ?></td>
                                            <td><?php echo number_format($price) . "đ"; ?></td>
                                            <td><?php echo $row['CategoryId']; ?></td>
                                            <td><?php echo $row['StatusProduct']; ?></td>
                                            <td style="text-decoration: none">

                                                <a href="deleteProduct.php?id_product=<?php echo $id; ?>">Xóa</a>
                                                <a href="modifyProduct.php?id_product=<?php echo $row['ProductId']; ?>">Sửa</a>

                                            </td>


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
                </div>
            </div>

            
        </div>
    </body>
</html>
