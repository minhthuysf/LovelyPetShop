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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Danh sách tài khoản người dùng</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        include 'connection.php';
        $record_per_page = 10;
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * $record_per_page;
        $sql = "select * from customer order by NameLogin LIMIT $start_from,$record_per_page";
        $result1 = $conn->query($sql);
        ?>
    <body>
        <div style="background-color:rgb(248,248,248);">
            <form method="post" style="padding-top:20px;padding-bottom: 20px ">
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Tên đăng nhập</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th> 
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col">Sinh nhật</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Kiểu người dùng</th>
                                    <th scope="col">Thao tác</th>




                                </tr>
                            </thead>
                            <?php
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_array()) {
                                    $status = $row['Status'];
                                    $gender = $row['Gender'];
                                    $namelogin = $row['NameLogin'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $namelogin; ?></th>
                                            <td><?php echo $row['FullName']; ?></td>
                                            <td><?php
                                                if ($gender == 1) {
                                                    echo "Nữ";
                                                }
                                                if ($gender == 0) {
                                                    echo "Nam";
                                                };
                                                ?></td>
                                            <td><?php echo $row['Address']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>                                           
                                            <td><?php echo $row['PhoneNumber']; ?></td>
                                            <td><?php echo $row['Birthday']; ?></td>
                                            <td><?php
                                                if ($status == 1) {
                                                    echo "Hoạt động";
                                                }
                                                if ($status == 0) {
                                                    echo "Không hoạt động";
                                                }
                                                ?></td>
                                            <td><?php echo $row['TypeUser']; ?></td>
                                            <td>

                                                <a href="modifyCustomer.php?namelogin=<?php echo $row['NameLogin']; ?>" style="">Xóa</a>   

                                                <a href="updateCustomer.php?namelogin=<?php echo $row['NameLogin']; ?>" style="">Sửa</a>   

                                            </td>
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
                <div class="container" style="background-color:white;padding-top: 15px">
                <div class="row">
                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                $page_query = "select * from customer order by NameLogin";
                                $page_result = $conn->query($page_query);
                                $total_records = $page_result->num_rows;

                                $total_page = ceil($total_records / $record_per_page);
                                ?>

                                <li class="page-item">
                                    <a class="page-link" href="displayCustomerlist.php?page=<?php
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
                                    ?>"><a class="page-link " href="displayCustomerlist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php } ?>
                                <li class="page-item">
                                    <a class="page-link" href="displayCustomerlist.php?page=<?php echo ($page + 1); ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>

                            </ul>
                        </nav>

                    </div>

                </div>
            </div>

        </div>
            </form>

            
    </body>
</html>
