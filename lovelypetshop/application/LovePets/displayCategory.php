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

        <title>Loại sản phẩm</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        include 'connection.php';
        $record_per_page = 8;
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * $record_per_page;
        $sql = "select * from category order by CategoryId DESC LIMIT $start_from,$record_per_page";
        $result1 = $conn->query($sql);
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post" style="padding-top:20px; ">
                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Danh sách loại sản phẩm</h2>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Mã loại</th>
                                    <th scope="col">Tên loại sản phẩm</th>
                                    <th scope="col">Giống loại</th>
                                    <th scope="col">Nổi bật</th>
                                    <th scope="col">Thao tác</th>




                                </tr>
                            </thead>
                            <?php
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_array()) {
                                    $id = $row['CategoryId'];
                                   // $price = $row['Price'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $row['CategoryId']; ?></th>
                                            <td><?php echo $row['CategoryName']; ?></td>
                                            <td><?php echo $row['TypeId']; ?></td>
                                            <td>

                                                <?php echo $row['prominent']; ?>
                                            </td>
                                            <td style="text-decoration: none">

                                                <a href="deleteCategory.php?id_category=<?php echo $id; ?>">Xóa</a>
                                                <a href="modifyCategory.php?id_category=<?php echo $id; ?>">Sửa</a>

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
            </form>

            <div class="container" style="background-color:white;padding-bottom: 20px ">
                <div class="row">
                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                $page_query = "select * from category order by CategoryId DESC";
                                $page_result = $conn->query($page_query);
                                $total_records = $page_result->num_rows;

                                $total_page = ceil($total_records / $record_per_page);
                                ?>

                                <li class="page-item">
                                    <a class="page-link" href="displayCategory.php?page=<?php
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
                                    ?>"><a class="page-link " href="displayCategory.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php } ?>
                                <li class="page-item">
                                    <a class="page-link" href="displayCategory.php?page=<?php echo ($page + 1); ?>" aria-label="Next">
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
