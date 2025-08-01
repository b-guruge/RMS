<?php
ini_set('error_log', 'api_error.log');
require_once("../controller/config.php");

if(isset($_GET["epc"]))
{
	$bodb = bo();
	$connect = mysqli_connect($host,$user,$pass,$mytb);
	$query = "CALL store_asssets('". $_GET["epc"] ."', '". $_GET["zone"] ."', '". $_GET["line"] ."', '". $_GET["level"] ."');";
	//$result = mysqli_query($connect, $query);
	$rowcol=$bodb->fall_multi($query);
	//while($row = mysqli_fetch_array($result))
	//{
	//	$data["RES"] = $row["RES"];
	//}
	if(count($rowcol) > 1 && count($rowcol[0]) > 0)
	{
		//$data["RES"] = $rowcol[2][0]["RET"];
		$data = $rowcol[2][0]["RET"];
	}
	else
	{
		//$data["RES"] = "0";
		$data = "0";
	}
	//echo json_encode($data);
	echo $data;
}

function bo() {
	require_once("../controller/db.php");
	$newDb = new DataBase();
	return $newDb;
}

?>