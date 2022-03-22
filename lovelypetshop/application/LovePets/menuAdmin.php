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
        <link href="./css/styleHeader.css" rel="stylesheet">

        <title></title>
    </head>
    <body>
        <?php session_start(); ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="background-color: #ccccff  !important;" >
            <a class="navbar-brand" href="#">
                <img src="images/logowebwesite.png" height="50px" style="width:200px;"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "homePageAdmin.php") ? "active" : ""; ?>">
                        <a class="nav-link" href="homePageAdmin.php">Trang Chủ<span class="sr-only"></span></a>
                    </li>

                    <li class="nav-item dropdown <?php echo(basename($_SERVER['PHP_SELF']) == "displayProduct.php" || basename($_SERVER['PHP_SELF']) == "addProduct.php" || basename($_SERVER['PHP_SELF']) == "imageDesProduct.php" || basename($_SERVER['PHP_SELF']) == "commentProduct.php" || basename($_SERVER['PHP_SELF']) == "searchProductModify.php" || basename($_SERVER['PHP_SELF']) == "modifyProduct.php"|| basename($_SERVER['PHP_SELF'])=="saleProduct.php"|| basename($_SERVER['PHP_SELF'])=="addSaleProduct.php") ? "active" : ""; ?>">

                        <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quản lý sản phẩm
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="displayProduct.php">Xem,chỉnh sửa,xóa sản phẩm</a>
                            <a class="dropdown-item" href="addProduct.php">Thêm sản phẩm</a>
                            <a class="dropdown-item" href="imageDesProduct.php">Thêm hình sản phẩm</a>
                            <a class="dropdown-item" href="commentProduct.php">Bình luận của khách hàng</a>
                            <a class="dropdown-item" href="saleProduct.php">Mã khuyến mãi</a>
                            <a class="dropdown-item" href="addSaleProduct.php">Thêm mã khuyến mãi</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown <?php echo(basename($_SERVER['PHP_SELF']) == "displayCategory.php" || basename($_SERVER['PHP_SELF']) == "modifyCategory.php" || basename($_SERVER['PHP_SELF']) == "addCategory.php") ? "active" : ""; ?>">

                        <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quản lý loại sản phẩm
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="displayCategory.php">Xem,chỉnh sửa,xóa loại sản phẩm</a>
                            <a class="dropdown-item" href="addCategory.php">Thêm loại sản phẩm</a>


                        </div>
                    </li>
                    <li class="nav-item dropdown <?php echo(basename($_SERVER['PHP_SELF']) == "displayBill.php" || basename($_SERVER['PHP_SELF'])=="orderdetailBill.php"|| basename($_SERVER['PHP_SELF']) == "displayBillComplete.php" || basename($_SERVER['PHP_SELF']) == "updateBill.php" ) ? "active" : ""; ?>">

                        <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quản lý hóa đơn
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="displayBill.php">Hóa đơn chưa hoàn</a>
                            <a class="dropdown-item" href="displayBillComplete.php">Hóa đơn đã hoàn</a>


                        </div>
                    </li>
                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "displayCustomerlist.php"|| basename($_SERVER['PHP_SELF'])=="updateCustomer.php") ? "active" : ""; ?>">
                        <a class="nav-link" href="displayCustomerlist.php">Quản lý tài khoản<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "slide.php") ? "active" : ""; ?>">
                        <a class="nav-link" href="slide.php">SlideShow<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item <?php
                    if (isset($_SESSION['NameLogin'])) {
                        echo "dropdown";
                    }
                    ?> "<?php echo(basename($_SERVER['PHP_SELF']) == "personalAdmin.php") ? "active" : ""; ?> >
                        <a class="nav-link <?php
                        if (isset($_SESSION['NameLogin'])) {
                            echo "dropdown-toggle";
                        }
                        ?>" href="<?php
                           if (isset($_SESSION['NameLogin'])) {
                               echo "";
                           } else {
                               echo "login.php";
                           }
                           ?>
                           " id="navbarDropdown" role="button" data-toggle="<?php
                           if (isset($_SESSION['NameLogin'])) {
                               echo "dropdown";
                           } else {
                               echo "";
                           }
                           ?>" aria-haspopup="true" aria-expanded="false">
                               <?php
                               if (isset($_SESSION['NameLogin'])) {
                                   echo $_SESSION['NameLogin'];
                               } else {
                                   echo "Đăng Nhập";
                               }
                               ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="personalAdmin.php?namelogin=<?php echo $_SESSION['NameLogin']; ?>">
                                <?php
                                if (isset($_SESSION['NameLogin'])) {
                                    echo "Thông tin tài khoản";
                                } else {
                                    echo "";
                                }
                                ?>
                            </a>
                            <a class="dropdown-item" href="logout.php">
                                <?php
                                if (isset($_SESSION['NameLogin'])) {
                                    echo "Đăng xuất";
                                } else {
                                    echo "";
                                }
                                ?>
                            </a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>

        <?php
// put your code here
        ?>
    </body>
</html>
