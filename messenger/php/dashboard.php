<?php
session_start();

if(!isset($_SESSION['permission'])){
    header('location: ../index.html');
}
//session_destroy();
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
    <script src='..js/index.js'></script>
</head>

<body>

    <div class='message_container' id='message_container'>
        <div class='chat_log' id='chat_log'>
        
        </div>
    </div>

    <form action='dashboard.php' method='post'>
            <!--<button onclick="clearInterval(interval)" >Clear Chat</button>-->      
            <button type='submit' name='submit' class='fa fa-send'style="font-size:24px"></button>      
            <textarea id='msg' name='msg'  placeholder='Enter Your Message'></textarea>
    </form>
    <?php
            
            if(isset($_POST['msg'])){
                $name = $_COOKIE['user_name'];
                $msg = $_POST['msg'];
                include 'messenger_connection.php';
                $sql = "INSERT INTO chat(`name`,`message`) VALUES('$name','$msg')";
                $run = $conn->query($sql);
            }
        ?>
        
</body>
</html>

