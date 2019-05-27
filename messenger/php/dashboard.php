<?php
session_start();
if(!isset($_COOKIE['user_name'])){
    $_SESSION['permission'] = NULL;
}
if(!isset($_SESSION['permission'])){
    header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href=" ../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='../js/index.js'></script>
</head>

<body>
    <div class='top_nav'>
        <button class='fa fa-sign-out'id='sign_out'onclick='sign_out()'id='sign_out'style="font-size:20px">Sign-out</button>
        <h1>Global</h1>
    </div>
    
    <div class='message_container' id='message_container'>
        <div class='chat_log' id='chat_log'>
        
        </div>
    </div>

    <form action='dashboard.php' method='post'>
            <!--<button onclick="clearInterval(interval)" >Clear Chat</button>-->      
            <button type='submit' id='send_button' name='send_button'  class='fa fa-send'style="font-size:24px"></button>      
            <textarea id='msg' name='msg'  placeholder='Enter Your Message' required title='Enter a message!'></textarea>
    </form>
    <?php
            // to check if user has type the message or not .
           
            if(isset($_POST['send_button']) && isset($_POST['msg'])){
                
                $name = $_COOKIE['user_name'];
                //$name = $_SESSION['username'];
                $msg = $_POST['msg'];
                if(isset($name) && isset($msg))
                {
                    include 'messenger_connection.php';
                    $sql = "INSERT INTO chat(`name`,`message`) VALUES('$name','$msg')";
                    $run = $conn->query($sql);
                }
                
                            
            }
    ?>
        
</body>
</html>

