<!DOCTYPE html>
<html>
<head>
<style>
h1 {
  text-shadow: 2px 2px 5px red;
}
.glow_green {
	 -moz-box-shadow:    inset 0 0 10px #269c19;
   -webkit-box-shadow: inset 0 0 10px #269c19;
   box-shadow:         inset 0 0 10px #269c19;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>

<h1>Text-shadow effect!</h1>
<p>Nothing to hide</p>
<button onclick="test()">Click me</button>
</body>
<script>

    function test()
    {
        $('body').addClass('glow_green');
        setTimeout(function() { 
            $('body').removeClass('glow_green');
        }, 250);
    }

</script>
</html>


<?php 
//$date = new DateTime("now", new DateTimeZone('Asia/Colombo') );
//echo $date->format('Y-m-d');
//echo $date->format('H:i:s');

//require_once ('../controller/constants.php');
//require_once ('../controller/dbConstants.php');
//$accessDB = new DBConstants();
//$assets = $accessDB->get_grn_product_table_headers();
//$retArray = explode(",", $assets[0]["value"]);

// An array for results.
/*
$results = array();
if(count($assets) >= 1) {
    $b = '';
    while($row = $assets->fetch()) {
        // explode each row and append it to the array.
        $results = array_merge($results, explode(',', $a));
    }
} else {
    $b = 'No records to display';
}
print_r($results); */

//print_r($assets);
//$avl = array($assets[0]["value"]);
//print_r($avl);
//echo count($avl);
//foreach($avl as $value)
//{
//    echo $value . "<br>";
//}

?>