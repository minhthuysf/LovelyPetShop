<?php

include 'connection.php';

$id = $_GET['id_slide'];
$sql = "delete from slideshow where id='$id'";
if ($conn->query($sql) === TRUE) {
    header("location:slide.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

?>