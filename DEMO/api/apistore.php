<?php
ini_set('error_log', 'api_error.log');
require_once("../controller/config.php");

$epc = $_POST['epc'];
	$connect = mysqli_connect($host,$user,$pass,$mytb);
	$query = "insert into test_data (epc) values ('$epc')";
	

    if(mysqli_query($connect,$query)){
 
        echo 'Data Submit Successfully';
        
        }
        else{
        
        echo 'Try Again';
        
        }
        mysqli_close($connect);
?>