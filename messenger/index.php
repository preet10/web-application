<?php
session_start();
if(isset($_COOKIE['user_name'])){
    
    include "php/messenger_connection.php";
    $cookie_value = $_COOKIE['user_name'];
    $sql = "SELECT `name` FROM `accounts` WHERE `name` = '$cookie_value'";
    $data = $conn->query($sql);
    $res = $data->fetch_assoc();
    
    if($cookie_value == $res['name']){
        $_SESSION['permission'] = "yes";
        header("location: php/dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messenger</title>
    <link rel="stylesheet" href="css/index.css">
    <script src='js/index.js'></script>
</head>
<body>
    <div class='signin_container' id='signin_container'>
        <h1>Sign-in</h1>
        <form action="php/signin.php" method='post'>
            <label><b>User Name: </b></label><br>
            <input type="text" name="username" required><br>
            <label><b>Password:</b></label><br>
            <input type="password" name="password" required><br>
            <button id='signin_button'>Sign In</button><br>
        </form>
        <button onclick='signup()' id='signup_button'>Sign Up</button>
    </div>
    <div class='signup_container' id='signup_container'>
        <h1>Sign-up</h1>
        <form action="php/signup.php" method='post'>
            <label><b>Set User Name: </b></label><br>
            <input type="text" name="username" required><br>
            <label><b>Set Password:</b></label><br>
            <input type="password" name="password" required><br> 
            <button type='submit' onclick='return_signin()' id='signup_button'>Sign Up</button>
        </form>
        <button id='cancel_button'  onclick=cancel_signup() id='cancel'>Cancel</button>
    </div>
  
</body>
</html>