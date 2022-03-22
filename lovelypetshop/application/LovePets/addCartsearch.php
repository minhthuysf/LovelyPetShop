
<?php

session_start();
if (isset($_SESSION['NameLogin'])) {
    $id_product = $_GET['id_product'];
        $find = $_GET['find'];

    if (isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = $_SESSION['cart'][$id_product] + 1;
    } else {
        $_SESSION['cart'][$id_product] = 1;
    }
    ?>
    <script>
        
        window.location = "searchProduct.php?find=<?php echo $find; ?>";

    </script>
    <?php

} else {
    header("location:login.php");
}
?>