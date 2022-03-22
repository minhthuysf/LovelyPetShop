<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<? ob_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Cập nhật loại sản phẩm</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        $id_category = $_GET['id_category'];
        include 'connection.php';
        if (isset($_POST['submit'])) {
            $namec = $_POST['namecategory'];
            $prominent = $_POST['prominent'];
            $query = "update category set CategoryName = '$namec', prominent = '$prominent' where CategoryId = $id_category";
            if ($conn->query($query) == TRUE) {
                echo "Record updated successfully";
                header("location:displayCategory.php");
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        $sql = "select * from category where CategoryId =$id_category";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_array()) {
                $prominent = $row['prominent'];
                ?>
                <div style="background-color:rgb(248,248,248);">
                    <form method="post"  style="padding-top:20px;">

                        <div class="container" style="background-color:white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 style="font-size:30px"><b>Chỉnh sửa loại sản phẩm</b></h2>

                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>


                                        </tr>
                                    </thead>
                                    <?php
                                    ?>
                                    <tbody>

                                        <tr>
                                            <td scope="row">
                                                <label style="margin-right: 10px">Tên loại sản phẩm:</label>

                                                <input type="text"  name="namecategory" value="<?php
                                                if (isset($_POST['namecategory'])) {
                                                    echo $_POST['namecategory'];
                                                } else {
                                                    echo $row['CategoryName'];
                                                }
                                                ?>"></td>
                                        </tr>

                                        <tr>
                                            <td scope="row">
                                                <label  style="margin-right: 80px">Nổi bật:</label>

                                                <select name="prominent">
                                                    <option value="<?php
                                                    if ($prominent == "Có") {
                                                        echo "Không";
                                                    } else {
                                                        echo "Có";
                                                    }
                                                    ?>"><?php
                                                                if ($prominent == "Có") {
                                                                    echo "Có";
                                                                } else {
                                                                    echo "Không";
                                                                }
                                                                ?></option>
                                                    <option value="<?php
                                                    if ($prominent == "Có") {
                                                        echo "Không";
                                                    } else {
                                                        echo "Có";
                                                    }
                                                    ?>"><?php
                                                                if ($prominent == "Có") {
                                                                    echo "Không";
                                                                } else {
                                                                    echo "Có";
                                                                }
                                                                ?></option>
                                                </select>
                                            </td>                           
                                        </tr>
                                        <tr>
                                            <td><button name="submit" style="margin-left: 133px;background-color:#65e5fa;border:none;width:150px;height:50px">Cập nhật</button></td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </form>
                </div>
                <?php
            }
        } else {
            echo $conn->error;
        }
        ?>
        <?php
// put your code here
        ?>
    </body>
</html>
<? ob_flush(); ?>
