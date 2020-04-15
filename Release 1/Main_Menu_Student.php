<?php
    include 'student_headers.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Math Game</title>
	</head>
<body>
<?php
	if(array_key_exists('button1', $_POST)) { 
    	button1(); 
    } 
    else if(array_key_exists('button2', $_POST)) { 
    	button2(); 
    } 
    function button1() { 
    	echo "This is Button1 that is selected"; 
    } 
    function button2() { 
    	echo "This is Button2 that is selected"; 
    } 
	//
  //  function prepare_query_string(){
	// 	//echo $_SERVER['QUERY_STRING'];
	// 	$re = [];
	// 	$query_array = explode("&", $_SERVER["QUERY_STRING"]);
	// 	foreach ($query_array as $key => $value) {
	// 	$temp = explode("=", $value);
	// 	$re[$temp[0]] = $temp[1];
	// 	}
	// 	return $re;
	// }
?>


<?php
	// require_once 'query.php';
	echo "<pre>";
	/*foreach ($_SERVER as $key => $value) {
		echo "$key:$value\n";
	}*/

	$query_array = prepare_query_string();
	//print_r($query_array);


	echo "<p>Welcome to SPLER Education, ".$query_array["user"]."</p>";
	echo"</pre>";

?>

</body>
</html>
