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

        <title>Chi tiết mèo cưng</title>
    </head>
    <body>

        <?php
        if (isset($_POST['addcart'])) {
            print_r($_POST['ProductId']);
        }
        ?>


        <?php include 'header.php'; ?>
        <?php
        include 'connection.php';
        $id = $_GET['id'];



        $query = "select * from product where ProductId=$id";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $name = $row['ProductName'];
                $image = $row['ImageProduct'];
                $Price = $row['Price'];
                $Describe = $row['Description'];
               // $status = $row['Status'];
                $realname = $row['RealName'];
                $status = $row['StatusProduct'];
                $id = $row['ProductId'];
                $cid = $row['CategoryId'];
            }
        } else {
            echo $conn->error;
        }
        $conn->close();
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="POST" style="padding-top:20px; ">

                <div class="container" style="background-color: white;height: 100%; font-size: 20px;font-family: serif">
                    <div class="row " style="height: 20px;">
                        <div class="col-md-12">
                            <h2 name='realname' style="padding-top:10px;">Mô tả về <?php echo $realname; ?></h2>
                        </div>

                    </div>
                    <div class="row mt-5">

                        <div class="col-md-4">
                            <img src="<?php echo $image; ?>" name="imageP" height="350px" width="100%" style="border:1px solid black"/>
                        </div>
                        <div class="col-md-8"style="">
                            <div class="row">
                                <div class="col-12">

                                </div>
                                <div class="col-12" style="">
                                    <p name="Item_Name"><?php echo $name; ?></p>
                                </div>
                                <div class="col-12" >
                                    <p>
                                        <?php echo $Describe; ?>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p>Trình trạng: <?php echo $status; ?></p>
                                </div>                           
                              <?php
                                $idsale = false;
                                $id = $_GET['id'];

                                include 'connection.php';
                                $sql1 = "select * from product p , sale s where  s.SaleId = p.SaleId and ProductId = $id";
                                $result3 = $conn->query($sql1);
                                if ($result3->num_rows > 0) {
                                    while ($row = $result3->fetch_array()) {
                                        $ids = $row['SaleId'];
                                    }
                                }
                                ?>


                                <?php
                                if ($ids >= 1) {
                                    ?>

                                    <div class="col-md-12">
                                        <strike style="color:grey;font-family: serif;" name="price"><?php echo "Giá:" . number_format($Price) . "đ"; ?></strike>

                                    </div>
                                    <?php
                                } else {
                                    if ($ids == 0) {
                                        ?>
                                        <div class="col-md-12">
                                            <span style="color:red;font-family: serif;" name="price"><?php echo "Giá:" . number_format($Price) . "đ"; ?></span>

                                        </div> <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            $sql = "select s.SaleId,  (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p , sale s where s.SaleId = p.SaleId  and StatusProduct='Có sẵn' and p.ProductId = $id and CategoryId=$cid";
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
                            <div class="row">

                                <?php
                                if ($ids == 0) {
                                    echo "";
                                } else {
                                    if ($ids >= 1) {
                                        ?>

                                        <div class="col-md-12">
                                            <span style="color:red;font-family: serif;" name="price"><?php echo "Giá:" . number_format($dp) . "đ"; ?></span>


                                        </div>
                                    <?php
                                    }
                                }
                                ?>
                             
                            </div>
                            <button type="submit" style="background-color:#65e5fa;border:none;width:200px;height:50px;">



                                <a href = "buyNow.php?id_product=<?php echo $id; ?>" name = "buy" style="text-decoration: none;">Mua ngay</a>

                            </button>

                        </div>
                    </div>
                    <div class="row mt-5" >
                        <div class="col-md-12">
                            <h2>Một số hình ảnh của <?php echo $realname; ?></h2>

                        </div>
                    </div>

                    <div class="row mt-3">                   
                        <div class="product-group">
                            <div class="row" style="padding-top: 5px;margin-left: 5px;margin-right: 5px;">
                                <?php
                                include 'connection.php';
                                $id = $_GET['id'];
                                $sql = "select * from imageproduct where ProductId=$id";
                                $result1 = $conn->query($sql);
                                if ($result1->num_rows > 0) {
                                    while ($row = $result1->fetch_array()) {
                                        ?>     

                                        <div class="col-md-12">
                                            <div class="card card-image">
                                                <img class="card-img-top" src="<?php echo $row['FileName']; ?>"  style="height: 100%;width:100%"  alt="Card image cap">
                                                <div class="card-body">
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
                    <div class="container" style="margin-bottom: 20px;margin-top: 15px;border: 2px solid rgb(248,248,248)">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="">
                                    <h2>Bình luận</h2>
                                </div>
                            </div>                       
                        </div>
                        <?php
                        $select = "select * from comment where ProductId = $id order by time desc";
                        $result = $conn->query($select);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>                              
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="border: 1px solid rgb(248,248,248);margin-bottom: 5px">
                                            <b><?php echo $row['NameLogin'] . ": "; ?></b><?php echo $row['Content']; ?>
                                        </div>
                                    </div>                       
                                </div>
                                
                                <?php
                            }
                        } else {
                            echo $conn->error;
                        }
                        ?>
                   
                        <?php
                        if (isset($_POST['sendReview'])) {
                            $comment = $_POST['comment'];
                            $name = $_SESSION['NameLogin'];
                            $id = $_GET['id'];
                            if (isset($comment)) {
                                if (isset($_SESSION['NameLogin'])) {
                                    $insert = "insert into comment(Content,NameLogin,ProductId) values('$comment','$name','$id')";
                                    if ($conn->query($insert) == True) {

                                        header("location:detailProductc.php?id=$id");
                                    } else {
                                        echo "Error: " . $sql . $conn->error;
                                    }
                                } else {
                                    header("location:login.php");
                                }
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 10px">
                                    <textarea style="width: 70%" name="comment" oninvalid="this.setCustomValidity('Vui lòng nhập vào bình luận!')"
                                                           oninput="setCustomValidity('')" required ></textarea>
                                </div>   
                            </div>
                            <div class="row" style="margin-top: 10px;padding-bottom: 10px">
                                <div class="col-md-12" >
                                    <input type="submit" name="sendReview" value="Gửi" style="background-color:#65e5fa;border:none;width:100px;"/>
                                </div>   
                            </div>
                        </form>
                    </div>

            </form>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
<? ob_flush(); ?>

