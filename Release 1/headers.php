
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
  background-color: #800000;
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
  background-color: #800000;
}

.menu li a:active{
  background-color: #cc0000;
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
  background-color: #cc0000;
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
  <li><a href="http://149.165.157.23/~masteryuser/coursePage.php">Menu</a></li>
  <!-- <li><a href="http://149.165.157.23/~masteryuser/index.php">Back to Courses</a></li> -->
  <li><a href="http://149.165.157.23/~masteryuser/createQuiz.php">Create a Quiz</a></li>

  <li class="dropdown">
    <a href="javascript:void(0)"class = "dropbtn"> Courses</a>
    <div class="dropdown-content">
        <?php
        foreach($result_set as $tuple) {
          //echo "<button type='submit' class='button' name='courseName' value = '".$tuple[courseName].$tuple[section]."'>".$tuple[courseName]." ".$tuple[section]."</button>";
          echo "<a href='./changeCourse.php?courseName=".$tuple[courseName].$tuple[section]."'>".$tuple[courseName]." ".$tuple[section]."</a>";
        }
        ?>
        <a href="http://149.165.157.23/~masteryuser/createClass.php">Create a Course</a>
     <!--
     <div class="dropdown-content">

       foreach($result_set as $tuple) {
         echo '<a href="changeCourse.php?courseName='.urlencode(.$tuple[courseName].$tuple[section]).'">'.$tuple[courseName]." ".$tuple[section].'</a>';
       }

     </div>
   -->
   </div>
  </li>

  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Subjects</a>
    <div class="dropdown-content">
      <a href="http://149.165.157.23/~masteryuser/coursePage.php">View Subjects</a>
      <a href="http://149.165.157.23/~masteryuser/createSubject.php">Create Subject</a>
    </div>
  </li>

All these hrefs can be changed to our URL or deleted

  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Learning Targets</a>
    <div class="dropdown-content">
      <!--<a href="http://149.165.157.23/~masteryuser/createSubject.php">Create Subject</a> -->
      <a href="http://149.165.157.23/~masteryuser/viewLT.php">View Learning Targets</a>
      <a href="http://149.165.157.23/~masteryuser/viewTemplates.php" >View Templates</a>
      <a href="http://149.165.157.23/~masteryuser/createLT.php">Create Learning Target</a>
      <a href="http://149.165.157.23/~masteryuser/createTemplate.php" >Create a Template</a>
      <a href="http://149.165.157.23/~masteryuser/importLTFile.php" >Import Learning Targets</a>
      <!--<a href="http://149.165.157.23/~masteryuser/addStudent.php">Add a Student</a>
      <a href="http://149.165.157.23/~masteryuser/importStudentsFile.php" >Import Students</a>

          -->
    </div>
  </li>

  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Students</a>
    <div class="dropdown-content">
      <a href="http://149.165.157.23/~masteryuser/viewStudents.php">View Students</a>
      <a href="http://149.165.157.23/~masteryuser/viewGrades.php" >View Grades</a>
      <a href="http://149.165.157.23/~masteryuser/quizInfo.php">Grade Students</a>
      <a href="http://149.165.157.23/~masteryuser/addStudent.php">Add a Student</a>
      <a href="http://149.165.157.23/~masteryuser/importStudentsFile.php" >Import Students</a>
      <a href="http://149.165.157.23/~masteryuser/MasteryCompletionTable.php">Mastery Completion Table</a>
    </div>
  </li>
  <!--
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Quiz</a>
    <div class="dropdown-content">
      <a href="http://149.165.157.23/~masteryuser/createQuiz.php" >Generate new Quiz</a>
    </div>
  </li>
-->
  <div class="to-right">
        <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Settings</a>
    <div class="dropdown-content to-right">
      <a href="exportData.php">Export Data</a>
      <a href="clearData.php">Clear Data</a>
      <a href="http://149.165.157.23/~masteryuser/logout.php">Logout</a>
    </div>
  </li>
  </div>
</ul>
</div>


</body>
</html>
