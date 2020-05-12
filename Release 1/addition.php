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
  background-color: #dddddd;
}
</style>
</head>
<body>

<form>
  <table>
  <?php
    $list = get_problem_info(PROBLEMS);
    $col = 0;
    $newRow = true;
    $current_user = $query_array["user"];

    foreach ($list as $equation) {
      $username = $equation['username'];
      //only print into table if current_user = username
      if(trim($username)!==$current_user){
        continue;
      }
      //creating a new row
      if($newRow === true){
        $newRow = false;
        echo '<tr>';
        echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].'</td>';
      }
      else {
        echo '<td>'.$equation['a'].$equation['operation'].$equation['b'].'</td>';
        $col++;
        //if we need to create new row
        if($col === 1){
          echo '</tr>';
          $col = 0;
          $newRow = true;
        }
      }

    }
   ?>
</table>
</form>


</body>

</html>
