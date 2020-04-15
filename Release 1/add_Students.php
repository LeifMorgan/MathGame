<?php
    include 'headers.php';
    require_once 'configStudents.php';
    require_once 'Files.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>

form {
  display: flex;
  flex-direction: row;
  align-items: center;
}

</style>

<meta charset="utf-8">
<title>Add a student to your class</title>
<!-- Include JS File Here -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
</head>
<body>
<p> Add a student to your class </p>

<?php
    // $userlist = get_students_of_teacher(STUDENTS);
    // foreach ($userlist as $getStudent) {
    //   echo print_r($getStudent);
    //   if(trim($getStudent["teacher"])!== "placeholder"){
    //     echo '<br>';
    //     echo "this shit";
    //     echo '<br>';
    //     continue;
    //   }
    //   echo '<option value="'.$getStudent["name"].'">'.$getStudent["name"].'</option>';
    // }
?>

<?php echo '<form action="../insert_Student.php/?user='.$query_array["user"].'" method="post" id="form_id">' ?>

  <select id="studentname" name="studentname">
    <?php
        $userlist = get_students_of_teacher(STUDENTS);
        foreach ($userlist as $getStudent) {
          if(trim($getStudent['teacher'])!== 'placeholder'){
            continue;
          }
          //only show students that have "placeholder" as a teacher
          echo '<option value="'.$getStudent["name"].'">'.$getStudent["name"].'</option>';
        }
    ?>
  </select>


  <input type="submit" name="submit_id" id="Submit" value="Submit" />
</form>
</html>
