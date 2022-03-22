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

        <title>Danh sách bình luận sản phẩm</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        //$id = $_GET['cid'];
        include 'connection.php';
        $record_per_page = 8;
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post" style="padding-top:20px;padding-bottom: 20px ">
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Bình luận về sản phẩm</h2>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Bình Luận</th>
                                    <th scope="col">Tên Khách hàng</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Thời gian</th>
                                </tr>
                            </thead>
                            <?php
                            include 'connection.php';
                            $start_from = ($page - 1) * $record_per_page;
                            $sql = "select * from comment c, product p where c.ProductId = p.ProductId  order by CommentId DESC LIMIT $start_from,$record_per_page";
                            $result1 = $conn->query($sql);
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_array()) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $row['CommentId']; ?></th>
                                            <td>  <?php echo $row['NameLogin']; ?></td>
                                            <td><?php echo $row['ProductName']; ?></td>
                                            <td><?php echo $row['Content']; ?></td>  
                                            <td><?php echo $row['time']; ?></td>                                  

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

                <div class="row">
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
        <?php
        // put your code here
        ?>
    </body>
</html>
