<?php
header('Content-type: application/json');

$con = mysqli_connect("localhost","root","","lovepets");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}	
	if (isset($_GET['namec']) && isset($_GET['typec']) && isset($_GET['prominent'])) {
	
	
	  $name = $_GET['namec'];
            $type = $_GET['typec'];
            $prominent = $_GET['prominent'];


	// Insert data into data base
	$sql = "INSERT INTO category ( CategoryName, TypeId,prominent) VALUES( '$name', '$type','$prominent')";
	
	//execute insert query
	$query = mysqli_query($con, $sql);
	
	if($query){		
		response($name, $type,$prominent);
	}else{		
		response($name, $type,$prominent);
	}
	
	
	}
	
	mysqli_close($con);


	
	
	function response($id,$name,$desc){
		$response['id'] = $id;
		$response['name'] = $name;
		$response['description'] = $desc;
		
		$json_response = json_encode($response);
		echo $json_response;
	}
	
	?>

