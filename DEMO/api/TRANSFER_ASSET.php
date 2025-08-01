<?php
ini_set('error_log', 'api_error.log');
require_once("../controller/config.php");

if(isset($_GET["epc"]))
{
	$bodb = bo();
	$connect = mysqli_connect($host,$user,$pass,$mytb);
	$query = "CALL transfer_assets('". $_GET["epc"] ."', '". $_GET["zone"] ."', '". $_GET["line"] ."', '". $_GET["level"] ."');";
	$rowcol=$bodb->fall_multi($query);
	if(count($rowcol[2]) > 0)
	{
		$data = $rowcol[2][0]["RET"];
	}
	else
	{
		$data = "0";
	}
	echo $data;
}
else {
	echo "-2";
}

function bo() {
	require_once("../controller/db.php");
	$newDb = new DataBase();
	return $newDb;
}

function connect() 
{
	require_once("../controller/db.php");
	$newDb = new DataBase();
	$newDb->getConnection();
	return $newDb->db;
}

?>