<?php
ini_set('error_log', 'api_error.log');
require_once("../controller/config.php");
$mysqli = new mysqli($host,$user,$pass,$mytb);
	
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
		}		
$mysqli->query("SET NAMES 'utf8'");
$sql="SELECT DISTINCT department FROM test_barcode_data";
$result=$mysqli->query($sql);	
while($e=mysqli_fetch_assoc($result)){
$output[]=$e; 
}	
	print(json_encode($output)); 
	$mysqli->close();	

?>		

 

