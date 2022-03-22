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

        <title>Mua hàng</title>
        <script>
            function getCity() {
                var url;
                var id;
                id = document.getElementById("data").value;
                //alert(id);
                url = 'displayCity.php?city=' + id;

                //setupAjax (url);



                if (window.XMLHttpRequest) {
                    // Code for modern browsers
                    request = new XMLHttpRequest();
                } else {
                    // code for older versions of Internet Explorer
                    request = new ActiveXObject("Microsoft.XMLHTTP");
                }

                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        //alert(this.responseText);
                        //document.getElementById ("data").innerHTML = this.responseText;			
                        var text = "";
                        var elements;
                        var name;
                        var id;

                        elements = request.responseXML.documentElement.getElementsByTagName("city");

                        text = "<option value='' selected disabled hidden>Chọn Quận/Huyện</option>"
                        for (i = 0; i < elements.length; i++) {
                            id = elements[i].getElementsByTagName("id");
                            name = elements[i].getElementsByTagName("name");
                            text += "<option value='" + id[0].firstChild.nodeValue + "'>" + name[0].firstChild.nodeValue + "</option>";
                        }
                        document.getElementById("district").innerHTML = text;
                    }
                }

                request.open("GET", url, true);
                request.send();
            }

            function getDistrict() {
//                   var url;
                var id;
                id = document.getElementById("district").value;
                //  alert(id);
                url = 'displayDistrict.php?city=' + id;

                //setupAjax (url);



                if (window.XMLHttpRequest) {
                    // Code for modern browsers
                    request = new XMLHttpRequest();
                } else {
                    // code for older versions of Internet Explorer
                    request = new ActiveXObject("Microsoft.XMLHTTP");
                }

                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        // alert(this.responseText);
                        //document.getElementById ("data").innerHTML = this.responseText;			
                        var text = "";
                        var elements;
                        var name;

                        elements = request.responseXML.documentElement.getElementsByTagName("city");
                        text = "<option value='' selected disabled hidden>Chọn Phường/Xã</option>"
                        for (i = 0; i < elements.length; i++) {

                            name = elements[i].getElementsByTagName("name");
                            text += "<option>" + name[0].firstChild.nodeValue + "</option>";
                        }
                        document.getElementById("wards").innerHTML = text;
                    }
                }

                request.open("GET", url, true);
                request.send();
            }

        </script>
    </head>
    <body style="font-family: serif;font-size: 18px">

        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        ?>
        <?php include 'header.php'; ?>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        include 'connection.php';
        ?>
        <?php
        if (isset($_SESSION['cart'])) {
            $arrayId = array();
            foreach ($_SESSION['cart'] as $id_product => $amount) {
                $arrayId[] = $id_product;
            }
            $strId = implode(',', $arrayId);

            $sql = "select * from product where ProductId IN($strId) Order by ProductId DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                ?>
                <div style="background-color:rgb(248,248,248);">
                    <form method="post" style="padding-top:20px;padding-bottom: 20px " id="mainForm">
                        <div class="container" style="background-color:white;">
                            <div class="row" >
                                <div class="col-md-12">
                                    <h2>Chi tiết hóa đơn</h2>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Thành Tiền</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $totalPrice = 0;
                                    $totalPricedp = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $idpo = $row['ProductId'];
                                        $Price = $row['Price'];

                                        $namep = $row['ProductName'];

                                        $check = false;
                                        $Price = $row['Price'];

                                        $image = $row['ImageProduct'];
                                        $namep = $row['ProductName'];
                                        $idproduct = $row['ProductId'];
                                        $sql1 = "select (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p ,sale s  where s.SaleId = p.SaleId and s.SaleId>=1 and p.ProductId=$idproduct and ProductId IN ($strId)";
                                        $result1 = $conn->query($sql1);
                                        if ($result1->num_rows > 0) {
                                            while ($row = $result1->fetch_array()) {
                                                $dp = $row['DecreaseProduct'];
                                                $totalPricedp += $dp;

                                                $check = true;
                                            }
                                        }
                                        $sql4 = "select Price from product where ProductId=$idproduct and ProductId IN ($strId) and SaleId='0'";
                                        $result4 = $conn->query($sql4);
                                        if ($result4->num_rows > 0) {
                                            while ($row = $result4->fetch_array()) {
                                                $price = $row['Price'];
                                                $totalPrice += $price;
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td scope="row"><?php echo $namep; ?></td>
                                            <td><?php
                                                if ($check == false) {
                                                    echo number_format($Price) . "đ";
                                                } if ($check == true) {
                                                    ?>
                                        <strike><?php echo number_format($Price) . "đ"; ?> </strike>      
                                        <?php
                                        echo number_format($dp) . "đ";
                                    }
                                    ?></td>
                                    <td></td>

                                    </tr>
                                    <?php
                                }
                            }
                        }
                        $totalBill = $totalPrice + $totalPricedp;
                        ?>

                        <tr>
                            <th scope="row" colspan="2">Tổng số tiền</th>
                            <td><?php echo number_format($totalPricedp + $totalPrice) . "đ"; ?></td>



                        </tr>
                        <tr>
                            <th scope="row" colspan="2">Tên khách hàng:
                                <?php
                                if (isset($_SESSION['NameLogin'])) {
                                    echo $_SESSION['NameLogin'];
                                }
                                ?>
                            <td colspan="2"></td>
                            </th>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <?php
                if (isset($_POST['subsuccess'])) {
                    $address1 = $_POST['country'];
                    $address2 = $_POST['dis'];
                    $address3 = $_POST['town'];
                    if ($address1 == 1) {
                        $address1 = "TP Hồ Chí Minh";
                    }
                    if ($address1 == 2) {
                        $address1 = "Hậu Giang";
                    }
                    if ($address1 == 3) {
                        $address1 = "Cần Thơ";
                    }
                    if ($address1 == 4) {
                        $address1 = "Hà Nội";
                    }
                    if ($address1 == 5) {
                        $address1 = "Hải Phòng";
                    }
                    if ($address1 == 6) {
                        $address1 = "Đà Nẵng";
                    }
                    if ($address1 == 7) {
                        $address1 = "Huế";
                    }
                    if ($address1 == 8) {
                        $address1 = "An Giang";
                    }
                    if ($address1 == 9) {
                        $address1 = "Cà Mau";
                    }
                    if ($address1 == 10) {
                        $address1 = "Bắc Giang";
                    }
                    if ($address2 == 1) {
                        $address2 = "Quận 1";
                    }
                    if ($address2 == 2) {
                        $address2 = "Quận 2";
                    }
                    if ($address2 == 3) {
                        $address2 = "Quận 3";
                    }
                    if ($address2 == 19) {
                        $address2 = "Quận Bình Thạnh";
                    }
                    if ($address2 == 20) {
                        $address2 = "Quận Gò Vấp";
                    }
                    if ($address2 == 23) {
                        $address2 = "Quận Thủ Đức";
                    }
                    if ($address2 == 24) {
                        $address2 = "Quận Tân Phú";
                    }
                    if ($address2 == 25) {
                        $address2 = "Thị Xã Ngã Bảy";
                    }
                    if ($address2 == 26) {
                        $address2 = "Huyện Vị Thủy";
                    }
                    if ($address2 == 27) {
                        $address2 = "Quận Ninh Kiều";
                    }
                    if ($address2 == 28) {
                        $address2 = "Quận Bình Thủy";
                    }
                    if ($address2 == 29) {
                        $address2 = "Quận Cái Răng";
                    }
                    if ($address2 == 30) {
                        $address2 = "Quận Ô Môn";
                    }
                    if ($address2 == 31) {
                        $address2 = "Quận Quận Thốt Nốt";
                    }
                    if ($address2 == 32) {
                        $address2 = "Quận Ba Vì";
                    }
                    if ($address2 == 33) {
                        $address2 = "Quận Đống Đa";
                    }
                    if ($address2 == 34) {
                        $address2 = "Quận Long Biên";
                    }
                    if ($address2 == 35) {
                        $address2 = "Quận Hoàng Kiếm";
                    }
                    if ($address2 == 36) {
                        $address2 = "Huyện An Lão";
                    }
                    if ($address2 == 37) {
                        $address2 = "Huyện An Dương";
                    }
                    if ($address2 == 38) {
                        $address2 = "Huyện Hải An";
                    }
                    if ($address2 == 39) {
                        $address2 = "Huyện Dương Kinh";
                    }
                    if ($address2 == 40) {
                        $address2 = "Huyện Bạch Long Vĩ";
                    }
                    if ($address2 == 41) {
                        $address2 = "Huyện Hòa Vang";
                    }
                    if ($address2 == 42) {
                        $address2 = "Huyện Hoàng Sa";
                    }

                    if ($address2 == 46) {
                        $address2 = "Huyện Phong Điền";
                    }
                    if ($address2 == 47) {
                        $address2 = "Huyện Phú Lộc";
                    }
                    if ($address2 == 50) {
                        $address2 = "Thị Xã Hương Trà";
                    }
                    if ($address2 == 51) {
                        $address2 = "Huyện An Phú";
                    }
                    if ($address2 == 53) {
                        $address2 = "Huyện Châu Thành";
                    }

                    if ($address2 == 54) {
                        $address2 = "Thành Phố Châu Đốc";
                    }

                    if ($address2 == 55) {
                        $address2 = "Thành Phố Long Xuyên";
                    }
                    if ($address2 == 56) {
                        $address2 = "Huyện U Minh";
                    }
                    if ($address2 == 57) {
                        $address2 = "Huyện Đầm Dơi";
                    }
                    if ($address2 == 59) {
                        $address2 = "Thành Phố Cà Mau";
                    }
                    if ($address2 == 60) {
                        $address2 = "Huyện Năm Căn";
                    }

                    if ($address2 == 61) {
                        $address2 = "Huyện Lục Ngạn";
                    }
                    if ($address2 == 62) {
                        $address2 = "Huyện Lục Nam";
                    }

                    if ($address2 == 63) {
                        $address2 = "Huyện Lạng Giang";
                    }

                    if ($address3 == 1) {
                        $address3 = "Xã Tân Thành";
                    }
                    if ($address3 == 3) {
                        $address3 = "Phường Phạm Ngũ Lão";
                    }
                    if ($address3 == 4) {
                        $address3 = "Nguyễn Cư Trinh";
                    }
                    if ($address3 == 5) {
                        $address3 = "Phường Tân Định";
                    }
                    if ($address3 == 6) {
                        $address3 = "Phường An Khánh";
                    }
                    if ($address3 == 7) {
                        $address3 = "Phường Thủ Thiêm";
                    }
                    if ($address3 == 8) {
                        $address3 = "Phường An Phú";
                    }
                    if ($address3 == 9) {
                        $address3 = "Phường Bình An";
                    }

                    if ($address3 == 10) {
                        $address3 = "Phường Bình Trưng Tây";
                    }
                    if ($address3 == 11) {
                        $address3 = "Phường 1";
                    }
                    if ($address3 == 12) {
                        $address3 = "Phường 2";
                    }
                    if ($address3 == 13) {
                        $address3 = "Phường 3";
                    }
                    if ($address3 == 14) {
                        $address3 = "Phường 4";
                    }
                    if ($address3 == 15) {
                        $address3 = "Phường 1";
                    }
                    if ($address3 == 16) {
                        $address3 = "Phường 3";
                    }
                    if ($address3 == 17) {
                        $address3 = "Phường 5";
                    }

                    if ($address3 == 18) {
                        $address3 = "Phường 6";
                    }
                    if ($address3 == 19) {
                        $address3 = "Phường 1";
                    }
                    if ($address3 == 20) {
                        $address3 = "Phường 3";
                    }
                    if ($address3 == 21) {
                        $address3 = "Phường 5";
                    }
                    if ($address3 == 22) {
                        $address3 = "Phường 7";
                    }
                    if ($address3 == 23) {
                        $address3 = "Phường Tam Bình";
                    }
                    if ($address3 == 24) {
                        $address3 = "Phường Tam Phú";
                    }
                    if ($address3 == 25) {
                        $address3 = "Phường Trường Thọ";
                    }

                    if ($address3 == 26) {
                        $address3 = "Phường Linh Tây";
                    }
                    if ($address3 == 27) {
                        $address3 = "Phường Phú Trung";
                    }
                    if ($address3 == 28) {
                        $address3 = "Phường Sơn Kỳ";
                    }
                    if ($address3 == 29) {
                        $address3 = "Phường Tân Quý";
                    }
                    if ($address3 == 30) {
                        $address3 = "Phường Tân Sơn Nhi";
                    }
                    if ($address3 == 31) {
                        $address3 = "Xã Đại Thành";
                    }
                    if ($address3 == 32) {
                        $address3 = "Xã Hiệp Lợi";
                    }
                    if ($address3 == 33) {
                        $address3 = "Phường Lái Hiếu";
                    }

                    if ($address3 == 34) {
                        $address3 = "Phường Lái Thành";
                    }
                    if ($address3 == 35) {
                        $address3 = "Phường Hiệp Thành";
                    }
                    if ($address3 == 36) {
                        $address3 = "Xã Vị Bình";
                    }
                    if ($address3 == 37) {
                        $address3 = "Xã Vị Thủy";
                    }
                    if ($address3 == 38) {
                        $address3 = "Xã Vị Thanh";
                    }
                    if ($address3 == 39) {
                        $address3 = "Xã Vị Trung";
                    }
                    if ($address3 == 40) {
                        $address3 = "Phường An Phú";
                    }


                    if ($address3 == 42) {
                        $address3 = "Phường An Cư";
                    }
                    if ($address3 == 43) {
                        $address3 = "Phường Xuân Khánh";
                    }
                    if ($address3 == 44) {
                        $address3 = "Phường Hưng Lợi";
                    }
                    if ($address3 == 45) {
                        $address3 = "Phường An Nghiệp";
                    }
                    if ($address3 == 46) {
                        $address3 = "Phường Long Tuyền";
                    }
                    if ($address3 == 47) {
                        $address3 = "Phường Trà Nóc";
                    }
                    if ($address3 == 48) {
                        $address3 = "Phường Trà An";
                    }
                    if ($address3 == 49) {
                        $address3 = "Phường Long Hòa";
                    }

                    if ($address3 == 50) {
                        $address3 = "Phường An Thới";
                    }
                    if ($address3 == 51) {
                        $address3 = "Phường Ba Láng";
                    }
                    if ($address3 == 52) {
                        $address3 = "Phường Hưng Phú";
                    }
                    if ($address3 == 53) {
                        $address3 = "Phường Tân Phú";
                    }
                    if ($address3 == 54) {
                        $address3 = "Phường Hưng Thạnh";
                    }
                    if ($address3 == 55) {
                        $address3 = "Phường Thường Thạnh";
                    }
                    if ($address3 == 56) {
                        $address3 = "Phường Thới An";
                    }
                    if ($address3 == 57) {
                        $address3 = "Phường Thới Hòa";
                    }

                    if ($address3 == 58) {
                        $address3 = "Phường Phước Thới";
                    }
                    if ($address3 == 59) {
                        $address3 = "Phường Thới Long";
                    }
                    if ($address3 == 60) {
                        $address3 = "Phường Trường Lạc";
                    }
                    if ($address3 == 61) {
                        $address3 = "Phường Tân Hưng";
                    }
                    if ($address3 == 62) {
                        $address3 = "Phường Tân Lộc";
                    }
                    if ($address3 == 63) {
                        $address3 = "Phường Trung Kiên";
                    }
                    if ($address3 == 64) {
                        $address3 = "Phường Thuận Hưng";
                    }

                    if ($address3 == 65) {
                        $address3 = "Phường Thuận An";
                    }

                    if ($address3 == 66) {
                        $address3 = "Xã Đông Quang";
                    }
                    if ($address3 == 67) {
                        $address3 = "Xã Tuyên Phong";
                    }
                    if ($address3 == 68) {
                        $address3 = "Xã Thụy An";
                    }
                    if ($address3 == 69) {
                        $address3 = "Xã Thuần Mỹ";
                    }
                    if ($address3 == 70) {
                        $address3 = "Xã Yên Bài";
                    }
                    if ($address3 == 71) {
                        $address3 = "Phường Quang Trung";
                    }
                    if ($address3 == 72) {
                        $address3 = "Phường Quốc Tử Giám";
                    }
                    if ($address3 == 73) {
                        $address3 = "Phường Quang Mai";
                    }

                    if ($address3 == 74) {
                        $address3 = "Phường Bồ Đề";
                    }
                    if ($address3 == 75) {
                        $address3 = "Phường Gia Thụy";
                    }
                    if ($address3 == 76) {
                        $address3 = "Phường Long Biên";
                    }
                    if ($address3 == 77) {
                        $address3 = "Phường Cửa Nam";
                    }

                    if ($address3 == 79) {
                        $address3 = "Phường Cửa Đông";
                    }
                    if ($address3 == 80) {
                        $address3 = "Phường Lý Thái Tổ";
                    }
                    if ($address3 == 81) {
                        $address3 = "Phường Phan Chu Trinh";
                    }


                    if ($address3 == 83) {
                        $address3 = "Phường Cửa Đông";
                    }

                    if ($address3 == 86) {
                        $address3 = "Xã An Thái";
                    }
                    if ($address3 == 87) {
                        $address3 = "Xã Tân Viên";
                    }
                    if ($address3 == 88) {
                        $address3 = "Xã Thái Sơn";
                    }
                    if ($address3 == 89) {
                        $address3 = "Xã Trường Thọ";
                    }

                    if ($address3 == 90) {
                        $address3 = "Xã An Hòa";
                    }
                    if ($address3 == 91) {
                        $address3 = "Xã An Hồng";
                    }
                    if ($address3 == 92) {
                        $address3 = "Xã An Hưng";
                    }
                    if ($address3 == 93) {
                        $address3 = "Xã Lê Thiện";
                    }
                    if ($address3 == 94) {
                        $address3 = "Phường Đông Hải";
                    }
                    if ($address3 == 95) {
                        $address3 = "Phường Đằng Giang";
                    }
                    if ($address3 == 96) {
                        $address3 = "Phường Đằng Lâm";
                    }


                    if ($address3 == 97) {
                        $address3 = "Phường Đông Hải 1";
                    }
                    if ($address3 == 98) {
                        $address3 = "Phường Hưng Đạo";
                    }
                    if ($address3 == 99) {
                        $address3 = "Phường Tân Thành";
                    }
                    if ($address3 == 100) {
                        $address3 = "Phường Đa Phúc";
                    }
                    if ($address3 == 101) {
                        $address3 = "Phường Hòa Nghĩa";
                    }
                    if ($address3 == 102) {
                        $address3 = "Thị Trấn Bạch Long Vĩ";
                    }
                    if ($address3 == 103) {
                        $address3 = "Xã Hòa Châu";
                    }
                    if ($address3 == 104) {
                        $address3 = "Xã Hòa Phú";
                    }

                    if ($address3 == 105) {
                        $address3 = "Xã Hòa Phước";
                    }
                    if ($address3 == 106) {
                        $address3 = "Xã Hòa Ninh";
                    }
                    if ($address3 == 107) {
                        $address3 = "Đảo Nam";
                    }
                    if ($address3 == 108) {
                        $address3 = "Đảo Hoàng Sa";
                    }
                    if ($address3 == 109) {
                        $address3 = "Xã Linh Côn";
                    }
                    if ($address3 == 110) {
                        $address3 = " Xã Phong Điền";
                    }
                    if ($address3 == 111) {
                        $address3 = "Xã Phong Mỹ";
                    }
                    if ($address3 == 112) {
                        $address3 = "Xã Phong Sơn";
                    }
                    if ($address3 == 113) {
                        $address3 = "Xã Lộc Thủy";
                    }
                    if ($address3 == 114) {
                        $address3 = "Xã Lộc Bình";
                    }

                    if ($address3 == 115) {
                        $address3 = "Xã Lộc Sơn";
                    }
                    if ($address3 == 116) {
                        $address3 = "Xã Hương An";
                    }
                    if ($address3 == 117) {
                        $address3 = "Xã Hương Bình";
                    }

                    if ($address3 == 118) {
                        $address3 = "Xã Hương Hồ";
                    }
                    if ($address3 == 119) {
                        $address3 = "Xã Phú Hội";
                    }
                    if ($address3 == 120) {
                        $address3 = "Phường Phú Hữu";
                    }
                    if ($address3 == 121) {
                        $address3 = "Xã Phước Hưng";
                    }
                    if ($address3 == 122) {
                        $address3 = "Xã Vĩnh An";
                    }
                    if ($address3 == 123) {
                        $address3 = "Xã Vĩnh Bình";
                    }
                    if ($address3 == 124) {
                        $address3 = "Xã Tân Phú";
                    }
                    if ($address3 == 125) {
                        $address3 = "Phường Núi Sam";
                    }
                    if ($address3 == 126) {
                        $address3 = "Phường Châu Đốc A";
                    }
                    if ($address3 == 127) {
                        $address3 = "Phường Châu Đốc B";
                    }
                    if ($address3 == 128) {
                        $address3 = "Phường Bình Khánh";
                    }
                    if ($address3 == 129) {
                        $address3 = "Phường Bình Đức";
                    }
                    if ($address3 == 130) {
                        $address3 = "Xã Khánh Hội";
                    }

                    if ($address3 == 131) {
                        $address3 = "Xã Khánh Hòa";
                    }
                    if ($address3 == 132) {
                        $address3 = "Thị Trấn U Minh";
                    }
                    if ($address3 == 133) {
                        $address3 = "Phường Hưng Phú";
                    }
                    if ($address3 == 134) {
                        $address3 = "Xã Tân Đức";
                    }
                    if ($address3 == 135) {
                        $address3 = "Xã Tân Tiến";
                    }
                    if ($address3 == 136) {
                        $address3 = "Xã Tạ An Khương";
                    }
                    if ($address3 == 137) {
                        $address3 = "Phường 1";
                    }
                    if ($address3 == 138) {
                        $address3 = "Phường 2";
                    }


                    if ($address3 == 139) {
                        $address3 = "Phường 4";
                    }
                    if ($address3 == 140) {
                        $address3 = "Phường 6";
                    }
                    if ($address3 == 141) {
                        $address3 = "Phường 7";
                    }

                    if ($address3 == 142) {
                        $address3 = "Xã Tam Giang";
                    }
                    if ($address3 == 143) {
                        $address3 = "Xã Tam Giang Đông";
                    }
                    if ($address3 == 145) {
                        $address3 = "Thị Trấn Năm Căn";
                    }
                    if ($address3 == 146) {
                        $address3 = "Xã Hồng Giang";
                    }
                    if ($address3 == 147) {
                        $address3 = "Xã Biển Động";
                    }
                    if ($address3 == 148) {
                        $address3 = "Xã Hồng Giang";
                    }
                    if ($address3 == 149) {
                        $address3 = "Xã Cảm Lý";
                    }

                    if ($address3 == 150) {
                        $address3 = "Xã Bình Sơn";
                    }
                    if ($address3 == 151) {
                        $address3 = "Xã  Bảo Đại ";
                    }
                    if ($address3 == 152) {
                        $address3 = "Phường An Hà";
                    }
                    if ($address3 == 153) {
                        $address3 = "Xã Tân Thanh";
                    }
                    if ($address3 == 154) {
                        $address3 = "Xã Tân Thịnh";
                    }



                    $address = $address3 . "," . $address2 . "," . $address1;
                    echo $address;
                    $phone = $_POST['phone'];
                    $payform = $_POST['payform'];
                    $email = $_POST['email'];
                    if (isset($address) && isset($phone) && isset($payform)) {
                        if (isset($_SESSION['cart'])) {
                            $arrayId = array();
                            foreach ($_SESSION['cart'] as $id_product => $amount) {
                                $arrayId[] = $id_product;
                            }
                            $strId = implode(',', $arrayId);
                            include 'connection.php';
                            $sql = "select * from product where ProductId IN($strId) Order by ProductId DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $namep = ['ProductName'];
                                    $idpo = $row['ProductId'];
                                    $name = $_SESSION['NameLogin'];
                                }
                            }
                            $insert = "insert into orderproduct(Status,PayForm,NameLogin,Phone,Email,AddressReceive,totalMoney) values('Chưa hoàn','$payform','$name','$phone','$email','$address','$totalBill')";
                            if ($conn->query($insert) == True) {

                                header("location:announceSuccess.php");
                            } else {
                                echo "Error: " . $sql . $conn->error;
                            }
                            $sql = "select * from orderproduct";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $ido = $row['OrderId'];
                                }
                            }
                            include 'connection.php';
                            $sql = "select * from product where ProductId IN($strId) Order by ProductId DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $idpo = $row['ProductId'];

                                    $insertod = "insert into orderdetail(OrderId,ProductId) values('$ido','$idpo')";

                                    if ($conn->query($insertod) == True) {

                                        header("location:announceSuccess.php");
                                    } else {
                                        echo "Error: " . $sql . $conn->error;
                                    }
                                    $sql = "update product set StatusProduct='Không có sẵn' where ProductId='$idpo'";
                                    if ($conn->query($sql) == TRUE) {
                                        echo "Record updated successfully";
                                        header("location:announceSuccess.php");
                                    } else {
                                        echo "Error updating record: " . $conn->error;
                                    }
                                }
                            }
                            $content .= '<p><b>Khách hàng: </b>' . $name . '<br/><b>Địa chỉ: </b>' . $address . '<br/><b>Điện thoại: </b>' . $phone . '<br/><b>Email: </b>' . $email . '<br/><b>Hình Thức Thanh Toán: </b>' . $payform . '<br/></p>';
                            $content .= '<p><b>Quý khách đã đặt hàng thành công!</b><br/>'
                                    . '<b>Nhân viên sẽ gọi điện cho quý khách trong vòng 24 tiếng để xác nhận thông tin!</b><br/>'
                                    . '<b>Cảm ơn quý khách đã tin tưởng lựa chọn thú cưng ở cửa hàng chúng tôi!</b><br/></p>';

                            $content .= '<table border="1" cellpadding="10px" cellspacing="1px" width="100%">
            <tr>
                <td align="center" bgcolor="#65e5fa" colspan="3" style="font-size: 25px">Hóa Đơn Thanh Toán</td>
            </tr>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Thành Tiền</th>

                </tr>';
                            if (isset($_SESSION['cart'])) {
                                $arrayId = array();
                                foreach ($_SESSION['cart'] as $id_product => $amount) {
                                    $arrayId[] = $id_product;
                                }
                                $strId = implode(',', $arrayId);
                                include 'connection.php';
                                $sql = "select * from product where ProductId IN($strId) Order by ProductId DESC";
                                $result = $conn->query($sql);
                                $totalPrice = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $price = $row['Price'];

                                        $check = false;
                                        $Price = $row['Price'];

                                        $image = $row['ImageProduct'];
                                        $namep = $row['ProductName'];
                                        $idproduct = $row['ProductId'];
                                        $sql1 = "select (Price*(100-DecreasePercent)/100) as 'DecreaseProduct' from product p ,sale s  where s.SaleId = p.SaleId and s.SaleId>=1 and p.ProductId=$idproduct and ProductId IN ($strId)";
                                        $result1 = $conn->query($sql1);
                                        if ($result1->num_rows > 0) {
                                            while ($row = $result1->fetch_array()) {
                                                $dp = $row['DecreaseProduct'];
                                                $totalPricedp += $dp;

                                                $check = true;
                                            }
                                        }
                                        $sql4 = "select Price from product where ProductId=$idproduct and ProductId IN ($strId) and SaleId='0'";
                                        $result4 = $conn->query($sql4);
                                        if ($result4->num_rows > 0) {
                                            while ($row = $result4->fetch_array()) {
                                                $price = $row['Price'];
                                                $totalPrice += $price;
                                            }
                                        }








                                        $content .= '<tr>
                    <td align="center">' . $namep . '</td>
                    <td align="center">';
                                        if ($check == false) {
                                            $content .= number_format($Price) . "đ";
                                        } else {
                                            if ($check == true) {
                                                $content .= '<strike>' . number_format($Price) . "đ" . '</strike>';
                                                $content .= ' ' . number_format($dp) . "đ";
                                            }
                                        }
                                        $content .= '</td>
                    <td></td>

                </tr>';
                                    }
                                }
                            }
                            $content .= '<tr>
                    <th colspan="2" align="center">Tổng Tiền</th>

                    <td align="center">' . number_format($totalBill) . "đ";
                            '</td>
                   
                </tr></table>';

                            require './PHPMailer/Exception.php';
                            require './PHPMailer/PHPMailer.php';
                            require './PHPMailer/SMTP.php';

                            $mail = new PHPMailer(true);
                            $mail->SMTPDebug = 3;
                            $mail->CharSet = 'UTF-8';
                            $mail->isSMTP();
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = "tls";
                            $mail->Port = 587;

                            $mail->Username = "tringhien278@gmail.com";
                            $mail->Password = "TriNghien@278";
                            $mail->From = "tringhien278@gmail.com";
                            // $mail->FormName = "Minh Thuy";
                            $mail->addAddress($email, $name);
                            $mail->addCC("ttmthuya19044@cusc.ctu.edu.vn", "Admin Lovely Petshop");
                            $mail->isHTML(true);
                            $mail->Subject = "Thông tin hóa đơn đặt hàng tại Lovely Petshop";
                            $mail->Body = $content;
                            try {
                                $mail->send();
                                echo "Message has been sent successfully!";

                                unset($_SESSION['cart']);
                            } catch (Exception $e) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            }
                        }
                    }
                }
               
                ?>

                <div class="container" style="background-color:white;">
                    <div class="row" >
                        <div class="col-md-12">
                            <h2>Thông tin khách hàng</h2>
                        </div>
                    </div>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'lovepets');
                    if ($conn->connect_error) {
                        die("Connection failed:" . $conn->connect_error);
                    } $sql = "SELECT * from city";
                    $result = $conn->query($sql);
                    ?>

                    <div class="row">
                        <table class="table">

                            <tbody>

                                <tr>
                                    <td scope="row">
                                        <div class="col-md-6">

                                            <label style="font-size: 18px">Tỉnh/Thành Phố:</label>

                                        </div>
                                        <div class="col-md-6">
                                            <select id="data"  class="form-control" onchange="getCity()" name="country" oninvalid="this.setCustomValidity('Vui lòng chọn tỉnh hoặc thành phố!')"
                                                    oninput="setCustomValidity('')" required >
                                                <option value="" selected disabled hidden>Chọn Tỉnh/Thành Phố</option>

                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_array()) {
                                                        ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['CityName']; ?></option>

                                                        <?php
                                                    }
                                                } else {
                                                    echo $conn->error;
                                                }
                                                ?>
                                            </select></div>
                                    </td></tr>
                                <tr>
                                    <td>
                                        <div class="col-md-6">

                                            <label style="font-size: 18px">Quận/Huyện:</label>
                                        </div>
                                        <div class="col-md-6">

                                            <select id="district" class="form-control" onchange="getDistrict()" name="dis" oninvalid="this.setCustomValidity('Vui lòng chọn quận hoặc huyện!')"
                                                    oninput="setCustomValidity('')" required>
                                                <option value="" selected disabled hidden>Chọn Quận/Huyện</option>
                                            </select></div>
                                    </td></tr>
                                <tr>
                                    <td>
                                        <div class="col-md-6">

                                            <label style="font-size: 18px">Phường/Xã:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="wards" class="form-control" name="town" oninvalid="this.setCustomValidity('Vui lòng chọn phường hoặc xã!')"
                                                    oninput="setCustomValidity('')" required name="ward">
                                                <option value="" selected disabled hidden>Chọn Phường/Xã</option>

                                            </select>
                                        </div>
                                    </td>

                                </tr>
                                <tr>


                                    <td scope="row"> <div class="col-md-6"><input placeholder="Vui lòng nhập vào số điện thoại" class="form-control" type="text"  pattern="(\+84|0)\d{9,10}" oninvalid="this.setCustomValidity('Vui lòng nhập đúng định dạng số điện thoại!')"
                                                                                  oninput="setCustomValidity('')" required  name="phone"></div></td>                           

                                </tr>
                                <tr>
                                    <th scope="row"><div class="col-md-6"><input placeholder="Vui lòng nhập vào địa chỉ email" class="form-control" type="text"  oninvalid="this.setCustomValidity('Vui lòng nhập vào địa chỉ email!')"
                                                                                 oninput="setCustomValidity('')" required  name="email"></div></th>                           
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="col-md-6">
                                            <select name="payform" id="choice" class="form-control" oninvalid="this.setCustomValidity('Vui lòng lựa chọn hình thức thanh toán!')"
                                                    oninput="setCustomValidity('')" required>
                                                <option value="" selected disabled hidden>Hãy chọn hình thức thanh toán</option>
                                                <option value="Thanh toán bằng tiền mặt">Thanh toán bằng tiền mặt</option>
                                                <option value="Thanh toán bằng thẻ ATM">Thanh toán bằng thẻ ATM</option>   

                                            </select>
                                        </div>
                                    </th>                           
                                </tr>
                                <tr>

                            <center> <td> <div class="col-md-6"><input type="submit" name="subsuccess" value="Mua hàng" style="background-color:#65e5fa;border:none;width:150px;height:50px;"></input></div></td></center>
                            </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
                <?php include 'footer.php'; ?>
                </body>
                </html>