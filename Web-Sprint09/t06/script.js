const registration = document.getElementById("registerForm");
let messageBlock = document.getElementsByClassName("message")[0];
let message = document.getElementById("messageValue");
let username, fullname, email, password, conpassword;

registration.addEventListener('submit', event => {
    username = document.getElementById("username").value;
    fullname = document.getElementById("name").value;
    email = document.getElementById("email").value;
    password = document.getElementById("password").value;
    conpassword = document.getElementById("conpassword").value;

    password = password.replace(/\s+/g,'');
    conpassword = conpassword.replace(/\s+/g,'');
    if(password != conpassword) {
        event.preventDefault();
        messageBlock.style.display = 'flex';
        message.innerHTML = "Passwords don't match";
        setTimeout("messageBlock.style.display = 'none'", 3000);
    }
});

let loginScreen = document.getElementsByClassName('login')[0];
let registerScreen = document.getElementsByClassName('register')[0];
let reminderScreen = document.getElementsByClassName('reminder')[0];

function changeScreen(option) {
    switch(option){
        case 'login': 
            registerScreen.style.display = 'none';
            reminderScreen.style.display = 'none';
            loginScreen.style.display = 'flex';
            break;
        case 'register': 
            loginScreen.style.display = 'none';
            reminderScreen.style.display = 'none';
            registerScreen.style.display = 'flex';
            break;
        case 'reminder': 
            registerScreen.style.display = 'none';
            loginScreen.style.display = 'none';
            reminderScreen.style.display = 'flex';
            break;
    }
}