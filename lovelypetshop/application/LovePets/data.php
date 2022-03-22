<?php
function getUserByName($name) {

include 'connection.php';
$record_per_page = 20;
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
  $sql = "select * from product where ProductName like '%$name%' order by ProductId DESC LIMIT $start_from,$record_per_page";
  
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $response[] = $row;
        }
        return json_encode($response);
    } else {
        return "Không có sản phẩm!";
    }
}
?>


<?php

//function getUserByName($name) {
//    include 'connection.php';
//    $sql = "select * from product where ProductName like '%$name%'";
//    $result = $conn->query($sql);
//    if ($result->num_rows > 0) {
//        while ($row = $result->fetch_array()) {
//            $response[] = $row;
//        }
//        return json_encode($response);
//    } else {
//        return "Không có sản phẩm!";
//    }
//}
?>
