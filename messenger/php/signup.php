<?php
include 'messenger_connection.php';

$username = $_POST["username"];
$password = $_POST["password"];

$unames = "SELECT `name` FROM `accounts`";
$unameData = $conn->query($unames);
$row = $unameData->fetch_assoc();
while($row){
    if($row['name'] == $username){
        echo "<h1>This User Name Is Already Occupied</h1>";
        echo "<br><a href='../index.html'>Click Here To Sign-up With Diffrent username</a>";
        break;
    }else{
        $sql = "INSERT INTO `accounts` (`id`,`name`,`password`) VALUES ( NULL, '$username','$password')";

        $conn->query($sql);

        echo '<h1>User Name Created</h1>';
        header('refresh:2 url="../index.html"');
        break;

    }
}


?>