<?php
    include 'headers.php';
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
<title>Create Problem</title>
<!-- Include JS File Here -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
</head>
<body>
<p> Create Problem </p>

<?php echo '<form action="../insert_Problem.php/?user='.$query_array["user"].'" method="post" id="form_id">' ?>

  <input type="text" id="a" name="a" placeholder="integer" />

  <select id="operations" name="operations">
    <option value="+">+</option>
    <option value="-">-</option>
    <option value=".">.</option>
  </select>

  <input type="text" id="b" name="b" placeholder="integer" />

  <input type="submit" name="submit_id" id="Submit" value="Submit" />
</form>
</html>
