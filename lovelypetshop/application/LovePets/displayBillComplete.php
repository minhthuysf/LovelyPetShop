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

        <title>Hóa đơn đã hoàn</title>
    </head>
    <body style="font-family: serif">
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


        <?php include 'menuAdmin.php'; ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post" style="padding-top:20px; padding-bottom: 20px">
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Hóa đơn đã hoàn</h2>
                        </div>
                        <div class="col-md-6">
                            <form class="form-inline" action="" method="POST">

                                <div class="input-group" id="input-group"  style="padding-top:5px;padding-bottom: 2px">
                                    <input type="text" class="form-control" name="id" oninvalid="this.setCustomValidity('Vui lòng nhập vào mã hóa đơn!')"
                                           oninput="setCustomValidity('')" required placeholder="Nhập vào mã hóa đơn" style="width:500px;">
                                    <div class="input-group-append">

                                        <button class="btn btn-secondary"  name="submit" >
                                            <i class="fa fa-search"></i>

                                        </button>

                                    </div>
                                </div> 


                            </form>
                        </div>
                    </div>
                    <?php
                    
                    if (isset($_POST['submit'])) { //isset($_POST['id']) && 
                        $id = $_POST['id'];
                        //$name = $_POST['name'];


                        $url = "http://localhost/LovePets/searchBillRest.php?id=" . $id;

                        $client = curl_init($url);

                        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

                        $response = curl_exec($client);

                        $result = json_decode($response, true);

                        //print_r($result);


$display="true";
                        if ($result != null) {
                            ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã HĐ</th>
                                        <th scope="col">Tên KH</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Ngày giao</th>
                                        <th scope="col">Tình Trạng</th>
                                        <th scope="col">Địa chỉ</th> 
                                        <th scope="col">Điện thoại</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach($result as $key) {
                                    $display=true;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $key[0]; ?></th>
                                            <td>  <?php echo $key[5]; ?></td>
                                            <td><?php echo $key[1]; ?></td>
                                            <td><?php echo $key[2]; ?></td>
                                            <td><?php echo $key[3]; ?></td>                                      
                                            <td><?php echo $key[4]; ?></td>                                    
                                            <td><?php echo $key[6]; ?></td>
                                            <td> <?php echo number_format($key[9]) . "đ"; ?></td>

                                            <td>
                                                <a  style="text-decoration: none" href="orderdetailBill.php?orderid=<?php echo $id; ?>">Chi tiết</a>
                                            </td>
                                            <td style="text-decoration: none">


                                            </td>


                                        </tr>

                                    </tbody>
                                <?php } ?>
                            </table>
                            <?php
                          } else {
                            echo "Mã hóa đơn không hợp lệ!";
                        }
                        }
                    
                    
                        ?>
                      <?php
                  
                        ?>
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã HĐ</th>
                                        <th scope="col">Tên KH</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Ngày giao</th>
                                        <th scope="col">Tình Trạng</th>
                                        <th scope="col">Địa chỉ</th> 
                                        <th scope="col">Điện thoại</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <?php
                                include 'connection.php';
                                $start_from = ($page - 1) * $record_per_page;
                                $sql = "select * from orderproduct where  Status='Đã hoàn'  order by OrderId DESC LIMIT $start_from,$record_per_page";
                                $result1 = $conn->query($sql);
                                if ($result1->num_rows > 0) {
                                    while ($row = $result1->fetch_array()) {
                                      //  $price1 = $row['Price'];
                                        $id = $row['OrderId'];
                                        $price = $row['totalMoney'];
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $row['OrderId']; ?></th>
                                                <td>  <?php echo $row['NameLogin']; ?></td>
                                                <td><?php echo $row['OrderDate']; ?></td>
                                                <td><?php echo $row['DateDelivery']; ?></td>
                                                <td><?php echo $row['Status']; ?></td>                                      
                                                <td><?php echo $row['AddressReceive']; ?></td>                                    
                                                <td><?php echo $row['Phone']; ?></td>
                                                <td> <?php echo number_format($price) . "đ"; ?></td>

                                                <td>
                                                    <a  style="text-decoration: none" href="orderdetailBill.php?orderid=<?php echo $id; ?>">Chi tiết</a>
                                                </td>
                                                <td style="text-decoration: none">


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
                    <div class="container" style="background-color:white;">
                        <div class="row" style="padding-top: 15px ">
                            <div class="col-md-8">

                            </div>

                            <div class="col-md-4">

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php
                                        $page_query = "select * from orderproduct where  Status='Đã hoàn'  order by OrderId DESC";
                                        $page_result = $conn->query($page_query);
                                        $total_records = $page_result->num_rows;

                                        $total_page = ceil($total_records / $record_per_page);
                                        ?>

                                        <li class="page-item">
                                            <a class="page-link" href="displayBillComplete.php?page=<?php
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
                                            ?>"><a class="page-link " href="displayBillComplete.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                            <?php } ?>
                                        <li class="page-item">
                                            <a class="page-link" href="displayBillComplete.php?page=<?php echo ($page + 1); ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>

                                    </ul>
                                </nav>

                            </div>

                        </div>
                    </div>
                    <?php  ?>
            </div>
        </form>

</body>
</html>
