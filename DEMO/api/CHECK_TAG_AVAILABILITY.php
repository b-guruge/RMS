<?php
ini_set('error_log', 'api_error.log');
require_once("../controller/config.php");

if(isset($_GET["epc"]) && isset($_GET["option"]))
{
	$db = connect();
	$bodb = bo();
	$query = "CALL get_store_tag_availability('". $_GET["epc"] ."');";
	$resultmaster = $db->query($query);
	$rowcol=$bodb->fall($resultmaster);
	//$result = mysqli_query($connect, $query);
	//while($row = mysqli_fetch_array($result))
	//{
	//	$data["RES"] = $row["RES"];
	//}
	if($_GET["option"] == '1')
	{
		//allocate
		if(count($rowcol[0]) > 0)
		{
			$data = $rowcol[0]["RET"];
		}
		else
		{
			$data = "-1";
		}
		echo $data;
	}
	else if($_GET["option"] == '2') {
		//transfer
		if(count($rowcol[0]) > 0)
		{
			$data = $rowcol[0]["RET"] . ':' . $rowcol[0]["zone_name"] . ':' . $rowcol[0]["line_name"] . ':' . $rowcol[0]["level_name"];
		}
		else
		{
			$data = "-1";
		}
		echo $data;
	}
}
else {
	echo "-2"; //invalid API inputs found
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