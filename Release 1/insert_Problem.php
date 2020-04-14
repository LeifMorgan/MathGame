
<?php
require_once 'Files.php';
require_once 'configproblem.php';
include 'query.php';

$query_array = prepare_query_string();
echo "<pre>";



extract($_POST);

$valid = checkInfo($a, $b);

if($valid===1){

  save_data(PROBLEMS,[$a,$b, $operations, $query_array["user"]]);

	/*Redirect browser*/
  header("Location: ../create_Problem.php/?user=".$query_array["user"]."");
	// header("refresh:10; Location: create_Problem.php");

}else {
  echo "Must enter valid integer values";
  header("refresh: 3; url=../create_Problem.php/?user=".$query_array["user"]."");
  // header("refresh:10; Location: create_Problem.php");
}


/**
*Returns 1: both values are integers
*		     2: they are not integers
	*/
function checkInfo($int1, $int2){
  if(is_numeric($int1) && is_numeric($int2)){
    return 1;
  }
  else {
    return 2;
  }
}
?>
