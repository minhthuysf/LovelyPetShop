<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//require 'lib/nusoap.php';
//$client = new nusoap_client("http://localhost/soap/server.php?wsdl");
?>
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
        <title>Danh sách sản phẩm</title>
    </head>
    <body style="font-family: serif">




        <?php include 'menuAdmin.php'; ?>
        <?php
        include 'connection.php';
        $record_per_page = 20;
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * $record_per_page;
        $sql = "select * from product order by ProductId DESC LIMIT $start_from,$record_per_page";
        $result1 = $conn->query($sql);
        ?>

        <div style="background-color:rgb(248,248,248);">
            <div style="padding-top:20px; ">


               <div class="container" style="background-color:white;">
                  <!--   <div class="row">
                        <div class="col-md-6">
                            <h2>Danh sách sản phẩm</h2>
                        </div>
                        <div class="col-md-6">
                            <form class="form-inline" action="" method="POST">

                                <div class="input-group" id="input-group"  style="padding-top:5px;padding-bottom: 2px">
                                    <input type="text" class="form-control" name="name" oninvalid="this.setCustomValidity('Vui lòng nhập vào từ khóa!')"
                                           oninput="setCustomValidity('')" required placeholder="Tìm kiếm sản phẩm" style="width:500px;">
                                    <div class="input-group-append">

                                        <button class="btn btn-secondary"  name="submit" >
                                            <i class="fa fa-search"></i>

                                        </button>

                                    </div>
                                </div> 


                            </form>
                        </div>
                    </div> -->

                    <?php
                    /*if (isset($_POST['submit'])) {
                        $show =true;
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $response = $client->call('getUserByName', array("name" => $name));
                        //  $response = $client->call('getUserByID', array("id" => $id,"name"=>$name));

                        $result = json_decode($response, true);

                        if ($result != null) {
                            $display = true;
                            ?>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã SP</th>
                                        <th scope="col">Hình SP</th>
                                        <th scope="col">Tên SP</th>
                                        <th scope="col">Miêu tả</th>
                                        <th scope="col">Tên thật</th> 
                                        <th scope="col">Giá SP</th>
                                        <th scope="col">Loại SP</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col">Mã KM</th>
                                        <th scope="col">Thao tác</th>

                                    </tr>
                                </thead>
                                <?php foreach ($result as $key) { ?>

                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $key[0]; ?></th>
                                            <td><img src="<?php echo $key[6];
                                    ?>" style="width: 100px;width: 100px"/></td>
                                            <td><?php
                                                echo $key[1];
                                                ?></td>
                                            <td><?php
                                                echo $key[3];
                                                ?></td>
                                            <td><?php
                                                echo $key[4];
                                                ?></td>
                                            <td><?php
                                                echo number_format($key[2]) . "đ";
                                                ?></td>
                                            <td><?php
                                                echo $key[8];
                                                ?></td>
                                            <td><?php
                                                echo $key[9];
                                                ?></td>
                                            <td><?php
                                                echo $key[7];
                                                ?></td>
                                            <td style="text-decoration: none">

                                                <a href="deleteProduct.php?id_product=<?php echo $key[0]; ?>">Xóa</a>
                                                <a href="modifyProduct.php?id_product=<?php echo $key[0]; ?>">Sửa</a>

                                            </td>
                                        </tr>



                                    </tbody>
                                <?php } ?>

                            </table>
                            <?php
                        } else  {
                           
                            echo "Không có sản phẩm!";
                        }
                    }
                    ?>
                    <?php
                    if ($display == true) {
                        echo "";
                        
                    } 
                    else {*/
                        
                        ?>
                        <div class="row">
                            <table class="table table-hover">
                                <thead>  
                                    <tr>
                                        <th scope="col">Mã SP</th>
                                        <th scope="col">Hình SP</th>
                                        <th scope="col">Tên SP</th>
                                        <th scope="col">Miêu tả</th>
                                        <th scope="col">Tên thật</th> 
                                        <th scope="col">Giá SP</th>
                                        <th scope="col">Loại SP</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col">Mã KM</th>
                                        <th scope="col">Thao tác</th>


                                    </tr>
                                </thead>
    <?php
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_array()) {
            $id = $row['ProductId'];
            $price = $row['Price'];
            $image = $row['ImageProduct'];
            ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $row['ProductId']; ?></th>
                                                <td><img src="<?php echo $row['ImageProduct']; ?>" style="width: 100px;width: 100px"/></td>
                                                <td><?php echo $row['ProductName']; ?></td>
                                                <td><?php echo $row['Description']; ?></td>
                                                <td><?php echo $row['RealName']; ?></td>
                                                <td><?php echo number_format($price) . "đ"; ?></td>
                                                <td><?php echo $row['CategoryId']; ?></td>
                                                <td><?php echo $row['StatusProduct']; ?></td>
                                                <td><?php echo $row['SaleId']; ?></td>

                                                <td style="text-decoration: none">

                                                    <a href="deleteProduct.php?id_product=<?php echo $id; ?>">Xóa</a>
                                                    <a href="modifyProduct.php?id_product=<?php echo $row['ProductId']; ?>">Sửa</a>

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
                </div>

                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-8">

                        </div>

                        <div class="col-md-4">

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
    <?php
    $page_query = "select * from product order by ProductId DESC";
    $page_result = $conn->query($page_query);
    $total_records = $page_result->num_rows;

    $total_page = ceil($total_records / $record_per_page);
    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="displayProduct.php?page=<?php
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
                                        ?>"><a class="page-link " href="displayProduct.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php } ?>
                                    <li class="page-item">
                                        <a class="page-link" href="displayProduct.php?page=<?php echo ($page + 1); ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>

                        </div>
<?php //} ?>
                </div>
            </div>
    </body>
</html>

