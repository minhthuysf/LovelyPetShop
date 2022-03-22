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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body style="font-family: serif">
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <div style="background-color:rgb(248,248,248);">


            <form method="post" style="padding-top:20px;padding-bottom: 20px">

                <div class="container" style="background-color: white;">
                    <div class="row" style="background-color: rgb(248,248,248);margin-bottom: 10px;"  >
                        <div class="col-md-12"  style="border: 2px solid white;">
                            <h2>Giống chó cưng bán chạy</h2>
                        </div>

                    </div>
                    <div class="product-group">
                        <div class="row">
                            <?php
                            include 'connection.php';
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            $query = "select * from product p , category c where p.CategoryId = c.CategoryId and Typeid =1 and prominent='Có' and StatusProduct='Có sẵn' limit 8";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    $id = $row['ProductId'];
                                    $price = $row['Price'];
                                    $type = $row['CategoryId'];
                                    ?>


                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="card card-product" style="margin-top: 8px;border:1px solid black;margin-bottom: 8px;height: 90%" >
                                            <a href="detailProductd.php?id=<?php echo $row['ProductId'] ?>"><img class="card-img-top" data-toggle="tooltip" data-placement="top" title="Xem chi tiết thú cưng!" name="image" src="<?php echo $row['ImageProduct']; ?>"style="height: 250px;"   alt="image"></a>
                                            <div class="card-body">
                                                <a href="detailProductd.php?id=<?php echo $row['ProductId'] ?>" style="font-size:18px;text-decoration: none;"><?php echo $row['ProductName']; ?></a>

                                                <?php
                                                $idsale = false;
                                                $sql1 = "select * from product p , sale s where  s.SaleId = p.SaleId and ProductId = $id";
                                                $result3 = $conn->query($sql1);
                                                if ($result3->num_rows > 0) {
                                                    while ($row = $result3->fetch_array()) {
                                                        $ids = $row['SaleId'];
                                                    
                                                    }
                                                }
                                                ?>

                                                <div class="row">
                                                    <?php
                                                    if ($ids >= 1) {
                                                        ?>

                                                        <div class="col-md-8">
                                                            <strike style="color:grey;font-family: serif;" name="price"><?php echo number_format($price) . "đ"; ?></strike>

                                                        </div>
                                                        <?php
                                                    } else {
                                                        if ($ids == 0) {
                                                            ?>
                                                            <div class="col-md-8">
                                                                <span style="color:red;font-family: serif;" name="price"><?php echo number_format($price) . "đ"; ?></span>

                                                            </div> <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION['NameLogin'])) {
                                                        ?>
                                                        <script>
                                                            function addcart() {
                                                                swal({

                                                                    text: "Thêm giỏ hàng thành công!",
                                                                    icon: "success",

                                                                });
                                                                window.location = "homePage.php";

                                                            }
                                                        </script>
                                                        <?php
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>
                                                    <div class="col-md-4">

                                                        <a onclick="addcart()" href="addCartProminent.php?id_product=<?php echo $id; ?>&cidb=<?php echo $type; ?>"  data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng!" >
                                                            <i class="fa fa-cart-plus" name="add" aria-hidden="true" style="color: red;font-size: 25px;"></i>
                                                        </a>



                                                    </div>

                                                </div>
                                                <?php
                                                $sql = "select s.SaleId,  (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p , sale s where s.SaleId = p.SaleId  and StatusProduct='Có sẵn' and p.ProductId = $id";
                                                $result2 = $conn->query($sql);
                                                if ($result2->num_rows > 0) {
                                                    while ($row = $result2->fetch_array()) {
                                                        $ids = $row['SaleId'];
                                                        $dp = $row['DecreaseProduct'];
                                                    }
                                                } else {
                                                    echo $conn->error;
                                                }
                                                ?>
                                                <?php
                                                $check = "select * from sale where SaleId = $ids";
                                                $result6 = $conn->query($check);
                                                if ($result6->num_rows > 0) {
                                                    while ($row = $result6->fetch_array()) {
                                                        $date = $row['EndDate'];
                                                    }
                                                }
                                                date_default_timezone_set('Asia/Bangkok');

                                                if (date_default_timezone_get()) {
                                                    'date_default_timezone_set: ' . date_default_timezone_get() . '
';
                                                }
                                                $dateCurrent = date('Y-m-d H:i:s');

                                                $rscheck = strtotime($date) - strtotime($dateCurrent);
                                                // echo $rscheck;
                                                if ($rscheck <= 0) {
                                                    $update = "update product set SaleId ='0' where SaleId=$ids and ProductId = $id and StatusProduct = 'Có sẵn'";
                                                    if ($conn->query($update) == TRUE) {
                                                        // echo "Record updated successfully";
                                                    } else {
                                                        echo "Error updating record: " . $conn->error;
                                                    }
                                                }
                                                ?>
                                                <div class="row">

                                                    <?php
                                                    if ($ids == 0) {
                                                        echo "";
                                                    } else {
                                                        if ($ids >= 1) {
                                                            ?>

                                                            <div class="col-md-12">
                                                                <span style="color:red;font-family: serif;font-size: 18px" name="price"><?php echo number_format($dp) . "đ"; ?></span>


                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            } else {
                                echo $conn->error;
                            }
                            ?>


                        </div>
                    </div>
                </div>




                <div class="container" style="background-color: white;margin-top: 20px">
                    <div class="row" style="background-color: rgb(248,248,248);margin-bottom: 10px">
                        <div class="col-md-12" style="border: 2px solid white;">
                            <h2> Giống mèo cưng bán chạy</h2>
                        </div>

                    </div>
                    <div class="product-group">
                        <div class="row" >
                            <?php
                            include 'connection.php';

                            $query = "select * from product p , category c where p.CategoryId = c.CategoryId and Typeid =2 and prominent='Có' and StatusProduct='Có sẵn' limit 8";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    $id = $row['ProductId'];
                                    $price = $row['Price'];
                                    $type = $row['CategoryId'];
                                    ?>


                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="card card-product" style=";height: 90%;margin-top: 8px;border:1px solid black;margin-bottom: 8px" >
                                            <a href="detailProductc.php?id=<?php echo $row['ProductId'] ?>"><img class="card-img-top" data-toggle="tooltip" data-placement="top" title="Xem chi tiết thú cưng!" name="image" src="<?php echo $row['ImageProduct']; ?>"style="height: 250px;"   alt="image"></a>
                                            <div class="card-body">
                                                <a href="detailProductc.php?id=<?php echo $row['ProductId'] ?>" style="font-size:15px;text-decoration: none;"><?php echo $row['ProductName']; ?></a>

                                                <?php
                                                $idsale = false;
                                                $sql1 = "select * from product p , sale s where  s.SaleId = p.SaleId and ProductId = $id";
                                                $result3 = $conn->query($sql1);
                                                if ($result3->num_rows > 0) {
                                                    while ($row = $result3->fetch_array()) {
                                                        $ids = $row['SaleId'];
                                                    }
                                                }
                                                ?>
                                                <div class="row">
                                                    <?php
                                                    if ($ids >= 1) {
                                                        ?>

                                                        <div class="col-md-8">
                                                            <strike style="color:grey;font-family: serif;" name="price"><?php echo number_format($price) . "đ"; ?></strike>

                                                        </div>
                                                        <?php
                                                    } else {
                                                        if ($ids == 0) {
                                                            ?>
                                                            <div class="col-md-8">
                                                                <span style="color:red;font-family: serif;" name="price"><?php echo number_format($price) . "đ"; ?></span>

                                                            </div> <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION['NameLogin'])) {
                                                        ?>
                                                        <script>
                                                            function addcart1() {
                                                                swal({

                                                                    text: "Thêm giỏ hàng thành công!",
                                                                    icon: "success",

                                                                });
                                                                window.location = "homePage.php";

                                                            }
                                                        </script>
                                                        <?php
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>
                                                    <div class="col-md-4">

                                                        <a onclick="addcart1()" href="addCartProminent.php?id_product=<?php echo $id; ?>&cidb=<?php echo $type; ?>"  data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng!" >
                                                            <i class="fa fa-cart-plus" name="add" aria-hidden="true" style="color: red;font-size: 25px;"></i>
                                                        </a>



                                                    </div>

                                                </div>
                                                <?php
                                                $sql = "select s.SaleId,  (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p , sale s where s.SaleId = p.SaleId  and StatusProduct='Có sẵn' and p.ProductId = $id";
                                                $result2 = $conn->query($sql);
                                                if ($result2->num_rows > 0) {
                                                    while ($row = $result2->fetch_array()) {
                                                        $ids = $row['SaleId'];
                                                        $dp = $row['DecreaseProduct'];
                                                    }
                                                } else {
                                                    echo $conn->error;
                                                }
                                                ?>
                                                <?php
                                                $check = "select * from sale where SaleId = $ids";
                                                $result6 = $conn->query($check);
                                                if ($result6->num_rows > 0) {
                                                    while ($row = $result6->fetch_array()) {
                                                        $date = $row['EndDate'];
                                                    }
                                                }
                                                date_default_timezone_set('Asia/Bangkok');

                                                if (date_default_timezone_get()) {
                                                    'date_default_timezone_set: ' . date_default_timezone_get() . '
';
                                                }
                                                $dateCurrent = date('Y-m-d H:i:s');

                                                $rscheck = strtotime($date) - strtotime($dateCurrent);
                                                // echo $rscheck;
                                                if ($rscheck <= 0) {
                                                    $update = "update product set SaleId ='0' where SaleId=$ids and ProductId = $id and StatusProduct = 'Có sẵn'";
                                                    if ($conn->query($update) == TRUE) {
                                                        // echo "Record updated successfully";
                                                    } else {
                                                        echo "Error updating record: " . $conn->error;
                                                    }
                                                }
                                                ?>
                                                <div class="row">

                                                    <?php
                                                    if ($ids == 0) {
                                                        echo "";
                                                    } else {
                                                        if ($ids >= 1) {
                                                            ?>

                                                            <div class="col-md-12">
                                                                <span style="color:red;font-family: serif;font-size: 18px" name="price"><?php echo number_format($dp) . "đ"; ?></span>


                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            } else {
                                echo $conn->error;
                            }
                            ?>


                        </div>
                    </div>

                </div>
            </form>
        </div>

    </body>
</html>
