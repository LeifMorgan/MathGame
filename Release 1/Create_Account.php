<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<!-- Include JS File Here -->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	</head>
<body>
	<form action="check_Login.php" method="post" id="form_id">
		<h2>Welcome to Math Game</h2>
		Create Userame:
		<input type="text" name="username" id="username" placeholder="Name" />
		<br/><br/>
		Create Password:
		<input type="password" name="password" id="password" placeholder="Password" /><br/><br/>
		<input type="submit" name="submit_id" id="login" value="Login" />
	</form>

</body>
</html>