<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
        <?php
        if (isset($_POST['subsuccess'])) {
            $address1 = $_POST['country'];
            $address2 = $_POST['dis'];
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
                            $address2 ="Huyện Châu Thành";
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
                            $address2 ="Huyện Năm Căn";
                        }

                        if ($address2 == 61) {
                            $address2 = "Huyện Lục Ngạn";
                        }
                          if ($address2 == 62) {
                            $address2 ="Huyện Lục Nam";
                        }

                        if ($address2 == 63) {
                            $address2 = "Huyện Lạng Giang";
                        }
                                    $address = $address1 . $address2;

            echo $address;
        }
        ?>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'lovepets');
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        } $sql = "SELECT * from city";
        $result = $conn->query($sql);
        ?>
        <form method="post">
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
                                    <option value="" selected disabled hidden>Hãy Chọn Hình thức thanh toán</option>
                                    <option value="Thanh toán bằng tiền mặt">Thanh toán bằng tiền mặt</option>
                                    <option value="Thanh toán bằng thẻ ATM">Thanh toán bằng thẻ ATM</option>   

                                </select>
                            </div>
                        </th>                           
                    </tr>
                    <tr>

                <center> <td> <div class="col-md-6"><button name="subsuccess">submit</button></div></td></center>
                </tr>
                </tbody>
            </table>
        </form>

</body>
</html>
