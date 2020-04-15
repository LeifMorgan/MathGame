
<?php
require_once 'Files.php';
require_once 'configStudents.php';
include 'query.php';

$query_array = prepare_query_string();
echo "<pre>";



extract($_POST);

// $valid = checkInfo();
$valid=1;
if($valid===1){

  // save_data(STUDENTS,[$studentname, $grade, $query_array["user"]]);
  // update_student_file($file, $user, $key, $value)
  //$key_arr_3 = array("name", "grade", "teacher");
  update_student_file(STUDENTS, $studentname, "teacher",$query_array["user"]);

	/*Redirect browser*/
  header("Location: ../add_Students.php/?user=".$query_array["user"]."");
	// header("refresh:10; Location: create_Problem.php");

}else {
  echo "Must enter valid integer values";
  header("refresh: 3; url=../add_Students.php/?user=".$query_array["user"]."");
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
