/***** ELEMENTS *****/
var startButton = document.getElementById("start");
var stopButton = document.getElementById("stop");
var inputField = document.getElementById("in");
var form = document.querySelector("form");
var p = document.getElementById("p");
var q = document.getElementById("q");
var op = document.getElementById("op");
var response = document.getElementById("response"); // used for Try Again text
var results = document.getElementById("results");
var category = document.getElementById("category");

/***** STATE VARIABLES *****/
var max = 20;
var num1;
var num2;
var answer;

var numberTimes;

var count; // number of correct answers
var times = [];

/***** INITIALIZING *****/
inputField.className = "hide";
stopButton.className = "hide";

/***** EVENTS *****/
startButton.onclick = function() {
	// initializing the count
	count = 0;
	numberTimes = 0;
	times = [];
	results.innerHTML = ""; // clear results
	category.innerHTML = ""; // clear category
	refreshNums();
	inputField.className = ""; // show the input field
	stopButton.className = ""; // show the stop button
	startButton.className = "hide"; // hide the start button
	inputField.focus();
};

form.onsubmit = function(e) {
	// need to prevent the default form submission wich reloads the page
	e.preventDefault();
	getAnswer();
};

stopButton.onclick = function() {
	var resultString;
	var categoryString;
	if (count > 0) {
		// getting mean time
		var total = 0;
		for (var i = 0; i < times.length; i++) {
			total += times[i];
		}
		var mean = (total / times.length) / 1000;
		resultString = "Correct answers: " + count + " out of " + numberTimes;
		categoryString = getCategory(count);
	} else {
		resultString = "No results recorded. Hit the Enter key to submit your answers.";
		categoryString = "";
	}

	inputField.className = "hide"; // hide the input field
	stopButton.className = "hide"; // hide the stop button
	startButton.className = ""; // show the start button

	// clear numbers and present results
	p.innerHTML = "";
	q.innerHTML = "";
	op.innerHTML = "";
	response.innerHTML = ""; // clear response in case it was set
	results.innerHTML = resultString;
	category.innerHTML = categoryString;
};

/***** FUNCTIONS ******/
var refreshNums = function() {
	// Getting some random numbers
	num1 = Math.floor((Math.random() * max) + 1);
	num2 = Math.floor((Math.random() * max) + 1);
	// Printing numbers to user
	p.innerHTML = num1;
	op.innerHTML = "+";
	q.innerHTML = num2;
	
	
};

/*
* This is called in the onsubmit event
*/
var getAnswer = function() {
	var correct = num1 + num2;
	// Getting the users attempt
	answer = parseInt(inputField.value);

	if (answer === correct) {
		// Stopping the timer and adding the time to the times array
		count++;
		numberTimes++;
		// the answer was correct, so no need for "Try Again"
		response.innerHTML = "";
		refreshNums();
	} else {
		response.innerHTML = "Try Again";
		numberTimes++;
	}
	// clear the input field for the next round
	inputField.value = "";
};

var getCategory = function(count) {
	var c;
	var a;
	a = (count/(numberTimes - 1))*100
	if (a <= 59.99) {
		c = "F student";
	} else if (a < 69.99) {
		c = "D student";
	} else if (a < 79.99) {
		c = "C student";
	} else if (a < 89.99) {
		c = "B student";
	} else if (a < 100) {
		c = "A student";
	} else if (a = 100){
		c = "Perfecto A++"
	}
	
	return c;
};
