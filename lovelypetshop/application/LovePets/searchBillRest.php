<?php

header("Content-Type:application/json");
$con = mysqli_connect("localhost","root","","lovepets");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
                echo $_GET['id'];
if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : "";
}

$result = mysqli_query($con, "SELECT * FROM orderproduct where OrderId='$id' and Status='Đã hoàn'");

$response = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $response[] = $row;
    }

    echo json_encode($response);

    mysqli_close($con);
}



?>