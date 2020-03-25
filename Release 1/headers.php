
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Mastery Grading</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style>

ul.nav li.dropdown:hover > ul.dropdown-menu {
    display: block;
}
.menu {
    font-family: sans-serif;
}

.menu ul{
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #6699ff;
  border-radius: 2px;

}

.menu li {
  float: left;
}

.menu li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  /* float: right; */
}

.menu li a:hover, .dropdown:hover .dropbtn {
  background-color: #3366ff;
}

.menu li a:active{
  background-color: #3366ff;
}

.menu li.dropdown {
  /* position: relative; */
  display: inline-block;
  /* float: right; */
}

.menu .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  z-index: 1;
  /* float: right; */
}

.menu .dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  /* left: auto; */
  /* float: right; */
}

.menu .dropdown:hover .dropdown-content {
  display: block;
}
.menu .dropdown:hover .dropbtn {
  background-color: #3366ff;
}

.menu .dropdown-content a:hover {background-color: #f1f1f1;}

.menu .to-right {
  float: right;
  min-width: 100px;
  text-align: left;
}


.dots {
  position: relative;
  background: #800000;
  width: 50px;
  height: 50px;
  /* border-radius: 50%; */
  /* margin: 20px; */
}

.dots:after {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  width: 2px;
  height: 2px;
  margin-left: -1px;
  margin-top: -1px;
  background-color: white;
  border-radius: 50%;
  box-shadow: 0 0 0 2px white, 0 11px 0 2px white, 0 -11px 0 2px white;
}

</style>
</head>
<body>
  <div class="menu">
<ul>
  <!--
  need to figure out how to get ?user=$username to stay in url
  <li><a href="../Main_Menu.php">Menu</a></li> -->
  <li><a href="../view_Students.php">Students</a></li>
  <li><a href="../add_Students.php">Add Student</a></li>

  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Problems</a>
    <div class="dropdown-content">
      <a href="../create_Problem.php">Create Problems</a>
      <a href="../view_Problems.php">View Problems</a>
    </div>
  </li>


  <div class="to-right">
        <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Settings</a>
    <div class="dropdown-content to-right">
      <a href="../settings.php">Options</a>
      <a>Logout</a>
    </div>
  </li>
  </div>

</ul>
</div>


</body>
</html>
