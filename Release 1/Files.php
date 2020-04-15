<?php
	/******File Handling*******/
	$key_arr = array("username", "password", "class");
	$key_arr_2 = array("a", "b", "operation","username");
	$key_arr_3 = array("name", "grade", "teacher");


	/*Write $data to $filename*/
	function save_data($filename, $data){
		$str = join(" ", $data)."\n";

		//$myfile = fopen("DB/$filename", "w") or die("Failed to create files");
		/*Append data to $filename*/
		/*More fopen modes on page 149*/
		$myfile = fopen($filename, "a") or die("Failed to create files");

		fwrite($myfile, $str) or die("Could not write to file");

		fclose($myfile);
	}


	function update_student_file($file, $user, $key, $value){
			global $key_arr_3;
      // $key_arr_3 = array("name", "grade", "teacher");

		  $myfile = file($file);
		  $newFile = "";
		  foreach ($myfile as $line) {
		    echo $line;
		    if(strpos($line,$user)!==false){

		      // $key_arr_3 = array("name", "grade", "teacher");
		      $removed = explode(" ", $line);
		      $new_res = [];

		      for($i = 0; $i<count($key_arr_3); $i++){
						$new_res[$key_arr_3[$i]] = $removed[$i];
					}

		      $new_res[$key] = $value."\n";
		      $line = implode(" ", $new_res);
          // echo '<br>';
          // echo "success";
          // echo '<br>';
		    }
		    $newFile .= $line;
		  }
		  file_put_contents($file,$newFile);
	}

	/***Reading from a file: fgets**/
	function get_login_info($filename){
		global $key_arr;

		$myfile = fopen($filename, "r") or die("File does not exist");
		/*could use fread()*/
		while($line=fgets($myfile)){
			//Convert to array by " "
			$res = explode(" ", $line);
			$new_res = [];
			//Replace keys in $res
			for($i = 0; $i<count($key_arr); $i++){
				$new_res[$key_arr[$i]] = $res[$i];
			}

			$info_arr[$res[0]] = $new_res;
			//Destory local variable $new_res
			unset($new_res);
			unset($res);
		}

		fclose($myfile);
		return $info_arr;
	}


	function get_user_info($filename){
		global $key_arr;

		$myfile = fopen($filename, "r") or die("File does not exist");
		$info_arr = [];
		/*could use fread()*/
		while($line=fgets($myfile)){
			//Convert to array by " "
			$res = explode(" ", $line);
			$new_res = [];
			//Replace keys in $res
			for($i = 0; $i<count($key_arr); $i++){
				$new_res[$key_arr[$i]] = $res[$i];
			}

			array_push($info_arr, $new_res);
			//Destory local variable $new_res
			unset($new_res);
			unset($res);
		}

		fclose($myfile);
		return $info_arr;
	}

	function get_problem_info($filename){
		global $key_arr_2;

		$myfile = fopen($filename, "r") or die("Unable to open file!");
		$info_arr = [];
		while($line=fgets($myfile)){
			//Convert to array by " "

			$res = explode(" ", $line);
			$new_res = [];

			//Replace keys in $res
			for($i = 0; $i<count($key_arr_2); $i++){
				$new_res[$key_arr_2[$i]] = $res[$i];
			}

			array_push($info_arr, $new_res);

			//Destory local variable $new_res
			unset($new_res);
			unset($res);
		}

		fclose($myfile);

		return $info_arr;
	}


	function get_students_of_teacher($filename){
		global $key_arr_3;

		$myfile = fopen($filename, "r") or die("Unable to open file!");
		$info_arr = [];
		while($line=fgets($myfile)){
			//Convert to array by " "

			$res = explode(" ", $line);
			$new_res = [];

			//Replace keys in $res
			for($i = 0; $i<count($key_arr_3); $i++){
				$new_res[$key_arr_3[$i]] = $res[$i];
			}

			array_push($info_arr, $new_res);

			//Destory local variable $new_res
			unset($new_res);
			unset($res);
		}

		fclose($myfile);

		return $info_arr;
	}
	/*****Copy a file*****/
	/*$file2_name = "DB/useer_copy.txt";
	if(!copy($file_name, $file2_name)){
		echo "Could not copy file";
	}else{
		echo "Copy $file_name to $file2_name";
	}*/


	/*Question: How should we update use.txt file;*/
	/***Delete a file***/
  	//echo unlink($file_name)? "Delete file $file_name" : "Could not delete file $file_name";


?>
