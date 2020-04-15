<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<title>Mental Math</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>

	<body>
		<div class="container">
			<h1>Spler Math</h1>
			<p>
				<span id="p"></span> <span id="op"></span> <span id="q"></span>
			</p>
			<p id="response"></p>
			<p id="results"></p>
			<p id="category"></p>
			<div class="controls">
				<form>
					<input type="text" name="answer" id="in" autocomplete="off">
				</form>
				<button id="start">START</button>
				<button id="stop">STOP</button>
			</div>
		</div>
		<script type="text/javascript" src="js/math.js"></script>
	</body>
</html>
