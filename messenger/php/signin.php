<?php
session_start();
include 'messenger_connection.php';
// user details from index.html
$username = $_POST['username'];
$password = $_POST['password'];
// matching details with the database.
$sql = "SELECT * FROM accounts WHERE `name` = '$username' AND `password` =  '$password' ";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
if($res['name'] == $username && $res['password'] == $password){
    $_SESSION['permission'] = "ok";
    $_SESSION['username'] = $username;
    // creating a cookie to remeber the user name
    $cookie_name = "user_name";
    $cookie_value = $username;
    setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
    header('location: dashboard.php');
}else{
    $sql1 = "SELECT `name` FROM accounts WHERE `name` = '$username'";
    $data1 = $conn->query($sql1);
    $res1 = $data1->fetch_assoc();
    if($res1['name'] == $username){
        echo "<br><h1>Wrong Password</h1><br>";
        echo "<br><a href='../index.html'>Try Again</a><br>";
    }
    else{
        echo "<br><h1>User Name Is Not Registred</h1><br>";
        echo "<br><a href='../index.html'>Try Again</a><br>";
        
    }
}


?>