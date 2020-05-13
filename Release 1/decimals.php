<?php
    include 'student_headers.php';
    require_once 'configproblem.php';
    require_once 'configStudents.php';
    require_once 'Files.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ADD</title>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #BFEFFF;
}
fieldset {
  border:1px solid #6699ff;
  display: block;
  margin-left: 2px;
  margin-right: 2px;
  border-radius: 2px;
}
.Button4 {
  background-color:#3366ff;
  color: #eee;
  cursor: pointer;
  padding: 5px;
  width: 15%;
  border: 1px solid #6699ff;
  text-align: center;
  outline: none;
  font-size: 15px;
  display: block;
  text-decoration: none;
  align-self: center;
  float: center;
  border-radius: 5px;
  margin: 10px auto;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 1px 3px 0 rgba(0, 0, 0, 0.19);;
}

.Button4:hover {
  background-color:#0198E1;
}

.Button4:active {
  background-color:#0198E1;
}

</style>
</head>
<body>
  <?php
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //if a user has submitted a problem
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  if(isset($_GET['submit'])) { ?>
        <fieldset align="center">
          <legend><p><strong>Result</strong></p></legend>

          <table>
          <?php
            $student_list = get_students_of_teacher(STUDENTS);
            $plist = get_problem_info(PROBLEMS);
            $col = 0;
            $newRow = true;
            // print_r($list);
            // print_r($student_list);
            // print_r($students[11]['teacher']);

            $current_user = $query_array["user"];

            // print_r($current_user);
            //check student file for our current student's teacher

            foreach ($student_list as $student){
              $name =  $student['name'];
              // print_r($name);
              if(trim($name)!==$current_user){
                continue;
              }
              $current_teacher = $student['teacher'];
              $numQuizes = $student['numQuiz'];
              $current_Grade = $student['grade'];
              break;
            }
            // print_r($name);

            // print_r($current_teacher);


            $button=true;
            $i=0;
            $right = 0;
            $wrong = 0;
            $total = $_GET['numProb'];

            //loop through all problems
            foreach ($plist as $equation) {
              $username = $equation['username'];
              // print_r($equation);

              //only print into table if the problem is from the current user's teacher
              if(trim($username)!==$current_teacher){
                continue;
              }

              //only print problem if it is addition
              $prob_type = $equation['operation'];
              if(trim($prob_type) !== "."){
                continue;
              }



              $b = $equation['b'];
              // print_r($b);
              $answer = strlen((string)$b);
              // print_r($answer);
              $ourSol = $_GET[(string)$i]; //get the answer to this prob from the url
              // print_r($ourSol);
              switch ($answer) {
                case '1':
                  $realSol="tenths";
                  break;
                case '2':
                  $realSol="hundredths";
                  break;
                case '3':
                  $realSol="thousandths";
                  break;
              }
              // print_r($realSol);
              if($realSol == $ourSol){
                $correct=true;
                // echo "success";
              }
              else {
                $correct=false;
                // echo "fail";
              }
              //creating a new row
              if($newRow === true){
                $newRow = false;
                if($correct){
                  echo '<tr>';
                  echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].' => '.$ourSol.' <p style="color:#00cc00; font-weight:bold;">Correct</p> </td>';
                  $right++;
                } else {
                  echo '<tr>';
                  echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].' => '.$ourSol.' <p style="color:#FF0A0A; font-weight:bold;">Incorrect</p> </td>';
                  $wrong++;
                }

              }
              else {
                if($correct){
                  echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].' => '.$ourSol.' <p style="color:#00cc00; font-weight:bold;">Correct</p> </td>';
                  $right++;
                } else {
                  echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].' => '.$ourSol.' <p style="color:#FF0A0A; font-weight:bold;">Incorrect</p> </td>';
                  $wrong++;
                }

                $col++;
                //if we need to create new row
                if($col === 1){
                  echo '</tr>';
                  $col = 0;
                  $newRow = true;
                }
              }
              $i=$i+1;
            }



           ?>
         </table>
          <?php
            //get score for the quiz
            $score = 100*($right/$total);
            // print_r($score);

            //update total quizzes
            $total_Quizes = (int)$numQuizes + 1;

            //calculate new grade
            $newGrade = (($current_Grade*(int)$numQuizes)+$score)/$total_Quizes;
            echo "<br>";
            // print_r($newGrade);


            // update_student_file($file, $user, $key, $value)
            //$key_arr_3 = array("name", "grade", "teacher", "numQuiz");
            update_student_file(STUDENTS, $name, "grade", (int)$newGrade);
            update_student_file(STUDENTS, $name, "numQuiz", $total_Quizes);

            echo '<p style="text-align:center;">Your score for this quiz was '.(int)$score.'%. Your new grade in this class is '.(int)$newGrade.'%</p>';
            echo '<a class="Button4" href="../decimals.php/?user='.$query_array["user"].'">Redo</a>';
       echo '</fieldset>';
  }


  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //otherwise show table of problems
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
else {
  ?>
<form>
  <!-- hidden input to preserve user wwhen we submit form -->
  <input type="hidden" name="user" value="<?php echo htmlspecialchars($_GET['user']);?>">
  <fieldset align="center">
    <legend><strong><p>Decimal Identification</p></strong></legend>

  <table>
  <?php
    $student_list = get_students_of_teacher(STUDENTS);
    $plist = get_problem_info(PROBLEMS);
    $col = 0;
    $newRow = true;
    // print_r($list);
    // print_r($student_list);
    // print_r($students[11]['teacher']);

    $current_user = $query_array["user"];

    // print_r($current_user);

    //check student file for our current student's teacher
    foreach ($student_list as $student){
      $name =  $student['name'];
      // print_r($name);
      if(trim($name)!==$current_user){
        continue;
      }
      $current_teacher = $student['teacher'];
      break;
    }

    // print_r($name);

    // print_r($current_teacher);

    if(trim($current_teacher) === "placeholder"){
      $button = false;
      echo '<p>You have not been claimed by a teacher yet</p>';
    }
    else {
      $button=true;
      $i=0;

      //loop through all problems
      foreach ($plist as $equation) {
        $username = $equation['username'];
        // print_r($equation);

        //only print into table if the problem is from the current user's teacher
        if(trim($username)!==$current_teacher){
          continue;
        }

        //only print problem if it is addition
        $prob_type = $equation['operation'];
        if(trim($prob_type) !== "."){
          continue;
        }

        //creating a new row
        if($newRow === true){
          $newRow = false;
          echo '<tr>';
          echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].' = <select name="'.$i.'"><option> </option><option>tenths</option><option>hundredths</option><option>thousandths</option></select></td>';
        }
        else {
          echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].' = <select name="'.$i.'"><option> </option><option>tenths</option><option>hundredths</option><option>thousandths</option></select></td>';
          $col++;
          //if we need to create new row
          if($col === 1){
            echo '</tr>';
            $col = 0;
            $newRow = true;
          }
        }
        $i=$i+1;
      }
    }
   ?>
  </table>
  <br>

  <!-- adds how many problems were in the table into the url -->
  <input type="hidden" name="numProb" value="<?php echo $i?>">

  <?php
  if($button){ //if button is true
    echo '<button class="Button4" type="submit" name="submit" value="submit">Submit</button>';
  }
  ?>
  </fieldset>
</form>

<?php //end of else statement
} ?>


</body>

</html>
