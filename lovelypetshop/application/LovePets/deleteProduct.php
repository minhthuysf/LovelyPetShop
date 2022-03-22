<?php

include 'connection.php';

$id = $_GET['id_product'];
$sql = "delete from product where ProductId='$id'";
if ($conn->query($sql) === TRUE) {
    header("location:displayProduct.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

?>

