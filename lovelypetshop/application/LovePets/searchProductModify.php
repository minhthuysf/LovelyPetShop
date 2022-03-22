<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'lib/nusoap.php';
$client = new nusoap_client("http://localhost/LovePets/server.php?wsdl");
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

        <title></title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
//        if (isset($_POST['find'])) {
//            $find = $_POST['find'];
//        } else {
//            $find = $_GET['find'];
//        }
//        $findnew = trim($find);
//        $arrFindnew = explode(' ', $findnew);
//        $findnew = implode('%', $arrFindnew);
//        $findnew = '%' . $findnew . '%';
//        include 'connection.php';
        ?>
        <?php
//        include 'connection.php';
//        $record_per_page = 20;
//        $page = '';
//        if (isset($_GET['page'])) {
//            $page = $_GET['page'];
//        } else {
//            $page = 1;
//        }
//        $start_from = ($page - 1) * $record_per_page;
//        $sql = "select * from product where ProductName LIKE ('$findnew') order by ProductId DESC LIMIT $start_from,$record_per_page";
//        $result1 = $conn->query($sql);
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $response = $client->call('getUserByName', array("name" => $name));
            //  $response = $client->call('getUserByID', array("id" => $id,"name"=>$name));

            $result = json_decode($response, true);

            if ($result != null) {
                ?>

                <div style="background-color:rgb(248,248,248);">
                    <form method="post" style="padding-top:20px; ">
                        <div class="container" style="background-color:white;">

                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Danh sách sản phẩm</h2>
                                </div>
                                <div class="col-md-6">
                                    <?php include 'search.php'; ?>
                                </div>
                            </div>
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
//                            if ($result1->num_rows > 0) {
//                                while ($row = $result1->fetch_array()) {
//                                    $id = $row['ProductId'];
//                                    $price = $row['Price'];
                                    foreach ($result as $key) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $key[0] ?></th>
                                                <td><img src="<?php echo $key[6] ?>" style="width: 100px;width: 100px"/></td>
                                                <td><?php echo $key[1] ?></td>
                                                <td><?php echo $key[3] ?></td>
                                                <td><?php echo $key[5] ?></td>
                                                <td><?php echo $key[2] ?></td>
                                                <td><?php echo $key[8] ?></td>
                                                <td><?php echo $key[9] ?></td>
                                                <td><?php echo $key[7] ?></td>

                                                <td style="text-decoration: none">

                                                    <a href="deleteProduct.php?id_product=<?php echo $id; ?>">Xóa</a>
                                                    <a href="modifyProduct.php?id_product=<?php echo $row['ProductId']; ?>">Sửa</a>

                                                </td>


                                            </tr>

                                        </tbody>
                                    <?php } ?>
                                    <?php
//                                }
//                            } else {
//                                echo $conn->error;
//                            }
                                    ?>
                                </table>
                                <?php
                            } else {
                                echo "there ins't data!";
                            }
                        }
                        ?>
                    </div>
                </div>
            </form>

            <div class="container" style="background-color:white;">
                <div class="row">
                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
//                                include 'connection.php';
//                                if (isset($_POST['find'])) {
//                                    $find = $_POST['find'];
//                                } else {
//                                    $find = $_GET['find'];
//                                }
//                                $findnew = trim($find);
//                                $arrFindnew = explode(' ', $findnew);
//                                $findnew = implode('%', $arrFindnew);
//                                $findnew = '%' . $findnew . '%';
//
//                                $page_query = "select * from product where ProductName LIKE ('$findnew') order by ProductId DESC";
//                                $page_result = $conn->query($page_query);
//                                $total_records = $page_result->num_rows;
//
//                                $total_page = ceil($total_records / $record_per_page);
//                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="searchProductModify.php?find=//<?php echo $find; ?>&page=<?php
//                                    if ($page == 1) {
//                                        echo 1;
//                                    } else {
//                                        echo ($page - 1);
//                                    }
                                    ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                               // for ($i = 1; $i <= $total_page; $i++) {
                                    ?>
                                    <li class="page-item <?php
//                                    if ($page == $i) {
//                                        echo "active";
//                                    }
                                    ?>"><a class="page-link " href="searchProductModify.php?find=<?php echo $find; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php //} ?>
                                <li class="page-item">
                                    <a class="page-link" href="searchProductModify.php?find=<?php echo $find; ?>&page=<?php echo ($page + 1); ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>

                            </ul>
                        </nav>

                    </div>

                </div>
            </div>

        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
