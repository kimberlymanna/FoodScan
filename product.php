<?php


$host = "localhost";
$user = "root";
$pwd = "";
$db = "products";
$barcode = $_GET['barcode_id'];

$conn = mysqli_connect($host, $user, $pwd, $db);

if(!$conn) {
	die("ERROR in connection: " . mysqli_connect_error());
}
$response = array();

$sql_query = "select * from product where barcode_id = $barcode";
$result = mysqli_query($conn, $sql_query);

if(mysqli_num_rows($result) > 0){
	$response['success'] = 1; // remove if dont work 
	$product = array(); //add. lines remove if dont work
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($response, $row);
	}
	$response['product'] = $product; //remove if dont work
}

else{
	$response["success"] = 0;
	$response["message"] = "No data";
}

echo json_encode($response);
mysqli_close($conn);

?>
 
 