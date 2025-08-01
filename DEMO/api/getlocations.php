<?php
ini_set('error_log', 'api_error.log');
require_once("../controller/config.php");

$loc_name= $_POST['loc_name'];
$flag= $_POST['flag'];
	$connect = mysqli_connect($host,$user,$pass,$mytb);
	$query = "insert into test_audit (loc_name,flag)values ('$loc_name','$flag')";
	

    if(mysqli_query($connect,$query)){
 
        echo 'Data Submit Successfully';
        
        }
        else{
        
        echo 'Try Again';
        
        }
        mysqli_close($connect);
?>