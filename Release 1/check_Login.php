<?php
require_once 'Files.php';
require_once 'Config.php';
echo "<pre>";
 /*names of two input: username and password*/
/*foreach($_POST as $key => $val){
    echo "$key:$val\n";
}*/

extract($_POST);


//1: can login 2: user does not exist  3: invaild password
$re = checkLogin($username, $password);
//$re = 2; //Please comment this after completing your checkLogin function

if($re===1){
	/*Redirect browser*/
	header("Location: Main_Menu.php/?user=$username");
}else if($re===2){
	/*Redirect browser*/
	header("Location: Main_Menu_Student.php/?user=$username");
}else{
	echo "Invaild username or password";

	/*Redirect to login.php after 5 seconds*/
  header("refresh:5; url=login.php");
}


/**
*Returns 1: can login
*		 2: user does not exist
*		 3: invaild password
	*/
function checkLogin($name, $pw){
	$all_user = get_user_info(USERFILE);
	// console.log("HELLO");
	// console.log($all_user["$name"]["password"]);
	if(array_key_exists($name, $all_user) and ($pw == $all_user["$name"]["password"])) {
		if(1 == $all_user["$name"]["class"]){
			return 1;
		}
		else if (2 == $all_user["$name"]["class"]){
			return 2;
		} else {
			return 3;
		}
	} else {
		return 3;
	}

    //print_r($all_user);


}
?>
