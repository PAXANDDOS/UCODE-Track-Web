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