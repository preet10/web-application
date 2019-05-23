<?php
$hostName = "localhost";
$userName = "root";
$pass = '';
$db ="messenger";

$conn = mysqli_connect($hostName,$userName, $pass);
if($conn){
    //echo '<br>connection established<br>';
}
else{
    //echo '<br>connection error<br>';
}
$database = mysqli_select_db($conn, $db);
if($database){
    //echo '<br>connected to database<br>';
}
else{
    //echo '<br>not connected to database<br>';
}
?>