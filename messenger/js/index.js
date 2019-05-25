
function signup(){
    signin_container = document.getElementById('signin_container');
    signup_container = document.getElementById('signup_container');    
    
    signin_container.style.display = 'none';
    signup_container.style.display = 'block';
    
}

function return_signin(){
    signin_container = document.getElementById('signin_container');
    signup_container = document.getElementById('signup_container');
    
    signup_container.style.display = 'none';
    signin_container.style.display = 'block';
    
}

function cancel_signup(){
    signin_container = document.getElementById('signin_container');
    signup_container = document.getElementById('signup_container');
    
    signup_container.style.display = 'none';
    signin_container.style.display = 'block';
}

// Ajax funtion to mkae the web application real time
 
function chat_ajax(){  
    
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            document.getElementById('chat_log').innerHTML = req.responseText;
     } 
        }
    req.open('GET', 'message.php', true);
    req.send(); 
    }
    
var interval = setInterval(function() { chat_ajax() }, 1000);
//setInterval(function() { chat_ajax() }, 1000);

function clearChat(){

    clearInterval(interval);
    document.getElementById('message_container').innerHTML =  ' ';
        
    }

function sign_out(){
    // deleting the cookie by expiring its validity.
    document.cookie =  "user_name=; expires= Thu, 03 march 2001 00:00:00 UTC; path=/; ";
    
    document.location.reload(true); 
    
}
// send message function
function sendMsgFunc(){
    var name = document.getElementById('name');
    var message = document.getElementById('message');
    var time = document.getElementById('time');
    name.style = "float: right";
    message.style = "float: right";
    time.style = "float: right";


}



