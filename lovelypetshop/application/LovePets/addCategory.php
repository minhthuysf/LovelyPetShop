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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Thêm loại sản phẩm</title>
    </head>
    <body style="font-family: serif;">
        <?php include 'menuAdmin.php'; ?>
        <?php
        
//
//        if (isset($_POST['submit'])) {
//            $namec = $_POST['namec'];
//            $type = $_POST['typec'];
//            $prominent = $_POST['prominent'];
//
//
//            if (isset($namec) && isset($type) && isset($prominent)) {
//                $sql = "insert into category(CategoryName,TypeId,prominent)values('$namec','$type','$prominent')";
//                if ($conn->query($sql) == True) {
//                    header("location:displayCategory.php");
//                } else {
//                    echo $conn->error;
//                }
//            }
//        }
//        $conn->close();
        ?>


        <div style="background-color:rgb(248,248,248);">
            <form method="post" action="" style="padding-top:20px;padding-bottom: 20px ">

                <div class="container" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="font-size:30px"><b>Thêm loại sản phẩm</b></h2>

                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>


                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td scope="row">
                                        <label style="margin-right: 15px;">Tên loại sản phẩm:</label>

                                        <input type="text" oninvalid="this.setCustomValidity('Vui lòng nhập tên loại sản phẩm!')"
                                               oninput="setCustomValidity('')" required  name="namec"></td>                           
                                </tr>
                                <tr>
                                    <?php
                                    include 'connection.php';
                                    $query = "select * from producttype";
                                    $result = $conn->query($query);
                                    ?>
                                    <td>
                                        <label style="margin-right: 63px;">Giống loại:</label>

                                        <select name="typec">
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>

                                                    <option value="<?php echo $row['TypeId']; ?>">
                                                        <?php echo $row['TypeName']; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select> 
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <label style="margin-right: 84px;">Nỗi bật:</label>
                                        <select name="prominent">
                                            <option value="Có">Có</option>
                                            <option value="Không">Không</option>
                                        </select>
                                <tr>

                                    <td><button name="submit" style="margin-left: 140px;background-color:#65e5fa;border:none;width:150px;height:50px">Thêm loại sản phẩm</button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </form>
        </div>

        <?php
	if (isset($_POST['namec']) && isset($_POST['typec']) && isset($_POST['prominent'])) {
            $name = $_POST['namec'];
            $type = $_POST['typec'];
            $prominent = $_POST['prominent'];
            


            $url = "http://localhost/LovePets/addProductRest.php?namec="."$name"."&typec="."$type"."&prominent=".$prominent; //url của web service = rest

            $client = curl_init($url);

            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($client);

            $result = json_decode($response, true);
            if ($result != null) {
                header("location:displayCategory.php");
            }
        }
        ?>
    </body>
</html>
<? ob_flush(); ?>