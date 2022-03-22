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
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Tìm kiếm sản phẩm</title>
    </head>
    <body>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <?php include 'header.php'; ?>
        <?php
        include 'connection.php';
        $record_per_page = 8;
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        ?>
        <?php
        if (isset($_POST['find'])) {
            $find = $_POST['find'];
        } else {
            $find = $_GET['find'];
        }
        $findnew = trim($find);
        $arrFindnew = explode(' ', $findnew);
        $findnew = implode('%', $arrFindnew);
        $findnew = '%' . $findnew . '%';
        include 'connection.php';
        ?>
        <div style="background-color:rgb(248,248,248);" >


            <form method="post" style="padding-top:20px;">

                <div class="container" style="background-color: white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Kết quả tìm kiếm cho từ khóa <?php echo $find; ?></h2>
                        </div>
                    </div>
                    <?php ?>
                    <div class="product-group">
                        <div class="row">
                            <?php
                            $start_from = ($page - 1) * $record_per_page;
                            $sql = "select * from product where ProductName LIKE ('$findnew') and StatusProduct='Có sẵn' order by ProductId DESC LIMIT $start_from,$record_per_page";
                            $result1 = $conn->query($sql);

                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_array()) {
                                    $price = $row['Price'];
                                    $cid = $row['CategoryId'];
                                    $idp = $row['ProductId'];
                                    ?>
                                    <div class="col-md-3 col-sm-6 col-12" >
                                        <div class="card card-product" style="font-size: 20px;margin-top: 8px;margin-bottom: 8px;height: 90%;border:1px solid black;" >
                                            <a href="<?php
                                            if ($cid <= 6) {
                                                echo "detailProductd.php";
                                            } else {
                                                echo "detailProductc.php";
                                            }
                                            ?>?id=<?php echo $row['ProductId'] ?>"><img class="card-img-top" data-toggle="tooltip" data-placement="top" title="Xem chi tiết thú cưng!" name="image" src="<?php echo $row['ImageProduct']; ?>"style="height: 250px;"   alt="image"></a>

                                            <div class="card-body">
                                                <a href="detailProductd.php?id=<?php echo $row['ProductId'] ?>" style="font-size:18px;text-decoration: none;"><?php echo $row['ProductName']; ?></a>


                                                <?php
                                                $idsale = false;
                                                $sql1 = "select * from product p , sale s where  s.SaleId = p.SaleId and ProductId = $idp";
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
                                                                window.location = "searchProduct.php?find=<?php echo $find; ?>";

                                                            }
                                                        </script>
                                                        <?php
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>
                                                    <div class="col-md-4">

                                                        <a onclick="addcart()" href="addCartsearch.php?find=<?php echo $find; ?>&id_product=<?php echo $row['ProductId']; ?>"  data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng!" >
                                                            <i class="fa fa-cart-plus" name="add" aria-hidden="true" style="color: red;font-size: 25px;"></i>
                                                        </a>



                                                    </div>

                                                </div>
                                                <?php
                                                $sql = "select s.SaleId,  (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p , sale s where s.SaleId = p.SaleId  and StatusProduct='Có sẵn' and p.ProductId = $idp and CategoryId=$cid";
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
                                                    $update = "update product set SaleId ='0' where SaleId=$ids and ProductId = $idp and StatusProduct = 'Có sẵn'";
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
                <div class="container" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-md-8">

                        </div>

                        <div class="col-md-4">

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    include 'connection.php';
                                    if (isset($_POST['find'])) {
                                        $find = $_POST['find'];
                                    } else {
                                        $find = $_GET['find'];
                                    }
                                    $findnew = trim($find);
                                    $arrFindnew = explode(' ', $findnew);
                                    $findnew = implode('%', $arrFindnew);
                                    $findnew = '%' . $findnew . '%';

                                    $page_query = "select * from product where ProductName LIKE ('$findnew') order by ProductId DESC";
                                    $page_result = $conn->query($page_query);
                                    $total_records = $page_result->num_rows;

                                    $total_page = ceil($total_records / $record_per_page);
                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="searchProduct.php?find=<?php echo $find; ?>&page=<?php
                                        if ($page == 1) {
                                            echo 1;
                                        } else {
                                            echo ($page - 1);
                                        }
                                        ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                    for ($i = 1; $i <= $total_page; $i++) {
                                        ?>
                                        <li class="page-item <?php
                                        if ($page == $i) {
                                            echo "active";
                                        }
                                        ?>"><a class="page-link " href="searchProduct.php?find=<?php echo $find; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php } ?>
                                    <li class="page-item">
                                        <a class="page-link" href="searchProduct.php?find=<?php echo $find; ?>&page=<?php echo ($page + 1); ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>
</form>
</div>


<?php
include 'footer.php';
?>
</body>
</html>
