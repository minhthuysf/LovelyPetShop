<?php

include 'connection.php';
$namelogin = $_GET['namelogin'];
$delete = "update customer set Status='Không hoạt động' where NameLogin='$namelogin'";
if ($conn->query($delete) == TRUE) {
    echo "Record updated successfully";
    header("location:displayCustomerlist.php");
} else {
    echo "Error updating record: " . $conn->error;
}


?>

