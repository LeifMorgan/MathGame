<?php
   function prepare_query_string(){
  		//echo $_SERVER['QUERY_STRING'];
  		$re = [];
  		$query_array = explode("&", $_SERVER["QUERY_STRING"]);
  		foreach ($query_array as $key => $value) {
  		$temp = explode("=", $value);
  		$re[$temp[0]] = $temp[1];
  		}
  		return $re;
	 }
?>
