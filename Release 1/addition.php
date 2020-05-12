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
<form>
  <input type="hidden" name="user" value="<?php echo htmlspecialchars($_GET['user']);?>">
  <fieldset align="center">
    <legend><strong><p>Addition</p></strong></legend>

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
    print_r($name);

    // $current_teacher = $students_teach;
    print_r($current_teacher);

    if(trim($current_teacher) === "placeholder"){
      $button = false;
      echo '<p>You have not been claimed by a teacher yet</p>';
    }
    else {
      $button=true;
      $i=0;
      foreach ($plist as $equation) {
        $username = $equation['username'];
        // print_r($equation);
        //only print into table if the problem is from the current user's teacher
        if($username!==$current_teacher){
          continue;
        }
        $prob_type = $equation['operation'];
        if(trim($prob_type) !== "+"){
          continue;
        }
        //creating a new row
        if($newRow === true){
          $newRow = false;
          echo '<tr>';
          echo '<td>'.$equation['a'].' '.$equation['operation'].' '.$equation['b'].' = <input type="text" name="'.$i.'" placeholder="'.$i.'"></input></td>';
        }
        else {
          echo '<td>'.$equation['a'].' '.$equation['operation'].' '.$equation['b'].' = <input type="text" name="'.$i.'" placeholder="'.$i.'"></input></td>';
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
<?php
if($button){ //if button is true
  echo '<button class="Button4" type="submit" name="submit" value="submit">Submit</button>';
}
?>
</fieldset>
</form>


</body>

</html>
