<?php
ini_set('error_log', 'api_error.log');
require_once("../controller/config.php");

$loc_name= $_POST['loc_name'];
	$connect = mysqli_connect($host,$user,$pass,$mytb);
	$query = "UPDATE test_barcode_data SET flag='1' WHERE department='$loc_name'";
    if(mysqli_query($connect,$query)){
 
        echo 'Data updated  Successfully';
        
        }
        else{
        
        echo 'Try Again';
        
        }
        mysqli_close($connect);
?>

