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

        <title>Cập nhật slideshow</title>
    </head>
    <body style="font-family: serif">
        <?php include 'menuAdmin.php'; ?>
        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $target_path = "imageslide/";
            $target_path = $target_path . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                include 'connection.php';
                $sql = "insert into slideshow(id,FileName) values($id,'$target_path')";
                if ($conn->query($sql) == True) {
                    header("location:slide.php");
                } else {
                    echo "Error: " . $sql . $conn->error;
                }
                $conn - close();
            }
        }
        ?>
        <div style="background-color:rgb(248,248,248);">
            <form method="post" style="padding-top:20px;padding-bottom: 20px " enctype="multipart/form-data">
                <div class="container" style="background-color:white;">
                    <div class="row" >
                        <div class="col-md-6">
                            <h2>Cập nhật slideshow</h2>
                        </div>
                        <div class="col-md-6">
                            <h2>Hiển thị slideshow</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">

                                <tbody>

                                    <tr>
                                        <td>Lựa chọn file</td>
                                        <th scope="row"><input type="file" oninvalid="this.setCustomValidity('Vui lòng chọn hình ảnh!')"
                                                               oninput="setCustomValidity('')" required   name="image"></th>
                                    </tr>
                                    <tr>
                                        <td>Nhập vào id:</td>
                                        <th scope="row"><input type="text"  oninvalid="this.setCustomValidity('Vui lòng nhập vào id!')"
                                                               oninput="setCustomValidity('')" required  name="id"></th>                           
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Cập Nhật" style="background-color:#65e5fa;border:none;width:150px;height:50px;"></input></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Tên hình</th>
                                        <th scope="col">Thao tác</th>

                                    </tr>
                                </thead>
                                <?php
                                include 'connection.php';
                                $sql = "select * from slideshow";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_array()) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><img src="<?php echo $row['FileName']; ?>" style="width: 100px;width: 100px"/></td>


                                                <td style="text-decoration: none">
                                                    <a href="deleteSlide.php?id_slide=<?php echo $row['id']; ?>">Xóa</a>
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
                    <?php
                    include 'connection.php';
                    $sql = mysqli_query($conn, "select * from slideshow");
                    $rowcount = mysqli_num_rows($sql);
                    ?>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            for ($i = 1; $i <= $rowcount; $i++) {
                                $row = mysqli_fetch_array($sql);
                                ?> 
                                <?php
                                if ($i == 1) {
                                    ?>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" height="600px" src="<?php echo $row['FileName']; ?>" alt="First slide">
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" height="600px" src="<?php echo $row['FileName']; ?>" alt="First slide">
                                    </div>
                                    <?php
                                }
                                ?>

                            <?php } ?>


                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class ="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
        </div>
    </form>

</div>


</body>
</html>
<? ob_flush(); ?>
