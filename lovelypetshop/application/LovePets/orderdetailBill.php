<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chi tiết hóa đơn</title>
                <link rel="icon" type="image/ico" href="./images/favicon.png"/>

    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post" style="padding-top:20px;padding-bottom: 20px ">
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Chi tiết hóa đơn</h2>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Hóa đơn</th>
                                    <th scope="col">Mã chi tiết hóa đơn</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Hình thức thanh toán</th>
                                    <th scope="col">Giá</th>

                                </tr>
                            </thead>
                            <?php
                            $orderid = $_GET['orderid'];
                            include 'connection.php';
                            $totalPrice=0;
                            $totalPricedp=0;
                            $sql = "select * from orderdetail od , product p where od.ProductId = p.ProductId  and OrderId =$orderid";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    $idc = $row['ProductId'];                                  
                                      $sql = "select  od.OrderId,od.OrderDetailId,p.ProductName,o.PayForm,ImageProduct,Price,p.ProductId from orderproduct o, orderdetail od , product p where  od.ProductId = p.ProductId and o.OrderId = od.OrderId and p.ProductId=$idc and od.OrderId= $orderid";
                            $result1 = $conn->query($sql);
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_array()) {
                                      $check = false;
                                    $payform = $row['PayForm'];
                                    $id = $row['ProductId'];
                                    $namep = $row['ProductName'];
                                    $odp = $row['OrderId'];
                                    $odd = $row['OrderDetailId'];
                                    $Price = $row['Price'];                                
                                    $image = $row['ImageProduct'];
                                    $namep = $row['ProductName'];
                                    
                                    $sql3 = "select (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p,orderdetail od ,sale s  where od.ProductId = p.ProductId and s.SaleId = p.SaleId and p.ProductId = $id and s.SaleId >='1'";
                                    $result3 = $conn->query($sql3);
                                    if ($result3->num_rows > 0) {
                                        while ($row = $result3->fetch_array()) {
                                            $dp = $row['DecreaseProduct'];
                                            
                                            $totalPricedp += $dp;
                                           // echo $totalPricedp;
                                            $check = true;
                                        }
                                    }
                                    else{
                                        echo $conn->error;
                                    }
                                    $sql4 = "select Price from product  where  ProductId=$id and SaleId='0' ";
                                        $result4 = $conn->query($sql4);
                                        if ($result4->num_rows > 0) {
                                            while ($row = $result4->fetch_array()) {
                                                $price = $row['Price'];
                                             // echo $price;
                                                $totalPrice +=$price;
                                            }
                                        }
                                        
                                  
                          
                          
                                }
                            }
                            else{
                                echo $conn->error;
                            }
                            
                            $total = $totalPricedp + $totalPrice;
                          
                         
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $odp; ?></th>
                                            <td>  <?php echo $odd; ?></td>
                                            <td><a href="displayOrderdetailProduct.php?id_product=<?php echo $id; ?>"><?php echo $namep; ?></a></td>
                                            <td><?php
                                                if ($payform == 0) {
                                                    echo "Thanh toán bằng tiền mặt";
                                                }
                                                if ($payform == 1) {
                                                    echo "Thanh toán bằng thẻ ATM";
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($check == false) {
                                                    echo number_format($Price) . "đ";
                                                } if ($check == true) {
                                                    ?>
                                        <strike><?php echo number_format($Price) . "đ"; ?> </strike>      
                                        <?php
                                        echo number_format($dp) . "đ";
                                    }
                                    ?></td>




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
            </form>


        </div>
    </body>
</html>
