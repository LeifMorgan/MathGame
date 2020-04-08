<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<!-- Include JS File Here -->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	</head>
<body>
	<form action="check_Account.php" method="post" id="form_id">
		<h2>Welcome: Create an Account</h2>
		Create Username:
		<input type="text" name="username" id="username" placeholder="Name" />
		<br/><br/>
		Create Password:
		<input type="password" name="password" id="password" placeholder="Password" /><br/><br/>
		Confirm Password:
		<input type="password" name="password2" id="password2" placeholder="Password" /><br/><br/>

		<input type="radio" id="teacher" name="class" value="teacher" >
    <label> Teacher </label><br>

    <input type="radio" id="student" name="class" value="student">
    <label> Student </label><br>
		<br>
		<input type="submit" name="submit_id" id="Create" value="Create" />
	</form>

</body>
</html>
