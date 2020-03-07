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
$re = checkAccount($username, $password,$password2);
//$re = 2; //Please comment this after completing your checkLogin function

if($re===1){
  save_data(USERFILE,[$username,$password, 2])
	/*Redirect browser*/
	header("Location: Login.php");

}else if($re==2){
	echo "Username Already Exists";


  header("refresh:2; url=create_Account.php");
} else {
  echo "Passwords do not match"

  header("refresh:2; url=create_Account.php");
}


/**
*Returns 1: account created successfully
*		 2: username already exists
*		 3: passwords dont match
	*/
function checkAccount($name, $pw, $pw2){
  $all_user = get_user_info(USERFILE);
	if(array_key_exists($name, $all_user)) {
		return 2;
	} else if($pw == $pw2) {
    return 1;
	} else {
    return 3;
  }

    //print_r($all_user);


}
?>
