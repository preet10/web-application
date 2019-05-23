
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

function sendMsg()
{
    var msg = document.getElementById('msg').value;
    if(msg == 0){
        document.getElementById('msg').innerHTML = '';
        return;
    }else{
        var req = new XMLHttpRequest;
        req.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                var msgTag = document.createElement("p");
                var node = document.createTextNode(this.responseText);
                msgTag.appendChild(node);
                var element = document.getElementById('chat_log');
                element.appendChild(msgTag);
            }
        }
        req.open("GET", "message.php?m="+msg, true);
        req.send();
    }
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
    
var interval = setInterval(function() { chat_ajax() }, 800);
//setInterval(function() { chat_ajax() }, 1000);

function clearChat(){

    clearInterval(interval);
    document.getElementById('message_container').innerHTML =  ' ';
        
    }



