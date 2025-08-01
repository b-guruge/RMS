<?php
 ini_set('error_log', 'api_error.log');
 require_once("../controller/config.php");
$epc = $_POST['epc'];
$connect = mysqli_connect($host,$user,$pass,$mytb);
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
$sql = "SELECT m.asset_name, m.epc barcode, m.department Area,m.person_name Person FROM test_barcode_data m INNER JOIN test_audit c ON c.loc_name= m.department order by c.id desc";
 
if ($result = mysqli_query($connect, $sql))
{

	$resultArray = array();
	$tempArray = array();
 
	while($row = $result->fetch_object())
	{
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}

	echo json_encode($resultArray);
}
 
// Close connections
mysqli_close($connect);
?>