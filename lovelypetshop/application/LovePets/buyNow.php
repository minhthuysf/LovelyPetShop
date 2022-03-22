<?php
 session_start();
if (isset($_SESSION['NameLogin'])) {
   
    $id_product = $_GET['id_product'];
    if (isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = $_SESSION['cart'][$id_product] + 1;
    } else {
        $_SESSION['cart'][$id_product] = 1;
    }
    header("location:detailCart.php?page_layout=cart");
} 
else {
//    echo '<script>alert("Vui lòng đăng nhập để mua hàng!"); window.location = "login.php";</script>';
//   ;
    header("location:login.php");
}
?>

