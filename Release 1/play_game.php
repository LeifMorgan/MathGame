<?php
    include 'headers.php';
?>

<!DOCTYPE html> 
<html> 
<head> 
    <title>Marquee Tag</title> 
    <style> 
    .main { 
        text-align:center; 
    } 
    .marq { 
        padding-top:30px; 
        padding-bottom:30px; 
    } 
    .geek1 { 
        font-size:36px; 
        font-weight:bold; 
        color:white; 
        padding-bottom:10px; 
    } 
    </style> 
</head>  
  
<body> 
    <div class = "main"> 
    <marquee class="marq" bgcolor = "Green" direction = "left" loop="" > 
        <div class="geek1">GeeksforGeeks</div> 
        <div class="geek2">A computer science portal for geeks</div> 
    </marquee> 
    </div> 
</body> 
</html>