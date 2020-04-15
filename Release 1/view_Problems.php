<?php
    include 'headers.php';
    require_once 'configproblem.php';
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
  
  <?php echo "<h2>".$query_array["user"]."'s Problems </h2>"; ?>
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
