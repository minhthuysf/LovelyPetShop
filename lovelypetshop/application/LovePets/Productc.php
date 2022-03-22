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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>

        <title>Mèo cưng - Lovely Petshop</title>
    </head>
    <body style="font-family: serif">
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <?php include 'header.php'; ?>
        <?php
        $id = $_GET['cid'];
        include 'connection.php';
        $record_per_page = 8;
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        ?>



        <div style="background-color:rgb(248,248,248);font-size: 20px;">


            <form method="post" style="padding-top:20px; padding-bottom: 20px">
                <div class="container" style="background-color: white;margin-bottom: 20px">
                    <div class="row" style=" ;margin-bottom: 10px;" >
                        <?php
                        include 'connection.php';
                        $id = $_GET['cid'];
                        $query = "select * from category where CategoryId = $id";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_array()) {
                                $n = $row['CategoryName'];
                                ?>
                                <div  class="col-md-12" >
                                    <p class="list-title" style="font-family: serif;" ><?php
                                        if ($id == 1 && $page == 1) {
                                            ?>
                                        <p>
                                        <h3>Nguồn gốc của Poodle</h3><p>Chó Poodle là giống chó được dùng để săn các loại thủy cầm mà đặc biệt là vịt nên được gọi là chó săn vịt. Trong tiếng Đức, chữ “pudel” có nghĩa là thợ lặn hoặc chó lội nước. Còn trong tiếng Pháp, poodle được gọi là “Caniche”, nghĩa là “chó săn vịt”. Chính vì vậy, người ta gọi chú chó này là chó Poodle. Poodle còn có những tên khác như Caniche, Barbone, Chien Canne, Tea Cup Poodle, French Poodle, Pudle, Teddy Poodle.
                                            Ở Việt Nam, chó Poodle được gọi là chó bút đồ. Chó Poodle ở Việt Nam được nuôi để làm cảnh và hiện tại cũng rất chuộng ở Việt Nam vì sự nhỏ nhắn và dể thương của chúng.</p>
                                        </p>
                                        <h3>Ngoại hình chung của Poodle</h3>
                                        <p>
                                            Nếu bạn nhìn một chú Poodle thì điểm đầu tiên khiến bạn ấn tượng đó là lớp lông chó đơn, dày và xoăn của chúng. Nhìn vào chúng ta có thể thấy ngay ở dòng chó này có một sự nhanh nhẹn mà sang trọng của dòng chó này. Sọ chó hơi tròn và trán cao. Mõm chó thẳng và dài nhưng cũng có dòng mõm ngắn.
                                            Tai chó Poodle gần đầu, to, dài và cụp xuống. Trên tai có lớp lông lượn sóng. Thân hình gọn gàng và chân cũng không quá to. Không quá to ở đây là bạn sẽ thấy 4 chân của dòng chó này cân đối giữa 2 chân trước và sau cũng như so với thân hình của chúng.
                                        </p>
                                        </p>
                                        <?php
                                    }

                                    if ($id == 2 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của chó Pug</h3><p>Chó Pug có nguồn gốc ở Trung Quốc. Đến năm 2007  ở TP.HCM chỉ có 4 con mới nhập về từ Đài Loan để làm giống. Tính đến thời điểm năm 2020, giống chó này đã phát triển nhanh chóng và trở thành một trong những giống chó phổ biến nhất tại Việt Nam.   </p>
                                        <h3>Ngoại hình chung của chó Pug</h3>
                                        <p>
                                            Chó Pug có tầm vóc vừa phải, trọng lượng lúc 12 tháng tuổi đạt 9kg. Đầu tròn, đặc biệt mõm hình khối vuông và rất ngắn so với chiều dài sọ (l,5cm so với llcm). Trên trán có những nếp nhăn sâu. Mắt lồi, tròn, khá lớn và sinh động. Tai lớn nằm lòng thòng xuống dưới, tai khá rộng và dài, vành tai mềm mại giống như nhung.
                                            Cấu trúc cơ thể có dạng hình chữ nhật. Cơ thể là một khối chắc chắn và cơ bắp phát triển tốt. Chân thẳng và mạnh mẽ, cao vai trung bình 30cm. Đuôi khá dài 21cm thuộc kiểu đuôi vòng, thường xoắn qua vùng hông. Bộ lông ngắn, ôm sát thân và mềm mại. Màu sắc lông chỉ một màu: vàng cỏ mơ, màu bạc hoặc màu cà phê sữa nhạt. Riêng ở mõm, tai, vùng mắt màu lông sậm hơn các phần khác của cơ thể.     </p>
                                        </p>
                                        <?php
                                    }
                                    if ($id == 3 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của chó Corgi</h3><p>Giống chó Corgi có lịch sử khá lâu đời. Người ta ước tính, chúng bắt đầu xuất hiện vào khoảng 3000 năm trước tại xứ Wales, Vương quốc Anh. Có khá nhiều giả thuyết được đưa ra về tổ tiên của Corgi, nhưng khả năng cao nhất, có lẽ chúng bắt nguồn từ Vallhunds (một giống chó lùn của Thụy Điển)   </p>
                                        <h3>Ngoại hình chung của chó Corgi</h3>
                                        <p>
                                            Corgi thuần chủng có đặc điểm chung đó là thân dài và 4 chân ngắn. Khác với các giống chó cảnh hiện nay, chân Corgi càng ngắn, thân hình càng dài thì càng đẹp. Theo đó, những bé Corgi có ngực sát đất giá sẽ rất cao. Và dù thân hình có phần hư cấu, mất cân đối thì chúng vẫn luôn được săn đón nhiệt tình.  </p>

                                        <?php
                                    }
                                    if ($id == 4 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của chó Husky</h3><p>Những năm 1908, Chó Husky bắt đầu xuất hiện tại một tiểu bang Mỹ tên Alaska. Và sau đó, chúng trở thành lực lượng chuyên chở chính cùng với giống chó Alaska Malamute bản địa.
                                            Đến năm 1930, Chó Husky được Hiệp hội chó giống Hoa Kỳ (AKC) đặt tên là “Husky Bắc Cực”. Năm 1991, chúng được đổi tên chính thức thành “Husky Sibir”, mang ý nghĩa nguồn gốc từ vùng Siberia.
                                            Ngày nay, khi việc kéo hàng không còn là nhiệm vụ chính, Chó Husky trở thành một trong những thú cưng được ưa chuộng trên thế giới, trong đó có Việt Nam.  </p>
                                        <h3>Ngoại hình chung của chó Husky</h3>
                                        <p>
                                            Về chiều cao, những chú chó Husky có tầm vóc rơi vào khoảng 53cm đến 55cm. Về cân nặng, Husky có thể đạt từ 20kg đến 25kg.
                                            Lưu ý rằng, những chú chó Husky đực sẽ có thân hình to hơn so với con cái. Cụ thể, Husky đực có thể đạt cân nặng lên đến 27kg và cao tới 58cm
                                        </p>
                                        <?php
                                    }
                                    if ($id == 5 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của chó Shiba Inu</h3><p>Shiba Inu là giống cảnh khuyển nhỏ nhất trong sáu giống chó nguyên thủy và riêng biệt của Nhật Bản. Shiba nhanh nhẹn và sống chủ yếu ở miền núi. Chúng là giống chó cổ đại còn tồn tại đến tận ngày này.
                                            Shiba Inu có hình dáng giống với Akita Inu nhưng có kích thước nhỏ hơn. Ngoài ra, Shiba còn được biết đến với cái tên “chó Shiba cười”: Khóe miệng cười của Shiba toát lên vẻ đáng yêu khó cưỡng.
                                        <p>
                                        <h3>Ngoại hình chung của chó Shiba Inu</h3>
                                        Shiba sở hữu thân hình nhỏ bé dễ thương nhưng vô cùng nhanh nhẹn. Chúng là giống cảnh khuyển sống ở miền núi và là giống chó cổ từ xa xưa nên mang những nét ngoại hình dễ nhận biết.
                                        Shiba có kích thước cơ thể bé nhỏ nhưng cơ bắp lại rất săn chắc. Chúng có khung xương không lớn và độ dẻo dai cao. Với mỗi con đực và cái sẽ có sự khác nhau về kích thước trọng lượng cơ thể.
                                        </p>
                                        <?php
                                    }
                                    if ($id == 6 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của chó Golden</h3><p>Chó Golden (Golden Retriever) có nguồn gốc từ Scotland của Anh, thuộc giống chó săn mồi cỡ trung. Golden được lai tạo giữa chó Tweed Water Spaniels, Retriever, Newfoundland, Setteras và Bloodhound… nên có nhiều phẩm chất ưu tú và đã đạt nhiều giải quán quân trong các cuộc tranh tài. Hiện nay, giống chó này đang nằm trong top 5 loài chó cảnh thông minh nhất và được nuôi phổ biến tại Mỹ.   <p>
                                        <h3>Ngoại hình của chó Golden</h3>
                                        <p> 
                                            Thân hình: Cân đối, gọn gàng và khỏe khoắn với ngực rộng, kích thước của Golden cái trưởng thành đạt từ 55 – 57cm, trọng lượng khoảng 27 – 32cm. Chó Golden đực thường cao từ 58 – 61cm, nặng 29 – 34kg.
                                            Phần đầu: Khá to, mũi có màu đen cực thính. Mắt chó Golden to tròn, màu nâu đen, mồm của chúng cực kỳ chắc khỏe, răng sắc bén. Tai Golden khá dài, thường cụp xuống che mất 1/2 má, cổ to.
                                            Phần đuôi: Dài đến khuỷa chân, thường thẳng, không bao giờ cong.
                                            Bộ lông: Dày và rất mềm mượt, có màu vàng kem bắt mắt. Lông chia làm 2 lớp, lớp bên ngoài hơi cứng và dài, còn lớp bên trong ngắn nhưng rất mềm.
                                        </p>
                                        <?php
                                    }
                                    if ($id == 7 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của Mèo Anh Lông Ngắn</h3><p>
                                            Mèo Anh lông ngắn hay còn được gọi tắt là mèo Aln. Có nguồn gốc từ vương quốc Anh với tên gọi quốc tế là British Shorthair. Mèo Anh lông ngắn Aln là giống mèo được ưa chuộng và được nhiều người mua bán nhất không chỉ tại Việt Nam mà còn trên toàn thế giới.
                                        <p>
                                        <h3>Ngoại hình của Mèo Anh Lông Ngắn</h3>
                                        <p> 
                                            Giống mèo Anh lông ngắn có ngoại hình mũm mĩm, dễ thương. Tương đối lười biếng và hầu như ngủ suốt ngày khi chủ đi vắng. Chỉ khi bạn trở về chúng mới lại gần cuộn tròn bên chủ. Vì vậy, chúng khá thích hợp với điều kiện nhà phố, căn hộ chung cư.
                                        </p>
                                        <?php
                                    }
                                    if ($id == 8 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của Mèo Munchkin</h3><p>
                                            Thông tin về lịch sử của những chú mèo Munchkin cho đến nay tìm được đều rất hạn chế. Hầu hết mọi thông tin thu thập được đều cho biết giống mèo chân ngắn là giống mèo tự nhiên xuất hiện từ những năm 1940 ở Hoa Kỳ. Tuy nhiên, giống mèo này sau bị tuyên bố tuyệt chủng tại Hoa Kỳ nhưng được phát hiện ở Nga vào năm 1983.
                                            Loài mèo này được biết đến rộng rãi và nhân giống nuôi như thú cưng vào năm 1991. Mèo Munchkin sau đó đã được Hiệp hội mèo giống quốc tế (TICA), và nhiều hiệp hội mèo lớn khác trên thế giới công nhận là một giống độc lập.                                        <p>
                                        <h3>Ngoại hình của Mèo Munchkin</h3>
                                        <p> 
                                            Ngoại hình: Mèo Munchkin có một tấm lưng khá dài, có thể gấp 2,5 lần so với chiều cao. Trọng lượng khi trưởng thành dao động từ 3 – 3,5kg. Khuôn mặt bầu bĩnh với cặp mắt long lanh, mọi đường nét như: Mắt, mũi, miệng cho đến ria đều rất xinh đẹp, hài hòa – Thiêu cháy mọi ánh nhìn ngay từ lần chạm đầu tiên.
                                            Bộ lông: Mèo Munchkin có một bộ lông ngắn, ôm sát vào cơ thể với màu sắc lông khá đa dạng như: Socola, kem, đen trắng, xám, cam nhạt, Bicolor… Mỗi màu sắc mang đến 1 vẻ đẹp riêng cho mèo Munchkin.                                        
                                        </p>
                                        <?php
                                    }
                                    if ($id == 9 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của Mèo Ba Tư</h3><p>
                                            Ngay từ cái tên đã thể hiện xuất xứ của giống mèo này, mèo Ba Tư có nguồn gốc từ vương quốc Ba Tư cổ đại, ngày nay là đất nước Iran. Giống mèo này được coi là loài mèo bản địa tại Iran, chúng được phát hiện, chăm sóc và nuôi dưỡng bởi người dân Iran từ khá sớm. Về sau này, mèo Ba Tư đã được người Anh mang về quốc gia để nhân giống và kể từ đó, loài mèo Ba Tư phát triển mạnh mẽ, ngày càng trở nên phổ biến ở các nước Châu Âu.

                                            Đặc biệt, vào khoảng thế kỷ XVII, nhờ vẻ ngoài cực kỳ kiêu sa, quyến rũ, mèo Ba Tư còn là một trong những thú cưng yêu thích nhất của nữ hoàng Anh. Hiện nay, thị trường có nhiều chủng loại, giống mèo Ba Tư đến từ khắp nơi trên thế giới. Tuy nhiên, những chú mèo thuần chủng Ba Tư vẫn sở hữu ngoại hình nổi trội và được yêu thích hơn cả. 
                                        </p>
                                        <h3>Ngoại hình của Mèo Ba Tư</h3>
                                        <p> 
                                            Chúng có bộ lông 2 lớp với lớp lông dài phía ngoài và lớp lông ngắn khá dày ở bên trong. Đuôi của chúng luôn xù nên việc chăm sóc cho bộ lông của giống mèo này là một công việc rất quan trọng nhất. Bạn đừng nên nghĩ đến việc mua về một chú mèo loại này nếu như không thể dành cho chúng một khoảng thời gian hàng ngày để chăm sóc bộ lông bằng các loại lược chuyên dụng. Việc chải lông này ít nhất tốn 10 phút, nhưng quan trọng là phải được thực hiện đều đặn hàng ngày.  </p>
                                        <?php
                                    }
                                    if ($id == 10 && $page == 1) {
                                        ?>
                                        <p>
                                        <h3>Nguồn gốc của Mèo Báo Bengal</h3><p>
                                            Xuất hiện vào thế kỷ 19 ở Mỹ, mèo Bengal là kết quả lai chéo giữa mèo nhà Mỹ và mèo báo châu Á. Cái tên “Bengal” lấy họ từ mèo Felis Bengalensis và giống mèo này được phát triển giống những loài mèo hoang, mèo rừng như: Mèo gấm ocelots, báo hoa mai, báo gấm, mèo đốm margays.

                                        </p>
                                        <h3>Ngoại hình của Mèo Báo Bengal</h3>
                                        <p> 
                                            Thân hình: Mèo Bengal có thân hình dài, nhiều cơ bắp và khỏe mạnh, đôi chân nhỏ.
                                            Tai và đuôi: Tai to, dựng đứng, đuôi nhỏ và thon dài.
                                            Phần đầu: Thon nhỏ, cặp mắt to thường có màu xanh ngọc bích và con ngươi màu đen.
                                            Lông: Lông của mèo Bengal ngắn, dày và rất lượt, ít bị rụng. Màu lông giống hệt báo rừng, phổ biến nhất là màu cẩm thạch, màu đen và màu nâu cốm. Một số mèo Bengal có màu silver và màu trắng nhưng hai màu này phải lai tạo với dòng khác hoặc đột biến hệ gen mới có được.
                                        </p>
                                        <?php
                                    }
                                    ?>

                                    </p>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="product-group">
                        <div class="row">


                            <?php
                            $id = $_GET['cid'];
                            $start_from = ($page - 1) * $record_per_page;
                            $sql = "select * from product where CategoryId=$id  and StatusProduct='Có sẵn' order by ProductId DESC LIMIT $start_from,$record_per_page";
                            $result1 = $conn->query($sql);
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_array()) {
                                    $price = $row['Price'];
                                    $idp = $row['ProductId'];
                                    $type = $row['CategoryId'];
                                    ?>


                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="card card-product" style="margin-top: 8px;border:1px solid black;font-size: 20px;margin-bottom: 8px;height: 90%;" >

                                            <a href="detailProductc.php?id=<?php echo $row['ProductId']; ?>"><img class="card-img-top" data-toggle="tooltip" data-placement="top" title="Xem chi tiết thú cưng!" name="image" src="<?php echo $row['ImageProduct']; ?>"style="height: 250px;"   alt="image"></a>

                                            <div class="card-body">
                                                <a href="detailProductc.php?id=<?php echo $row['ProductId']; ?>" style="font-size:18px;text-decoration: none;"><?php echo $row['ProductName']; ?>

                                                </a>
                                                <?php
                                                $idsale = false;
                                                $sql1 = "select * from product p , sale s where  s.SaleId = p.SaleId and ProductId = $idp";
                                                $result3 = $conn->query($sql1);
                                                if ($result3->num_rows > 0) {
                                                    while ($row = $result3->fetch_array()) {
                                                        $ids = $row['SaleId'];
                                                    }
                                                }
                                                ?>

                                                <div class="row">
                                                    <?php
                                                    if ($ids >= 1) {
                                                        ?>

                                                        <div class="col-md-8">
                                                            <strike style="color:grey;font-family: serif;" name="price"><?php echo number_format($price) . "đ"; ?></strike>

                                                        </div>
                                                        <?php
                                                    } else {
                                                        if ($ids == 0) {
                                                            ?>
                                                            <div class="col-md-8">
                                                                <span style="color:red;font-family: serif;" name="price"><?php echo number_format($price) . "đ"; ?></span>

                                                            </div> <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION['NameLogin'])) {
                                                        ?>
                                                        <script>
                                                            function addcart() {
                                                                swal({

                                                                    text: "Thêm giỏ hàng thành công!",
                                                                    icon: "success",

                                                                });
                                                                window.location = "Productc.php?cid=<?php echo $id; ?>";

                                                            }
                                                        </script>
                                                        <?php
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a onclick="addcart()"  href="addCartcidpcat.php?id_product=<?php echo $idp; ?>&cidb=<?php echo $id; ?>"  data-toggle="tooltip" data-placement="top"  title="Thêm vào giỏ hàng!" >
                                                            <i class="fa fa-cart-plus"  aria-hidden="true" style="color: red;font-size: 25px;"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                                <?php
                                                $sql = "select s.SaleId,  (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p , sale s where s.SaleId = p.SaleId  and StatusProduct='Có sẵn' and p.ProductId = $idp and CategoryId=$type";
                                                $result2 = $conn->query($sql);
                                                if ($result2->num_rows > 0) {
                                                    while ($row = $result2->fetch_array()) {
                                                        $ids = $row['SaleId'];
                                                        $dp = $row['DecreaseProduct'];
                                                    }
                                                } else {
                                                    echo $conn->error;
                                                }
                                                ?>
                                                <?php
                                                $check = "select * from sale where SaleId = $ids";
                                                $result6 = $conn->query($check);
                                                if ($result6->num_rows > 0) {
                                                    while ($row = $result6->fetch_array()) {
                                                        $date = $row['EndDate'];
                                                    }
                                                }
                                                date_default_timezone_set('Asia/Bangkok');

                                                if (date_default_timezone_get()) {
                                                    'date_default_timezone_set: ' . date_default_timezone_get() . '
';
                                                }
                                                $dateCurrent = date('Y-m-d H:i:s');

                                                $rscheck = strtotime($date) - strtotime($dateCurrent);
                                                // echo $rscheck;
                                                if ($rscheck <= 0) {
                                                    $update = "update product set SaleId ='0' where SaleId=$ids and ProductId = $idp";
                                                    if ($conn->query($update) == TRUE) {
                                                        // echo "Record updated successfully";
                                                    } else {
                                                        echo "Error updating record: " . $conn->error;
                                                    }
                                                }
                                                ?>
                                                <div class="row">

                                                    <?php
                                                    if ($ids == 0) {
                                                        echo "";
                                                    } else {
                                                        if ($ids >= 1) {
                                                            ?>

                                                            <div class="col-md-12">
                                                                <span style="color:red;font-family: serif;" name="price"><?php echo number_format($dp) . "đ"; ?></span>


                                                            </div>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            } else {
                                echo $conn->error;
                            }
                            ?>


                        </div>

                    </div>
                </div>

                <div class="container" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-md-8">

                        </div>

                        <div class="col-md-4">

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    include 'connection.php';
                                    $id = $_GET['cid'];

                                    $page_query = "select * from product  where CategoryId=$id order by ProductId DESC";
                                    $page_result = $conn->query($page_query);
                                    $total_records = $page_result->num_rows;

                                    $total_page = ceil($total_records / $record_per_page);
                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="Productc.php?cid=<?php echo $id; ?>&page=<?php
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
                                        ?>"><a class="page-link " href="Productc.php?cid=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php } ?>
                                    <li class="page-item">
                                        <a class="page-link" href="Productc.php?cid=<?php echo $id; ?>&page=<?php echo ($page + 1); ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>
            </form>
        </div>



        <?php
        include 'footer.php';
        ?>
    </body>
</html>
