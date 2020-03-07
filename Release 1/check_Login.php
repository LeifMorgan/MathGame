<?php
require_once 'our_files.php';
require_once 'our_config.php';
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
	header("Location: our_welcome.php/?user=$username");

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
	if(array_key_exists($name, $all_user) and ($pw == $all_user["$name"]["password"])) {
		return 1;
	} else {
		return 2;
	}

    //print_r($all_user);


}
?>
