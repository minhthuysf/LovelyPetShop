<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
                <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Danh sách mã khuyến mãi</title>
    </head>
    <?php include 'menuAdmin.php'; ?>
    <body style="font-family: serif">
        <?php
        include 'connection.php';
        $sql = "select * from sale";
        $result = $conn->query($sql);
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post" style="padding-top:20px;padding-bottom: 20px ">
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Khuyến mãi</h2>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Khuyến mãi</th>
                                    <th scope="col">Nội dung khuyến mãi</th>
                                    <th scope="col">Ngày Bắt đầu</th>
                                    <th scope="col">Ngày Kết thúc</th>
                                    <th scope="col">Giảm %</th>
                                    <th scope="col">Thao tác</th>

                                </tr>
                            </thead>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    $saleid = $row['SaleId'];
                                    $content = $row['Content'];
                                    $sdate = $row['StartDate'];
                                    $edate = $row['EndDate'];
                                    $dpercent = $row['DecreasePercent'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $saleid; ?></th>
                                            <td>  <?php echo $content; ?></td>
                                            <td><?php echo $sdate; ?></td>
                                            <td><?php echo $edate; ?></td>
                                            <td><?php echo $dpercent; ?></td>                                                                                 
                                            <td style="text-decoration: none">

                                                <a href="modifySaleProduct.php?saleid=<?php echo $saleid; ?>">Sữa</a>

                                            </td>


                                        </tr>

                                    </tbody>
                                <?php }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </form>

            <?php
            // put your code here
            ?>
    </body>
</html>
