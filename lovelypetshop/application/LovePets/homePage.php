<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>
        <title>Trang chủ - Lovely Petshop</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        include 'connection.php';
        $sql = mysqli_query($conn, "select * from slideshow");
        $rowcount = mysqli_num_rows($sql);
        ?>

        <div id="carouselExampleIndicators" class="carousel slide"   data-ride="carousel" style="border-bottom: none;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" >
                <?php
                for ($i = 1; $i <= $rowcount; $i++) {
                    $row = mysqli_fetch_array($sql);
                    ?> 
                    <?php
                    if ($i == 1) {
                        ?>
                        <div class="carousel-item active" >
                            <img class="d-block w-100" width="100%" src="<?php echo $row['FileName']; ?>" alt="First slide">
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" width="100%" src="<?php echo $row['FileName']; ?>" alt="First slide">
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
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
      <?php 
              include 'prominentProduct.php';
      ?>
</body>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</html>
