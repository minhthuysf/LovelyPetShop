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

        <title>Trang chủ admin</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>

    
        <?php
        include 'connection.php';

        $checkC = "select count(*) as 'tatolCustomer' from customer where Status='1'";
        $resultC = $conn->query($checkC);
        if ($resultC->num_rows > 0) {
            while ($row = $resultC->fetch_array()) {
                $totalCustomer = $row['tatolCustomer'];
            }
        }
                ?>
                <?php
                include 'connection.php';

                $sql4 = "select count(*) as 'pd' from orderproduct o, orderdetail od  where o.OrderId = od.OrderId and   Status ='Đã hoàn' ";
                $result4 = $conn->query($sql4);
                if ($result4->num_rows > 0) {
                    while ($row = $result4->fetch_array()) {
                        $pd = $row['pd'];
                    }
                } else {
                    echo $conn->error;
                }
                ?>
                <?php
                include 'connection.php';

                $sql = "select count(*) as'amount', MONTH(OrderDate) as month, Year(OrderDate) as year from orderproduct  where Status ='Đã hoàn' GROUP by month(OrderDate)";
                $result = $conn->query($sql);
                ?>             
                <div style="background-color:rgb(248,248,248);">
                    <form method="post" style="padding-top:20px;padding-bottom: 20px ">
                        <div class="container" style="background-color: white;margin-top: 15px;margin-bottom: 15px;padding-bottom: 15px;padding-top: 15px;padding-left: 25px">
                            <div class="row">


                               

                                <div class="col-md-2" style="font-size: 18px;text-align: center;padding-top: 10px;background-color:#e4ffff;border:none;width:100px;height:50px;margin-left: 10px">
                                    <?php echo "Có " . $totalCustomer . " tài khoản"; ?>

                                </div>
                                <div class="col-md-4" style="font-size: 18px;text-align: center;padding-top: 10px;background-color:#e4ffff;border:none;height:50px;margin-left: 10px">
                                    <?php echo "Có tổng " . $pd . " sản phẩm đã bán"; ?>

                                </div>
                            </div>
                        </div>
                        <div class="container" style="background-color:white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 style="">Doanh thu theo tháng</h2>
                                </div>
                            </div>
                            <?php
                            include 'connection.php';

                            $sql1 = "select  MONTH(OrderDate) as montht, Year(OrderDate) as year,sum(totalMoney) as'totalM',count(OrderId) as 'odi' from orderproduct where  Status ='Đã hoàn' GROUP by month(OrderDate)";
                            $result1 = $conn->query($sql1);
                            ?>




                            <div class="row">
                                <table class="table table-hover" >
                                    <thead>
                                        <tr>
                                            <th scope="col">Tháng</th>
                                            <th scope="col">Tổng hóa đơn</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Năm</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if ($result1->num_rows > 0) {
                                        while ($row = $result1->fetch_array()) {
                                            $totalMoney = $row['totalM'];
                                            $month1 = $row['montht'];
                                            $amount = $row['odi'];
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><?php echo $month1; ?></th>
                                                    <td><?php echo $amount; ?></td>
                                                    <td><?php echo number_format($totalMoney) . "đ"; ?></td>
                                                    <td><?php echo $row['year']; ?></td>

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



    </form>



</div>
</body>
</html>
