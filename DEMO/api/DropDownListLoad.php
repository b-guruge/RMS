<?php
 ini_set('error_log', 'api_error.log');
 require_once("../controller/config.php");
$connect = mysqli_connect($host,$user,$pass,$mytb);
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
function getModel(){
    // array for json response
    $response = array();
    $response["model"] = array();
	$mobile=$_GET['mobile'];
     
    // Mysql select query
    $result = mysql_query("SELECT * FROM test_barcode_data WHERE department='$mobile'");
     
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["model"] = $row["model"];
         
        // push category to final json array
        array_push($response["model"], $tmp);
    }
     
    // keeping response header to json
    header('Content-Type: application/json');
     
    // echoing json result
    echo json_encode($response);
}
 
getModel();
mysqli_close($connect);
?>