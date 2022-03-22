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
        <link href="./css/styleheader.css" rel="stylesheet">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>
        <title>Trang Chủ </title>
    </head>  
    <body>
        <?php 
            session_start();
         ?>
        <script>
            function searchFocus() {
                if (document.searchform.find.value == "Tìm kiếm thú cưng") {
                    document.searchform.find.value = '';
                }
            }
            function searchBlur() {
                if (document.searchform.find.value == '') {
                    document.searchform.find.value = "Tìm kiếm thú cưng";
                }
            }

        </script>
        
        <div class="container">
            <div class="row " style="margin-bottom:8px;">
                <div class="col-md-3">

                </div>
                <div class="col-md-9" id="search">
                    <form class="form-inline my-2 my-sm-0" method="post" name="searchform" action='searchProduct.php'>
                        <div class="input-group" id="input-group" style="margin-top: 15px;">
                            <input type="text" onfocus="searchFocus();" onblur="searchBlur();" class="form-control" name="find" value="Tìm kiếm thú cưng" style="width:500px;">
                            <div class="input-group-append">

                                <button class="btn btn-secondary" type="button" >
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>
                        </div> 
                    </form>
                </div> 

            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="background-color: #ccccff  !important;" >
            <a class="navbar-brand" href="homePage.php">
                <img src="images/logowebwesite.png" height="50px" style="width:200px;"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "homePage.php") ? "active" : ""; ?>">
                        <a class="nav-link" href="homePage.php">Trang Chủ<span class="sr-only"></span></a>
                    </li>

                    <li class="nav-item dropdown <?php echo(basename($_SERVER['PHP_SELF']) == "Productd.php") ? "active" : ""; ?>">

                        <a class="nav-link <?php echo(basename($_SERVER['PHP_SELF']) == "detailProductd.php") ? "active" : ""; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chó Cưng
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            include 'connection.php';
                            $query = "select * from category where TypeId='1'";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_array()) {
                                    $id = $row['CategoryId'];
                                    ?>
                                    <a class="dropdown-item" href="Productd.php?cid=<?php echo $id; ?>&"><?php echo $row['CategoryName']; ?></a>

                                    <?php
                                }
                            } else {
                                echo "error" . $conn->error;
                            }
                            ?>
                        </div>
                    </li>

                    <li class="nav-item dropdown <?php echo(basename($_SERVER['PHP_SELF']) == "Productc.php") ? "active" : "";?>">
                        <a class="nav-link <?php echo(basename($_SERVER['PHP_SELF']) == "detailProductc.php") ? "active" : "";?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mèo Cưng
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            include 'connection.php';
                            $query = "select * from category where TypeId='2'";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_array()) {
                                    $id = $row['CategoryId'];
                                    ?>
                                    <a class="dropdown-item" href="Productc.php?cid=<?php echo $id; ?>&"><?php echo $row['CategoryName']; ?></a>

                                    <?php
                                }
                            } else {
                                echo "error" . $conn->error;
                            }
                            ?>

                        </div>
                    </li>


                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "Introduction.php") ? "active" : ""; ?>">
                        <a class="nav-link" href="Introduction.php">Giới Thiệu</a>
                    </li>
                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "knowledgePet.php") ? "active" : ""; ?>">
                        <a class="nav-link" href="knowledgePet.php">Kiến thức về thú cưng</a>
                    </li>
                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "login.php") ? "active" : ""; ?><?php
                    if (isset($_SESSION['NameLogin'])) {
                        echo "dropdown";
                    }
                    ?>" >
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
                            <a class="dropdown-item" href="informationPersonal.php?namelogin=<?php echo $_SESSION['NameLogin']; ?>">
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
                    <li class="nav-item <?php echo(basename($_SERVER['PHP_SELF']) == "detailCart.php") ? "active" : ""; ?>">
                        <button style="background-color: #ccccff;border:none">
                            <a class="nav-link" href="detailCart.php"><i style="color:red;font-size:25px" class="fa fa-shopping-cart"></i><span class="sr-only"></span>
                                Giỏ hàng<span class="badge badge-light"><?php
                                    if (isset($_SESSION['cart'])) {
                                        echo count($_SESSION['cart']);
                                    } else {
                                        echo 0;
                                    }
                                    ?></span>
                            </a>
                        </button>
                    </li>
                </ul>

            </div>
        </nav>
    </body>
</html>
