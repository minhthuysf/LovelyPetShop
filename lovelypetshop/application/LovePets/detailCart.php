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

        <title>Chi tiết giỏ hàng</title>
    </head>
    <style>

    </style>
    <body style="font-family:serif;">
        <?php include 'header.php'; ?>





        <?php
        include 'connection.php';
        $check = "";
        $totalPrice = 0;
        $totalPricedp = 0;
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['cart'])) {
            $arrayId = array();
            foreach ($_SESSION['cart'] as $id_product => $amount) {
                $arrayId[] = $id_product;
            }
            $strId = implode(',', $arrayId);

            $sql = "select * from product where ProductId IN($strId) Order by ProductId DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                ?>

                <div style="background-color:rgb(248,248,248);">
                    <form method="post" style="padding-top:20px;padding-bottom: 20px ">
                        <div class="container" style="background-color:white;">
                            <table class="table">
                                <thead>
                                    <tr style="">
                                        <th scope="row">Chi tiết giỏ hàng</th>

                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = $result->fetch_array()) {


                                    $check = false;
                                    $Price = $row['Price'];

                                    $image = $row['ImageProduct'];
                                    $namep = $row['ProductName'];
                                    $idproduct = $row['ProductId'];
                                    $sql1 = "select (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p ,sale s  where s.SaleId = p.SaleId and s.SaleId>=1 and p.ProductId=$idproduct and ProductId IN ($strId)";
                                    $result1 = $conn->query($sql1);
                                    if ($result1->num_rows > 0) {
                                        while ($row = $result1->fetch_array()) {
                                            $dp = $row['DecreaseProduct'];
                                            $totalPricedp += $dp;

                                            $check = true;
                                        }
                                    }
                                    $sql4 = "select Price from product where ProductId=$idproduct and ProductId IN ($strId) and SaleId='0'";
                                    $result4 = $conn->query($sql4);
                                    if ($result4->num_rows > 0) {
                                        while ($row = $result4->fetch_array()) {
                                            $price = $row['Price'];
                                            $totalPrice += $price;
                                        }
                                    }
                                    ?>

                                    <tbody>

                                        <tr>
                                            <th scope="row"><img src="<?php echo $image; ?>" style="height: 100px;width: 100px"></th>
                                            <td style="padding-top: 45px;"><?php echo $namep; ?></td>

                                            <td style="padding-top: 45px;"><?php
                        if ($check == false) {
                            echo number_format($Price) . "đ";
                        } if ($check == true) {
                                        ?>
                                        <strike><?php echo number_format($Price) . "đ"; ?> </strike>      
                                                    <?php
                                                    echo number_format($dp) . "đ";
                                                }
                                                ?></td>
                                    <td style="padding-top: 45px;"><a href="deleteProductCart.php?id_product=<?php echo $idproduct; ?>" style="text-decoration: none;">Xóa</a></td>

                                    </tr>

                                    </tbody>

            <?php
        }
    } else {
        echo $conn->error;
    }
    // echo $totalPricedp+$totalPrice;
    ?>
                        </table>

                        <table class="table">
                            <thead class="thead-light">
    <?php
    if (!isset($_SESSION['cart'][$id_product])) {
        ?>

                                <div style="background-color:rgb(248,248,248);">
                                    <form method="post" style="padding-top:20px; ">

                                        <div class="container" style="background-color:white; height: 300px;padding-top:20px;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2 style="margin-left:330px;margin-top:50px;color:#13ffff">Không có sản phẩm trong giỏ hàng!</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button style="background-color:#65e5fa;border:none;width:150px;height:50px;margin-left: 490px;margin-top: 35px">
                                                        <a href="homePage.php" style="text-decoration: none;font-size: 22px">Mua hàng</a>
                                                    </button>
                                                </div>
                                            </div>


                                        </div>  
                                    </form>
                                </div>
        <?php
    } else {
        ?>
                                <tr>

                                    <th scope="col"> 
        <?php
        echo "Thành Tiền: " . number_format($totalPrice + $totalPricedp) . "đ";
        ?>

                                    </th>

                                    <th scope="col"><button style="background-color:#65e5fa;border:none;border-radius: 10px;width:150px;height:50px"><a href="billProduct.php?" style="text-decoration:none" value="Mua hàng">Mua hàng</a></button></th>
                                    <th scope="col"><button style="background-color:#65e5fa;border:none;border-radius: 10px;width:150px;height:50px"><a href="deleteProductCart.php?id_product=0" style="text-decoration:none" value="">Xóa hết sản phẩm</a></button></th>
    <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" ><p style="width:100px"></p></th>


                                </tr>

                            </tbody>
                        </table>

                    </div>

                </form>

    <?php
} else {
    ?>

                <?php ?>
                <div style="background-color:rgb(248,248,248);height: 400px">
                    <form method="post" style="padding-top:20px;">

                        <div class="container" style="background-color:white; height: 300px;padding-top:20px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 style="margin-left:330px;margin-top:50px;color:#13ffff">Không có sản phẩm trong giỏ hàng!</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button style="background-color:#65e5fa;border:none;width:150px;height:50px;margin-left: 490px;margin-top: 35px">
                                        <a href="homePage.php" style="text-decoration: none;font-size: 22px">Mua hàng</a>
                                    </button>
                                </div>
                            </div>


                        </div>  
                    </form>
                </div>
    <?php
}
?>

            <?php include 'footer.php'; ?>
    </body>
</html>
