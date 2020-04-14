<?php
    include 'headers.php';
    require_once 'configStudents.php';
    require_once 'Files.php';
?>
<!DOCTYPE html>
<html>
<head>
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
  background-color: #dddddd;
}
</style>
</head>
<body>
  <?php echo "<h2>".$query_array["user"]."'s Students </h2>"; ?>
  <table>
  <?php
    $list = get_students_of_teacher(STUDENTS);
    $col = 0;
    $newRow = true;
    $current_user = $query_array["user"];

    foreach ($list as $student) {
      $students_teacher = $student['teacher'];
      //only print into table if current_user = username
      if(trim($students_teacher)!==$current_user){
        continue;
      }
      //creating a new row in table
      if($newRow === true){
        $newRow = false;
        echo '<tr>';
        echo '<td>'.$student['name'].': '.$student['grade'].'</td>';
      }
      else {
        echo '<td>'.$student['name'].': '.$student['grade'].'</td>';
        $col++;
        //if we need to create new row
        if($col === 2){
          echo '</tr>';
          $col = 0;
          $newRow = true;
        }
      }

    }
   ?>
  </table>

</body>
</html>
