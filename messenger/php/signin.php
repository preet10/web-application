<?php
session_start();
include 'messenger_connection.php';
// user details from index.php
$username = $_POST['username'];
$password = $_POST['password'];
// matching details with the database.
$sql = "SELECT * FROM accounts WHERE `name` = '$username' AND `password` =  '$password' ";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
if($res['name'] == $username && $res['password'] == $password){
    
    // giving permissions to dashboard.php
    $_SESSION['permission'] = "ok";
    
    // creating a cookie to remember the user name so that user don't have to signin again.
    $cookie_name = "user_name";
    $cookie_value = $username;
    setcookie($cookie_name,$cookie_value, time() + (86400*30*12), "/");//(86400)=1 day in seconds, (86400*30*12)=1 year in seconds.
    
    // creating session variable to send name details to mysql server
    $_SESSION['username'] = $username;
    header('location: dashboard.php');

}else{
    $sql1 = "SELECT `name` FROM accounts WHERE `name` = '$username'";
    $data1 = $conn->query($sql1);
    $res1 = $data1->fetch_assoc();
    if($res1['name'] == $username){
        echo "<br><h1>Wrong Password</h1><br>";
        echo "<br><a href='../index.php'>Try Again</a><br>";
    }
    else{
        echo "<br><h1>User Name Is Not Registred</h1><br>";
        echo "<br><a href='../index.php'>Try Again</a><br>";
        
    }
}


?>