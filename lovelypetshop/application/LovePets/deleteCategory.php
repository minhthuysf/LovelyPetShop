<?php

include 'connection.php';

$id = $_GET['id_category'];
$sql = "delete from category where CategoryId='$id'";
if ($conn->query($sql) === TRUE) {
    header("location:displayCategory.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

?>

