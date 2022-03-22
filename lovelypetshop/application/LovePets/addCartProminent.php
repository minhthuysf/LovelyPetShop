<?php
session_start();
if (isset($_SESSION['NameLogin'])) {

    $id_product = $_GET['id_product'];
    echo $_SESSION['NameLogin'];
    if (isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = $_SESSION['cart'][$id_product] + 1;
    } else {
        $_SESSION['cart'][$id_product] = 1;
    }
    ?>
    <script>
        
        window.location = "homePage.php";

    </script>
    <?php

} else {
    header("location:login.php");
}
?>
